<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    function getAllPublisher(){
        $data = [];
        $data = getAll('publisher');
        return $data;
    }

    function getPublisherById($id) {
        $data = [];
        $data = getById('publisher', $id, 'pub_id');
        return $data;
    }

    function storePublisher($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('publisher', $data);
    }

    function updatePublisherById($id, $data) {
        update('publisher', 'pub_id', $id, $data);
    }

    function deletePublisherById($id){
        deleteRecordById('publisher', 'pub_id', $id);
    }
?>