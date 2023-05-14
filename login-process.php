<?php 
    session_start();
    // Đường dẫn tới hệ  thống
    define('PATH_SYSTEM', __DIR__ .'/system');
    define('PATH_APPLICATION', __DIR__ . '/admin');
    require_once PATH_SYSTEM.'/config/db.php';
    if(isset($_POST['btn_login'])){
        $user_mail = $_POST['user_mail'];
        $user_pass = $_POST['user_pass'];
        $conn = getConnection(); //thiết lập kết nối đến csdl
        //Câu truy vấn kiểm tra thông tin tài khoản vừa nhập có tồn tại trong csdl hay không?
        $sql = "SELECT * FROM users WHERE user_mail = '".$user_mail."' AND user_pass= '".$user_pass."' AND isDelete = 0";
        //thực hiện truy vấn
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            //xoá các session thông báo lỗi khi đã đăng nhập thành công.
            if(isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
            //Lấy thông tin người dùng vừa đăng nhập
            $result = mysqli_fetch_assoc($query);
            //lưu thông tin vào session
            $_SESSION['user']['user_full'] = $result['user_full'];
            $_SESSION['user']['user_mail'] = $result['user_mail'];
            $_SESSION['user']['level'] = $result['user_level'];
            $_SESSION['user']['id'] = $result['user_id'];
            // echo "<pre>";
            // print_r($_SESSION['user']);
            // die;  
            header("location:index.php");
        }else{
            $_SESSION['error_login'] = '<p class="text-center iq-bg-danger rounded-pill mb-3">Tài khoản hoặc mật khẩu không chính xác !</p>';

            //Điều hướng quay trở lại trang trước đó (đăng nhập)
            if(isset($_SERVER['HTTP_REFERER'])) {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }
        closeConnection();
    }

?>