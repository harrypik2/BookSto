<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function indexAction() {
    require_once PATH_MODEL.'/Category.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    $data = getAllCategories();
    // echo "<pre>";
    // print_r($data);
    // die;
    loadView('master','Category/list-category', $data);
}

function createAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    loadView('master','Category/add-category');
}

function storeAction() {
    require_once PATH_MODEL.'/Category.php';
    //xử lý lưu dữ liệu
    $data['cat_name'] = $_POST['cat_name'];
    if(!empty($_POST['cat_description'])) {
        $data['cat_description'] = $_POST['cat_description'];
    }else{
        $data['cat_description'] = "Không có mô tả nào cho thể loại này!" ;
    }
    // echo "<pre>";
    // print_r($data);
    // die;
    storeCategory($data);
    //chuyển hướng
    header("Location:index.php?c=category&a=index");
}

function editAction() {
    require_once PATH_MODEL.'/Category.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    $data = getCategoryById($id);
    // echo "<pre>";
    // print_r($data);
    // die;
    loadView('master','Category/edit-category', $data);
}

function updateAction() {
    require_once PATH_MODEL.'/Category.php';
    
    $data = [
        'cat_name' => $_POST['cat_name'],
        'cat_description' => $_POST['cat_description']
    ];
    updateCategoryById($_GET['id'], $data);
    header("Location:index.php?c=category&a=index");
    
}

function deleteAction() {
    require_once PATH_MODEL.'/Category.php';
    //xử lý lưu dữ liệu
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    deleteCategoryById($id);
    //chuyển hướng
    header("Location:index.php?c=category&a=index");
}

?>