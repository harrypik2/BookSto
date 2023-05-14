<?php
    if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

    function load($controller, $action, $path) {
        // Chuyển đổi tên controller vì nó có định dạng là {Name}Controller: ProductController
        //VD: c=prOducT => strtolower() => product => ucfirst() => Product => ProductController.
        $controller = ucfirst(strtolower($controller)) . 'Controller';

        // chuyển đổi tên action vì nó có định dạng {name}Action: indexAction
        $action = strtolower($action) . 'Action';
        // Kiểm tra file controller có tồn tại hay không
        /**
         * $path: 
         * *** C:htdocs\BookStore\controller\admin\ hoặc là
         * *** C:htdocs\BookStore\controller\site\
         * $controller. '.php' <=> AdminController.php
         * ==> //C:htdocs\BookStore\controller\admin\AdminController.php
         * */
        if (!file_exists($path . $controller . '.php')){ //C:htdocs\BookStore\controller\admin\AdminController.php
            die ('Controller không tồn tại');
        }
    
        require_once $path . $controller . '.php';

        if(!function_exists($action)) { // !false = true
            die('Action không tồn tại');
        }
        $action(); //indexAction();
    }

?>