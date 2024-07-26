<?php 
    /**
     * File: CartController.php
     * Desc: Xử lý thông tin giỏ hàng
     * Author: Tạ Văn Phúc
     * Date: 28/04/2023
     */

    //Bảo vệ file : Yêu cầu bắt buộc phải đi từ file index.php
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    /**
     * method: indexAction()
     * desc: Hiển thị thông tin giỏ hàng.
     * @param: 
     * result: trả về view trang giỏ hàng
     * author: Tạ Văn Phúc
     */
    function indexAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_MODEL.'/User.php';
        $data = [];
        $ids = [];
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $prd_id => $value) {
                $ids[] = $prd_id;
            }
            $ids = "(".implode(",", $ids).")";
            $data = getAllProductInList($ids);
        }
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];
            $dataUser = getUserProfilesByIdUser($user_id);
            if (empty($dataUser)){
                $_SESSION['profile']['fullname'] = "";
                $_SESSION['profile']['mail'] = "";
                $_SESSION['profile']['phone'] = "";
                $_SESSION['profile']['address'] = "";
                
            }else{
                $_SESSION['profile']['fullname'] = $dataUser['acc_full_name'];
                $_SESSION['profile']['mail'] = $_SESSION['user']['user_mail'];
                $_SESSION['profile']['phone'] = $dataUser['acc_phone_number'];
                $_SESSION['profile']['address'] = $dataUser['acc_address'];
            }
        }

        // unset($_SESSION['cart']);
        // echo "<pre>";
        // print_r($_SESSION['profile']);
        // die;
        loadView('master','cart/cart', $data);
    }
    /**
     * method: addAction()
     * desc: Thêm sản phẩm vào giỏ hàng.
     * @param: 
     * result: Sản phẩm được thêm vào giỏ hàng theo id
     * author: Tạ Văn Phúc
     */
    function addAction() {
        require_once PATH_MODEL.'/Product.php';
        if(isset($_SESSION['user'])){
            $id = $_GET['id']; //lấy id giỏ hàng trên đường dẫn
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['qty']++;
            }else{
                $_SESSION['cart'][$id]['qty'] = 1;
                $data = getProductById($id);
                $_SESSION['cart'][$id]['prd_price'] = $data['prd_price'];
            }

            //Thêm thông báo vào session để hiển thi ra view
            $_SESSION['notification'] = "This is a server-side notification message.";

            // echo "<pre>";
            // print_r($_SESSION['toastr_message']);
            // die;

            header("Location:".$_SERVER['HTTP_REFERER']); 
        }else{
        header("Location:index.php?c=cart&a=index");
        }
    }

    /**
     * method: updateAction()
     * desc: Cập nhật thông tin giỏ hàng.
     * @param: 
     * result: Số lượng/ sản phẩm trong giỏ hàng được cập nhật
     * author: Tạ Văn Phúc
     */
    function updateAction() {
        foreach ($_POST['quantity'] as $prd_id => $qty) {
            $_SESSION['cart'][$prd_id]['qty'] = $qty;   
        }
        header("Location:index.php?c=cart&a=index");
    }

    /**
     * method: deleteAction()
     * desc: Xóa sản phẩm trong giỏ hàng.
     * @param: 
     * result: Sản phẩm sẽ được xóa dựa theo id truyền trên đường dẫn
     * author: Tạ Văn Phúc
     */
    function deleteAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if(isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }else{
                $_SESSION['cart_error_del'] = "Sản phẩm không tồn tại giỏ hàng!";
            }
            //Nếu trong giỏ hàng không còn sp nào thì xóa SESSION giỏ hàng.
            if(count($_SESSION['cart']) == 0) {
                unset($_SESSION['cart']);
            }
            header("Location:index.php?c=cart&a=index");
        }else{
            header("Location:index.php?c=cart&a=index");
        }
    }

    /**
     * method: storeAction()
     * desc: Thêm bản ghi vào bảng orders và order_detail.
     * @param: 
     * result: Bản ghi sẽ được tạo trong bảng orders và order_detail khi khách hàng
     * bấm nút mua hàng.
     * author: Tạ Văn Phúc
     */

    function storeAction() {
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data = [
            'user_id' => $_SESSION['user']['id'],
            'user_name' => $_POST['fullname'],
            'user_email' => $_POST['mail'],
            'user_phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'status' => 1,
            'all_price' => $_POST['all_price'],
            'order_date' => $date
        ];
        // echo "<pre>";
        // print_r($data);
        // die;
        storeOrder($data);
        unset($_SESSION['cart']);
        loadView('master','checkout/success');
        // header('Location:index.php');
    }

    function historyAction() {
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        if(isset($_SESSION['user'])){ 
        $idUser = $_SESSION['user']['id'];
        //lấy dữ liệu
        $data = getAllOrdersByIdUser($idUser);
        }
        // echo "<pre>";
        // print_r($data);
        // die;
        //trả về view (hiển thị ra trình duyệt)
        loadView('master','cart/list-history-order', $data);
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
                loadView('master','cart/detail-history-order', $data);
            }
        }else{
            loadView('master', 'error/404'); //trường hợp id không được truyền lên.
        }
       
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

?>