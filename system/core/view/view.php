<?php 
    function loadView($master,$view, $data = null){
        // require_once PATH_APPLICATION.'/view/'.$master.'.php';
        if(isset($_SESSION['user'])) {
            if($_SESSION['user']['level'] == 1){
                require_once PATH_VIEW.'/admin/'.$master.'.php'; //admin
            }else{
                require_once PATH_VIEW.'/site/'.$master.'.php';  //user
            }
        }else{
            require_once PATH_VIEW.'/site/'.$master.'.php';  //user 
        }
    }
?>