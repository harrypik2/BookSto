<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    function detailAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        if(isset($_GET['id'])) {
            $data['product'] = getProductAndAuthorById($_GET['id']);
            $data['bestsell_products'] = getBestSellProduct();
            $data['trendy_products'] = getFeaturedProduct();
            // echo "<pre>";
            // print_r($data);
            // die;
            loadView('master','product/product-detail', $data);
        }else{
            header("Location:index.php");
        }
    }

    function categoryAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        //lấy dữ liệu
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $catId = $_GET['id'];
        $data = getAllProductsByCategory($page, $catId);
        $data['page'] = $page;
        loadView('master','product/category-product', $data);
    }

?>