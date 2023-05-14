<?php 
        // Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
        if($_SESSION['user']['level'] != 1) die('You have not permission!');
        // Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
        if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
    
        function indexAction() {
            require_once PATH_MODEL.'/Order.php';
            require_once PATH_SYSTEM.'/core/view/view.php';
            $data = [];
            //lấy dữ liệu
            // $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $data = getAllOrders();
            // $data['page'] = $page;
            // echo "<pre>";
            // print_r($data);
            // die;
            //trả về view (hiển thị ra trình duyệt)
            loadView('master','order/list-order', $data);
        }

        function detailAction() {
            require_once PATH_MODEL.'/Order.php';
            require_once PATH_SYSTEM.'/core/view/view.php';
            $data = [];
            if(isset($_GET['id'])) {
                if(empty($_GET['id'])){
                    loadView('master', 'error/404'); //Nếu như prd_id trên đường dẫn là rỗng
                }else{
                    $id = $_GET['id'];
                    $data = getOrderDetailById($id);
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    loadView('master','order/detail-order', $data);
                }
            }else{
                loadView('master', 'error/404'); //trường hợp id không được truyền lên.
            }
           
        }

        function editAction() {
            require_once PATH_MODEL.'/Order.php';
            require_once PATH_SYSTEM.'/core/view/view.php';
            $data = [];
            if(isset($_GET['id'])) {
                if(empty($_GET['id'])){
                    loadView('master', 'error/404'); //Nếu như prd_id trên đường dẫn là rỗng
                }else{
                    $id = $_GET['id'];
                    $data= getOrderById($id);
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    loadView('master','order/edit-order', $data);
                }
            }else{
                loadView('master', 'error/404'); //trường hợp id không được truyền lên.
            }
        }

        function updateAction() {

        require_once PATH_MODEL.'/Order.php';
    
        $data = [
            'user_name' => $_POST['user_name'],
            'user_email' => $_POST['user_mail'],
            'user_phone' => $_POST['user_phone'],
            'address' => $_POST['address'],
            'status' => $_POST['status'],
        ];

        // echo "<pre>";
        // print_r($data);
        // die;
        updateOrderById($_GET['id'], $data);
        header("Location:index.php?c=Order&a=index"); 

        }

        function cancelAction() {
            require_once PATH_MODEL.'/Order.php';
        
            $data = [
                'status' => 6
            ];
            // echo "<pre>";
            // print_r($data);
            // die;
            updateOrderById($_GET['id'], $data);
            header("Location:".$_SERVER['HTTP_REFERER']); 
    
        }

        function checkAction() {
            require_once PATH_MODEL.'/Order.php';

            $data = getOrderDetailById($_GET['id']);
            

            if ($data['order']['status'] > 0 && $data['order']['status'] < 5) {
                $check = $data['order']['status'];
                $check ++ ;
            }

        
            $data_check = [
                'status' => $check
            ];

            // echo "<pre>";
            // print_r($check);
            // die;
            
            updateOrderById($_GET['id'], $data_check);
            header("Location:".$_SERVER['HTTP_REFERER']);
            // header("Location:index.php?c=Order&a=index");
    
        }


?>