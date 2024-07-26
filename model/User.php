<?php 
    require_once PATH_SYSTEM.'/core/model/model.php';
    require_once PATH_SYSTEM.'/config/db.php';
    function getAllUser(){
        $data = [];
        $data = getAll('users');
        return $data;
    }

    function getUserById($id){
        $data = getById('users', $id, 'user_id');
        return $data;
    }

    function storeUser($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('users', $data);
    }

    function updateById($id, $data) {
        update('users', 'user_id', $id, $data);
    }

    function deleteById($id){
        deleteRecordById('users', 'user_id', $id);
    }

    function checkUserByEmail($new_email, $old_email){
        $conn = getConnection();
        //Kiểm tra email mới sửa đã tồn tại trong cơ sở dữ liệu hay chưa và loại trừ email của bản ghi đang sửa.
        $sqlCheckEmailExists = "SELECT * FROM users WHERE user_mail = '$new_email' AND user_mail != '$old_email' AND isDelete = 0";
        $queryCheckEmailExists = mysqli_query($conn, $sqlCheckEmailExists);
        if(mysqli_num_rows($queryCheckEmailExists) > 0) {
            closeConnection();
            return true; //email mới khác email cũ và email mới nhập đã tồn tại
        }
        closeConnection();
        return false; //email mới không tồn tại hoặc email không được sửa.
    }

    function getUserProfilesByIdUser($id){;
        $data = [];
        $data = getById('account', $id, 'user_id');
        return $data;
    }


    function storeProfile($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        //   echo "<pre>";
        //   print_r($data);
        //   die; 
        store('account', $data);                 
     }

    function updateProfileByUserId($user_id, $data) {
        update('account', 'user_id', $user_id, $data);
    }

    

?>