<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

//Action mặc định khi người dùng truy cập vào đường dẫn ..index.php
function indexAction() {
    require_once PATH_MODEL.'/Admin.php';
    require_once PATH_MODEL.'/Product.php';
    require_once PATH_MODEL.'/Order.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    $data['totalMember'] = getTotalMember(); 
    $data['totalBook'] = getTotalRecord();
    $data['totalSale'] = getTotalSale();
    $data['totalOrder'] = getTotalOrder();
    $data['unprocessOrder'] = getAllOrdersUnprocess();
    if (!isset($_GET['year'])) {
        $year = '2023';
    }else{
        $year = $_GET['year'];
    }
    $data['revenue'] = getRevenueByYear($year);

    $month = [];
    $revenue = [];
    if(!empty($data['revenue'])){
        foreach ($data['revenue'] as $key => $numMonth) {
            $textMonth = getMonth($numMonth['monthRevenue']);
            $month[] = $textMonth;
        }
        $month = "[".implode(",", $month)."]";
        $data['chart']['month'] = $month;
    }

    if(!empty($data['revenue'])){
        foreach ($data['revenue'] as $key => $amount) {
            $total[] = $amount['Total'];
        }
        $total = "[".implode(",", $total)."]";
        $data['chart']['total'] = $total;
    }

    $data['bestsell'] = getBestSellOnYear();
    $prd_name = [];
    $qty = [];
    $a= [];

    if(!empty($data['bestsell'])){
        foreach ($data['bestsell'] as $key => $booksname) {
            $prd_name[] = "'".$booksname['prd_name']."'";

        }
        $prd_name = "[".implode(",",$prd_name)."]";
        $data['bar']['prd_name'] = $prd_name;
    }

    if(!empty($data['bestsell'])){
        foreach ($data['bestsell'] as $key => $prd_qty) {
            $qty[] = $prd_qty['productQty'];
        }
        $qty = "[".implode(",", $qty)."]";
        $data['bar']['qty'] = $qty;
    }

    // echo "<pre>";
    // print_r($data);
    // die;
    loadView('master','Dashboard/dashboard', $data );
}


function createAction() {
    loadView('master','create');
}

function storeAction() {

}

function editAction($id) {

}

function updateAction() {
    require_once PATH_MODEL.'/model/Admin.php';
    
}

?>