<?php
    require_once PATH_SYSTEM.'/config/db.php';
    function getAll($table) {
        $data = [];
        $conn = getConnection();
        $sql = "SELECT * FROM $table WHERE isDelete = 0";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    function getById($table, $id, $column) {
        $conn = getConnection();
        $sql = "SELECT * FROM $table WHERE `$column` = $id";
        $query = mysqli_query($conn, $sql);
        $row = [];
        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
        }
        return $row;
    }
    /***
     * function: store
     * desc: Lưu thông tin vào csdl
     * @param: $table, $data
     */
    function store($table, $data) {
        $columns = "$table(";
        $values = "(";
        foreach ($data as $column => $value) {
            $columns .= "$column,";
            $values .= "'$value',";
        }

        $columns = rtrim($columns, ','); //users(column1, column2, column3 => cần đóng ngoặc.
        $columns .= ")";
        $values = rtrim($values, ','); //($value1, $value2, $value3 => cần đóng ngoặc.
        $values .= ")";
        $sqlInsert = "INSERT INTO $columns VALUES $values";
        // echo $sqlInsert;
        $conn = getConnection();
        mysqli_query($conn, $sqlInsert);
        return mysqli_insert_id($conn);
    }

    function deleteRecordById($table, $cond, $id) {
        $conn = getConnection();
        $sqlDelete = "UPDATE $table SET `isDelete` = '1' WHERE $cond = '$id'";
        // $sqlDelete = "UPDATE $table SET isDelete = 1 WHERE $cond='$id' ";
        mysqli_query($conn, $sqlDelete);
        closeConnection();
    }
    /*
    * $table : tên bảng
    * $cond : tên cột điều kiện để update
    * $id: giá trị của cột điều kiện để update
    * $data: mảng kết hợp có key là tên cột, và value là giá trị của cột
    */
    function update($table, $cond, $id, $data) {
        //$data được tổ chức dưới dạng: Key => column, value => value
        $conn = getConnection();
        $str = " ";
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',"; //user_mail = $user_mail
        }
        $str = rtrim($str, ",");
        $sqlUpdate = "UPDATE $table SET $str WHERE $cond = $id";
        // echo $sqlUpdate;
        mysqli_query($conn, $sqlUpdate);
        closeConnection();
    }

    // function hasMany($table1, $table2, $id1, $id2) {

    // }
?>