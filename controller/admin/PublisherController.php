<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function indexAction() {
    require_once PATH_MODEL.'/Publisher.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    $data = getAllPublisher();
    loadView('master','Publisher/list-publisher', $data);
}

function createAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    loadView('master','Publisher/add-publisher');
}

function storeAction() {
    require_once PATH_MODEL.'/Publisher.php';
    //xử lý lưu dữ liệu


    $data['pub_name'] = $_POST['pub_name'];
    if(!empty($_POST['pub_description'])) {
        $data['pub_description'] = $_POST['pub_description'];
    }else{
        $data['pub_description'] = "Không có mô tả nào cho NXB này!" ;
    }

    // echo "<pre>";
    // print_r($data);
    // die;

    storePublisher($data);
    //chuyển hướng
    header("Location:index.php?c=publisher&a=index");
}

function editAction() {
    require_once PATH_MODEL.'/Publisher.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    $data = getPublisherById($id);
    // echo "<pre>";
    // print_r($data);
    // die;

    loadView('master','Publisher/edit-publisher', $data);
}

function updateAction() {
    require_once PATH_MODEL.'/Publisher.php';
    
    $data = [
        'pub_name' => $_POST['pub_name'],
        'pub_description' => $_POST['pub_description']
    ];
    updatePublisherById($_GET['id'], $data);
    header("Location:index.php?c=publisher&a=index");
    
}

function deleteAction() {
    require_once PATH_MODEL.'/Publisher.php';
    //xử lý lưu dữ liệu
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    deletePublisherById($id);
    //chuyển hướng
    header("Location:index.php?c=publisher&a=index");
}

?>