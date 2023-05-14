<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    /**
     * Trả về danh sách sản phẩm
     */
    function getAllProducts() {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        $data = [];

        $conn = getConnection();
        $sqlAllProduct = "SELECT b.*, a.aut_name, c.cat_name, p.pub_name FROM books b
        INNER JOIN category c ON b.cat_id = c.cat_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id
        INNER JOIN author a ON a.aut_id = ba.aut_id
        INNER JOIN publisher p ON b.pub_id = p.pub_id
        WHERE  b.isDelete = 0 ORDER BY b.prd_id DESC";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data[] = $row;
            }
        }

        closeConnection();
        return $data;
    }

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllProductsAndPages($page) {
        $data = [];
        
        $limit = 12;
        $current_page = $page;
        $totalRecords = getTotalRecord();
        $totalPage = ceil($totalRecords/$limit);
        // SELECT * FROM product LIMIT 0, 5; //lấy các bản ghi từ 0 - 4
        // SELECT * FROM product LIMIT 5, 5; // lấy các bản ghi từ 5-9
        // page 0 => (1-1) * 5  = 0
        // page 1 => (2-1) * 5  = 5
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnection();
        $sqlAllProduct = "SELECT b.*, a.aut_name, c.cat_name, p.pub_name FROM books b
        INNER JOIN category c ON b.cat_id = c.cat_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id
        INNER JOIN author a ON a.aut_id = ba.aut_id
        INNER JOIN publisher p ON b.pub_id = p.pub_id
        WHERE b.isDelete = 0 AND b.prd_status = 1 
        ORDER BY b.prd_id DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['products'][] = $row;
            }
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }
    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecord() {
        $conn = getConnection();
        $sqlProduct = "SELECT * FROM books WHERE isDelete = 0 AND prd_status = 1";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnection();
        return $totalRecords;
    }
    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecordByCategory($cat_id) {
        $conn = getConnection();
        $sqlProduct = "SELECT * FROM books WHERE cat_id = $cat_id AND isDelete = 0 AND prd_status = 1";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnection();
        return $totalRecords;
    }

    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecordbySearch($sql) {
        $conn = getConnection();
        $sqlProduct = "SELECT b.* ,a.aut_name, c.cat_name, p.pub_name FROM books b 
        INNER JOIN category c ON b.cat_id = c.cat_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id
        INNER JOIN author a ON a.aut_id = ba.aut_id
        INNER JOIN publisher p ON b.pub_id = p.pub_id 
        WHERE TRUE AND b.isDelete = 0 AND b.prd_status = 1 $sql";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnection();
        return $totalRecords;
    }

    function getProductById($id){
        $data = [];
        $data = getById('books', $id, 'prd_id');
        return $data;
    }

    function getProductAndAuthorById($id) {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        $data = [];

        $conn = getConnection();
        $sqlAllProduct = "SELECT b.*, a.aut_name FROM books b 
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
        INNER JOIN author a ON a.aut_id = ba.aut_id 
        WHERE b.prd_id = '$id'";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data = $row;
            }
        }

        closeConnection();
        return $data;
    }



    function getProductsByCategory($catId) {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Author.php';
        $data = [];

        $conn = getConnection();
        $sqlAllProduct = "SELECT b.*, a.aut_name, c.cat_name FROM books b
        INNER JOIN category c ON b.cat_id = c.cat_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id
        INNER JOIN author a ON a.aut_id = ba.aut_id
        WHERE b.cat_id = '$catId' AND b.isDelete = 0 AND b.prd_status = 1 
        ORDER BY RAND() LIMIT 6";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data[] = $row;
            }
        }

        closeConnection();
        return $data;
    }


    
    // function storeProduct($data) {
    //     //gọi hàm store trong model.php để truyền tên bảng và data.
    //     store('books', $data);
    // }
    function storeProduct($data, $aut_id) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        $insertedID = store('books', $data);

        $data_item = [
            'prd_id' => $insertedID,
            'aut_id' => $aut_id,
        ];     
        // echo "<pre>";
        //   print_r($data_item);
        //   die;             
        store('bookauthor', $data_item);
     }

    function updateProductById($id, $data ,$aut_id) {
        update('books', 'prd_id', $id, $data);
        $data_item = [
            'aut_id' => $aut_id,
        ];
        update('bookauthor', 'prd_id', $id, $data_item);
    }

    function deleteProductById($id){
        deleteRecordById('books', 'prd_id', $id);
    }

    function getFeaturedProduct() {
        $conn = getConnection();
        $data = [];
        $sqlProduct = "SELECT b.*, a.aut_name FROM books b 
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
        INNER JOIN author a ON a.aut_id = ba.aut_id 
        WHERE prd_featured = 1 AND b.isDelete = 0 AND b.prd_status = 1 
        ORDER BY prd_id DESC LIMIT 6";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data['products'][] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    function getLastestProduct() {
        $conn = getConnection();
        $data = [];
        $sqlProduct = "SELECT b.*, a.aut_name FROM books b 
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
        INNER JOIN author a ON a.aut_id = ba.aut_id 
        WHERE b.isDelete = 0 AND b.prd_status = 1 
        ORDER BY prd_id DESC LIMIT 12;";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data['products'][] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    function getBestSellProduct() {
        $conn = getConnection();
        $data = [];
        $sqlProduct = "SELECT b.*, a.aut_name, p.pub_name, SUM(od.qty) AS 'productQty' FROM 
        orderdetail od INNER JOIN books b ON od.prd_id = b.prd_id
        INNER JOIN orders o ON od.order_id = o.order_id
        INNER JOIN publisher p ON p.pub_id = b.pub_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
        INNER JOIN author a ON a.aut_id = ba.aut_id
        WHERE YEAR(o.order_date) = '2023' AND b.isDelete = 0 AND b.prd_status = 1 
        GROUP BY od.prd_id ORDER BY SUM(od.qty) DESC LIMIT 12;";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data['products'][] = $row;
            }
        }
        closeConnection();
        return $data;
    }


    function getRandomProduct() {
        $conn = getConnection();
        $data = [];
        $sqlProduct = "SELECT * FROM books WHERE isDelete = 0 AND prd_status = 1 ORDER BY RAND() LIMIT 9;";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }
    function getAllProductInList($ids) {
        $conn = getConnection();
        $data = [];
        $sqlProduct = "SELECT b.*, a.aut_name FROM books b 
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
        INNER JOIN author a ON a.aut_id = ba.aut_id 
        WHERE b.prd_id IN $ids AND b.isDelete = 0 AND b.prd_status = 1";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }

?>