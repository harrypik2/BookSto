<?php 
    require_once PATH_SYSTEM.'/core/model/model.php';


    /**
     * Trả về tổng số member trong bảng Users
    */
    function getTotalMember() {
        $conn = getConnection();
        $sqlProduct = "SELECT * FROM users WHERE user_level = 2";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnection();
        return $totalRecords;
    }

    function getMonth($month) {
        switch ($month) {
            case 1:
                $textMonth = "'"."Jan"."'";
                break;
            case 2:
                $textMonth = "'"."Feb"."'";
                break;
            case 3:
                $textMonth = "'"."Mar"."'";
                break;
            case 4:
                $textMonth = "'"."Apr"."'";
                break;
            case 5:
                $textMonth = "'"."May"."'";
                break;
            case 6:
                $textMonth = "'"."Jun"."'";
                break;
            case 7:
                $textMonth = "'"."Jul"."'";
                break;
            case 8:
                $textMonth = "'"."Aug"."'";
                break;
            case 9:
                $textMonth = "'"."Sep"."'";
                break;  
            case 10:
                $textMonth = "'"."Oct"."'";
                break;
            case 11:
                $textMonth = "'"."Nov"."'";
                break;
            case 12:
                $textMonth = "'"."Dec"."'";
                break;
        }
        
        return $textMonth;
    }
?>