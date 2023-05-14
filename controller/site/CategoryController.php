<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");

    function indexAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        require_once PATH_MODEL.'/Publisher.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        //lấy dữ liệu
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = getAllProductsAndPages($page);
        $data['page'] = $page;
        $data['categories'] = getAllCategories();
        $data['authors'] = getAllAuthor();
        $data['publishers'] = getAllPublisher();
        $data['bestsell_products'] = getBestSellProduct();
        $data['trendy_products'] = getFeaturedProduct();
        // echo "<pre>";
        // print_r($data);
        // die;       
        loadView('master','category/category-product', $data);
    }
    function searchAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_MODEL.'/Author.php';
        require_once PATH_MODEL.'/Publisher.php';
        require_once PATH_MODEL.'/Category.php';

        if (isset($_POST['btn_submit'])) {
            if(isset($_SESSION['search'])){
                unset($_SESSION['search']);
            }
            $sql = "";
            if(!empty($_POST['keyword'])){
                $_SESSION['search']['keyword'] = $_POST['keyword'];
                $keyword = explode(" ", $_POST['keyword']);
                $keyword = "%".implode("%",$keyword)."%";
                $sql .= " AND b.prd_name LIKE '$keyword'";
            }
            if(!empty($_POST['year'])) {
                $_SESSION['search']['year'] = $_POST['year'];
                $year = $_POST['year'];
                $sql .= " AND year(prd_date) = $year";
            }
            if(!empty($_POST['cat_id'])) {
                $_SESSION['search']['cat_id'] = $_POST['cat_id'];
                $cat_id = $_POST['cat_id'];
                $sql .= " AND c.cat_id = '$cat_id'";
            }
            if(!empty($_POST['pub_id'])) {
                $_SESSION['search']['pub_id'] = $_POST['pub_id'];
                $pub_id = $_POST['pub_id'];
                $sql .= " AND p.pub_id = '$pub_id'";
            }
            if(!empty($_POST['aut_id'])) {
                $_SESSION['search']['aut_id'] = $_POST['aut_id'];
                $aut_id = $_POST['aut_id'];
                $sql .= " AND a.aut_id = '$aut_id'";
            }

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $data = searchProduct($page, $sql);
            $data['page'] = $page;
            if(!empty($_POST['keyword'])) {
                $data['keyword'] = $_POST['keyword'];
            }
            if(!empty($_POST['year'])) {
                $data['year'] = $_POST['year'];
            }
            if(!empty($_POST['cat_id'])) {
                $data['cat'] = getCategoryById($_POST['cat_id']);
            }
            if(!empty($_POST['aut_id'])) {
                $data['aut'] = getAuthorById($_POST['aut_id']);
            }
            if(!empty($_POST['pub_id'])) {
                $data['pub'] = getPublisherById($_POST['pub_id']);
            }
        }else{

            $sql = "";
            if(isset($_SESSION['search']['keyword'])){
                $keyword = explode(" ", $_SESSION['search']['keyword']);
                $keyword = "%".implode("%",$keyword)."%";
                $sql .= " AND b.prd_name LIKE '$keyword'";
            }
            if(isset($_SESSION['search']['year'])) {
                $year = $_SESSION['search']['year'];
                $sql .= " AND year(prd_date) = $year";
            }
            if(isset($_SESSION['search']['cat_id'])) {
                $cat_id = $_SESSION['search']['cat_id'];
                $sql .= " AND c.cat_id = '$cat_id'";
            }
            if(isset($_SESSION['search']['pub_id'])) {
                $pub_id = $_SESSION['search']['pub_id'];
                $sql .= " AND p.pub_id = '$pub_id'";
            }
            if(isset($_SESSION['search']['aut_id'])) {
                $aut_id = $_SESSION['search']['aut_id'];
                $sql .= " AND a.aut_id = '$aut_id'";
            }

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $data = searchProduct($page, $sql);
            $data['page'] = $page;
            if(isset($_SESSION['search']['keyword'])) {
                $data['keyword'] = $_SESSION['search']['keyword'];
            }
            if(isset($_SESSION['search']['year'])) {
                $data['year'] = $_SESSION['search']['year'];
            }
            if(isset($_SESSION['search']['cat_id'])) {
                $data['cat'] = getCategoryById($_SESSION['search']['cat_id']);
            }
            if(isset($_SESSION['search']['aut_id'])) {
                $data['aut'] = getAuthorById($_SESSION['search']['aut_id']);
            }
            if(isset($_SESSION['search']['pub_id'])) {
                $data['pub'] = getPublisherById($_SESSION['search']['pub_id']);
            }
        }
                
        // echo "<pre>";
        // print_r($_SESSION['search']);
        // die;
        loadView('master','category/search-result', $data);
    }

?>