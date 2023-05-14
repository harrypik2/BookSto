<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    function getAllAuthor(){
        $data = [];
        $data = getAll('author');
        return $data;
    }

    function getAuthorById($id) {
        $data = [];
        $data = getById('author', $id, 'aut_id');
        return $data;
    }

    function getAuthorProductById($id) {
        $data = [];
        $data = getById('bookauthor', $id, 'prd_id');
        return $data;
    }

    function storeAuthor($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('author', $data);
    }

    function updateAuthorById($id, $data) {
        update('author', 'aut_id', $id, $data);
    }

    function deleteAuthorById($id){
        deleteRecordById('author', 'aut_id', $id);
    }

?>