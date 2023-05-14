<?php 
    include_once "config.php";
    $conn = null;
    function getConnection(){
        $conn = mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
        if($conn == null) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');
        return $conn;
    }

    function closeConnection() {
        global $conn;
        if($conn) {
            mysqli_close($conn);
        }
    }
?>