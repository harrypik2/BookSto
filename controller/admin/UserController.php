<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function indexAction() {
    require_once PATH_MODEL.'/User.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    $data = getAllUser();
    loadView('master','User/list-user', $data);
}

function createAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    loadView('master','User/add-user');
}

function storeAction() {
    require_once PATH_MODEL.'/User.php';
    //xử lý lưu dữ liệu


    //kiểm tra email đã tồn tại chưa? <Có thể tạm thời bỏ qua>
    if(checkUserByEmail($_POST['user_mail'], '' )){
        if(isset($_SERVER['HTTP_REFERER'])) {
            $_SESSION['err_store']['email_exists'] = 'Email already exists!';
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }else {
        $data = [
            'user_name' => $_POST['user_name'],
            'user_mail' => $_POST['user_mail'],
            'user_pass' => $_POST['user_pass'],
            'user_level' => $_POST['user_level']
        ];
        storeUser($data);
        header("Location:index.php?c=user&a=index");
        //chuyển hướng
    }
}

function editAction() {
    require_once PATH_MODEL.'/User.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    $data = getUserById($id);
    loadView('master','User/edit-user', $data);
}

function updateAction() {
    require_once PATH_MODEL.'/User.php';
    //kiểm tra email đã tồn tại chưa?
    if(checkUserByEmail($_POST['user_mail'], $_POST['old_mail'] )){
        if(isset($_SERVER['HTTP_REFERER'])) {
            $_SESSION['err_store']['email_exists'] = 'Email already exists!';
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }else {
        $data = [
            'user_name' => $_POST['user_name'],
            'user_mail' => $_POST['user_mail'],
            'user_pass' => $_POST['user_pass'],
            'user_level' => $_POST['user_level']
        ];
        updateById($_GET['id'], $data);
        header("Location:index.php?c=user&a=index");
    }
}

function deleteAction() {
    require_once PATH_MODEL.'/User.php';
    //xử lý lưu dữ liệu
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    deleteById($id);
    //chuyển hướng
    header("Location:index.php?c=user&a=index");
}

function detailAction() {

}

?>