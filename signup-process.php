<?php 
    session_start();
    // Đường dẫn tới hệ  thống
    define('PATH_SYSTEM', __DIR__ .'/system');
    define('PATH_MODEL', __DIR__ . '/model');
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_MODEL.'/User.php';

    if(isset($_POST['btn_signup'])){
        $user_name = $_POST['user_full'];
        $user_mail = $_POST['user_mail'];
        $user_pass = $_POST['user_pass'];
        $user_level = 2;
        //xử lý lưu dữ liệu
    
    
        //kiểm tra email đã tồn tại chưa? <Có thể tạm thời bỏ qua>
        if(checkUserByEmail($user_mail, '' )){
            if(isset($_SERVER['HTTP_REFERER'])) {
                $_SESSION['email_exists'] = '<p class="text-center iq-bg-danger rounded-pill mb-3">Email already exists!</p>';
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }else {
            $data = [
                'user_full' => $user_name,
                'user_mail' => $user_mail,
                'user_pass' => $user_pass,
                'user_level' => $user_level
            ];
            // echo "<pre>";
            // print_r($data);
            // die;
            storeUser($data);

            //xoá thông báo lỗi khi đăng kí thành công
            if(isset($_SESSION['email_exists'])) {
                unset($_SESSION['email_exists']);
            }

            header("Location:sign-in.php");
            //chuyển hướng
        }
    }

?>