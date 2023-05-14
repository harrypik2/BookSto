<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function indexAction() {
    require_once PATH_MODEL.'/Author.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    $data = getAllAuthor();
    loadView('master','Author/list-author', $data);
}

function createAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    loadView('master','Author/add-author');
}

function storeAction() {
    require_once PATH_MODEL.'/Author.php';
    //xử lý lưu dữ liệu


    $data['aut_name'] = $_POST['aut_name'];
    if(!empty($_POST['aut_description'])) {
        $data['aut_description'] = $_POST['aut_description'];
    }else{
        $data['aut_description'] = "Không có mô tả nào cho tác giả này!" ;
    }

    // echo "<pre>";
    // print_r($data);
    // die;

    storeAuthor($data);
    //chuyển hướng
    header("Location:index.php?c=author&a=index");
}

function editAction() {
    require_once PATH_MODEL.'/Author.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    $data = getAuthorById($id);
    // echo "<pre>";
    // print_r($data);
    // die;

    loadView('master','Author/edit-author', $data);
}

function updateAction() {
    require_once PATH_MODEL.'/Author.php';
    
    $data = [
        'aut_name' => $_POST['aut_name'],
        'aut_description' => $_POST['aut_description']
    ];
    updateAuthorById($_GET['id'], $data);
    header("Location:index.php?c=author&a=index");
    
}

function deleteAction() {
    require_once PATH_MODEL.'/Author.php';
    //xử lý lưu dữ liệu
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    deleteAuthorById($id);
    //chuyển hướng
    header("Location:index.php?c=author&a=index");
}

?>