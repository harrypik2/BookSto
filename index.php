<?php
    session_start();
    // if(! isset($_SESSION['user'])) {
    //     header("location:sign-in.php");
    // }
    // Đường dẫn tới hệ  thống
       /**
     * ĐỊNH NGHĨA LẠI VÀ THÊM MỘT SỐ ĐƯỜNG DẪN CƠ SỞ
     */
    define('PATH_ROOT', __DIR__); ////C:htdocs\BookSto\
    define('PATH_SYSTEM', __DIR__.'/system');//C:htdocs\BookSto\system
    define('PATH_PUBLIC', __DIR__.'/public');//C:htdocs\BookSto\public
    define('PATH_CONTROLLER', __DIR__.'/controller');//C:htdocs\BookSto\controller
    define('PATH_VIEW',__DIR__.'/view');//C:htdocs\BookSto\view
    define('PATH_MODEL', __DIR__.'/model');
    define('PATH_APPLICATION', PATH_CONTROLLER. '/admin/'); //C:htdocs\BookSto\controller\admin
    define('PATH_SITE', PATH_CONTROLLER.'/site/');//C:htdocs\BookSto\controller\site
    // Lấy thông số cấu hình
    require (PATH_SYSTEM . '/config/config.php');

    // Danh sách tham số gồm hai phần
    //  - controller: controller hiện tại
    //  - action: action hiện tại
    $segments = array(
        'controller'    => '',
        'action'        => array()
    );

    // Nếu không truyền controller thì lấy controller mặc định
    $segments['controller'] = empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];
    // Nếu không truyền action thì lấy action mặc định 
    $segments['action'] = empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];

    
    // Require controller
    require_once PATH_SYSTEM . '/core/loader/Controller.php';
    if(isset($_SESSION['user'])) {
        if($_SESSION['user']['level'] == 1){
            load($segments['controller'], $segments['action'], PATH_APPLICATION); //PATH_APPLICATION: //C:htdocs\BookSto\controller\admin
        }else{
            load($segments['controller'], $segments['action'], PATH_SITE); //user
        }
    }else{
        load($segments['controller'], $segments['action'], PATH_SITE); //user
    }
    
    
?>