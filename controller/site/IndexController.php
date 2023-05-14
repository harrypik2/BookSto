<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    function indexAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        $data['prd_featureds'] = getFeaturedProduct();
        $data['prd_lastests'] = getLastestProduct();
        $data['prd_bestsell'] = getBestSellProduct();
        $data['prd_randoms'] = getRandomProduct();
        // echo "<pre>";
        // print_r($data);
        // die;
        loadView('master','home/home', $data);
    }
?>