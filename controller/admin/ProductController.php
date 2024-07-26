<?php 
    // Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
    if($_SESSION['user']['level'] != 1) die('You have not permission!');
    // Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
    if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

    function indexAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        //lấy dữ liệu
        // $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = getAllProducts();
        // $data['page'] = $page;
        // echo "<pre>";
        // print_r($data);
        // die;
        //trả về view (hiển thị ra trình duyệt)
        loadView('master','product/list-product', $data);
    }

    /**
     * Hiển thị giao diện thêm mới sản phẩm
     */
    function createAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        require_once PATH_MODEL.'/Publisher.php';
        $data['categories'] = getAllCategories();
        $data['authors'] = getAllAuthor();
        $data['publishers'] = getAllPublisher();
        // echo "<pre>";
        // print_r($data);
        // die;
        loadView('master','product/add-product', $data);
    }

    /**
     * Thực hiện việc lưu sản phẩm vào CSDL
     */
    function storeAction() {
        require_once PATH_MODEL.'/Product.php'; 
        $data['prd_name'] = $_POST['prd_name'];//not empty
        //Tự triển khai thêm validate các trường còn lại.
        $data['prd_price'] = $_POST['prd_price'];
        $data['prd_date'] = $_POST['prd_date'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['pub_id'] = $_POST['pub_id'];
        $data['prd_status'] = $_POST['prd_status'];

        if(isset($_POST['prd_featured'])) {
            $data['prd_featured'] = $_POST['prd_featured'];
        }else{
            $data['prd_featured'] = 0;
        }

        if(isset($_POST['prd_detail'])) {
            $data['prd_detail'] = $_POST['prd_detail'];
        }else{
            $data['prd_detail'] = "Không có mô tả nào cho cuốn sách này!" ;
        }
        
        // upload ảnh
        if(!empty($_FILES['prd_image']['name'])) {
            $uploadDir = 'public/uploads/';
            $uniqueName = uniqid() . '-' . basename($_FILES['prd_image']['name']);
            $data['prd_image'] = $uniqueName;
            $tmp_name = $_FILES['prd_image']['tmp_name'];
            move_uploaded_file($tmp_name, $uploadDir.$uniqueName);
        }else{
            $data['prd_image'] = "no-img.jpg";
        }

        //Validate thêm các trường còn lại để đưa vào làm điều kiện
        if(!$data['prd_name'] || !isset($data['prd_image'])){
            if(isset($_SERVER['HTTP_REFERER'])) {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }
        // echo "<pre>";
        // print_r($data);
        // die;
        storeProduct($data, $_POST['aut_id']);
        header("location:index.php?c=product&a=index");

    }

    function editAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        require_once PATH_MODEL.'/Publisher.php';
        require_once PATH_MODEL.'/Product.php';
        if(isset($_GET['id'])) {
            if(empty($_GET['id'])){
                loadView('master', 'error/500'); //Nếu như prd_id trên đường dẫn là rỗng
            }else{
                $id = $_GET['id'];
                $data['product'] = getProductById($id);
                $data['product']['author'] = getAuthorProductById($id);
                if(empty($data['product'])) {
                    loadView('master', 'error/404'); //không tìm thấy bản ghi nào phù hợp
                }
                $data['categories'] = getAllCategories();
                $data['authors'] = getAllAuthor();
                $data['publishers'] = getAllPublisher();
                // echo "<pre>";
                // print_r($data);
                // die;
                loadView('master', 'product/edit-product', $data);
            }
        }else{
            loadView('master', 'error/404'); //trường hợp id không được truyền lên.
        }
       
    }

    function updateAction() {
        require_once PATH_MODEL.'/Product.php'; 
        $data['prd_name'] = $_POST['prd_name'];//not empty
        //Tự triển khai thêm validate các trường còn lại.
        $data['prd_price'] = $_POST['prd_price'];
        $data['prd_date'] = $_POST['prd_date'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['pub_id'] = $_POST['pub_id'];
        $data['prd_status'] = $_POST['prd_status'];
        $data['prd_detail'] = $_POST['prd_detail'];

        if(isset($_POST['prd_featured'])) {
            $data['prd_featured'] = $_POST['prd_featured'];
        }else{
            $data['prd_featured'] = 0;
        }

        // upload ảnh
        if(!empty($_FILES['prd_image']['name'])) {
            $uploadDir = 'public/uploads/';
            $uniqueName = uniqid() . '-' . basename($_FILES['prd_image']['name']);
            $data['prd_image'] = $uniqueName;
            $tmp_name = $_FILES['prd_image']['tmp_name'];
            move_uploaded_file($tmp_name, $uploadDir.$uniqueName);
        }

        //Validate thêm các trường còn lại để đưa vào làm điều kiện
        if(!$data['prd_name'] || !isset($data['prd_image'])){
            if(isset($_SERVER['HTTP_REFERER'])) {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }
        // echo "<pre>";
        // print_r($data);
        // die;
        updateProductById($_GET['id'],$data,$_POST['aut_id']);
        header("location:index.php?c=product&a=index");
    }

    function deleteAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        //xử lý lưu dữ liệu
        if(isset($_GET['id'])) {
            if(empty($_GET['id'])){
                loadView('master', 'error/404'); //Nếu như prd_id trên đường dẫn là rỗng
            }else{
                $id = $_GET['id'];
                $data['product'] = getProductById($id);
                if(empty($data['product'])) {
                    loadView('master', 'error/404'); //không tìm thấy bản ghi nào phù hợp
                }
                deleteProductById($id);
                header("location:index.php?c=product&a=index");
            }
        }else{
            loadView('master', 'error/404'); //trường hợp id không được truyền lên.
        }
    }
?>