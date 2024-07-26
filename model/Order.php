<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    function getAllOrders(){
        $data = [];
        $conn = getConnection();
        $sql = "SELECT * FROM orders ORDER BY order_id DESC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    function getAllOrdersUnprocess(){
        $data = [];
        $conn = getConnection();
        $sql = "SELECT * FROM orders WHERE status = 1 ORDER BY order_id DESC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    function getAllOrdersByIdUser($id){
        $data = [];
        $conn = getConnection();
        $sql = "SELECT * FROM orders WHERE user_id = '$id'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        closeConnection();
        return $data;
    }

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    /*function getAllOrders($page) {
        $data = [];
        
        $limit = 5;
        $current_page = $page;
        $totalRecords = getTotalRecord();
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnection();
        $sqlAllProduct = "SELECT * FROM orders ORDER BY order_id DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['orders'][] = $row;
            }
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }*/


    function getTotalOrder() {
        $conn = getConnection();
        $sqlOrder = "SELECT * FROM orders WHERE status IN (1,2,3,4)";
        $queryOrder = mysqli_query($conn, $sqlOrder);
        $totalRecords = mysqli_num_rows($queryOrder);
        closeConnection();
        return $totalRecords;
    }

    function getTotalSale() {
        $conn = getConnection();
        $sqlOrder = "SELECT SUM(qty) AS 'productQty' FROM orderdetail";
        $queryOrder = mysqli_query($conn, $sqlOrder);
        if(mysqli_num_rows($queryOrder) > 0) {
            while($row = mysqli_fetch_assoc($queryOrder)) {
                $data = $row['productQty'];
            }
        }
        closeConnection();
        return $data;
    }

    /**
     * Lấy chi tiết của một đơn hàng
     */

     function getOrderDetailById($id) {
        $data = [];
        //Lấy thông tin đơn hàng theo Id
        $data['order'] = getById('orders', $id, 'order_id');
        //Lấy chi tiết đơn hàng (các sản phẩm được mua bởi đơn hàng có id là $id) từ bảng orderdetail
        //Chi tiết đơn hàng cần thông tin từ bảng sản phẩm, và bảng danh mục nên phải join với các bảng product, category
        $conn = getConnection();
        $sqlDetail = "SELECT * FROM orderdetail od 
                        INNER JOIN books b ON od.prd_id = b.prd_id
                        INNER JOIN category c ON c.cat_id = b.cat_id
                        INNER JOIN publisher p ON p.pub_id = b.pub_id
                        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id 
                        INNER JOIN author a ON a.aut_id = ba.aut_id
                        WHERE od.order_id = $id";
        $sqlQuery = mysqli_query($conn, $sqlDetail);
        if(mysqli_num_rows($sqlQuery) > 0) {
            while($row = mysqli_fetch_assoc($sqlQuery)) {
                $data['details'][] = $row;
            }
        }
        return $data;
     }

     /***
      * Lấy chi tiết đơn hàng theo id
      */

      function getOrderById($id) {
        $data = [];
        //Lấy thông tin đơn hàng theo Id
        $data = getById('orders', $id, 'order_id');
        return $data;
      }

      /**
       * Thêm thông tin vào bảng order
       */

       function storeOrder($data) {
          //gọi hàm store trong model.php để truyền tên bảng và data.
           $insertedID = store('orders', $data);
           if(isset($_SESSION['cart'])) {
               foreach ($_SESSION['cart'] as $prd_id => $item) {
                    $data_item = [
                        'order_id' => $insertedID,
                        'prd_id' => $prd_id,
                        'price' => $item['prd_price'],
                        'qty' => $item['qty']
                    ];                  
                    store('orderdetail', $data_item);
                }
            }
            // echo "<pre>";
            // print_r($prd_id);
            // die;
       }

       function updateOrderById($id, $data) {
        update('orders', 'order_id', $id, $data);
    }

    function getRevenueByYear($year) {
        $data = [];
        $conn = getConnection();
        $sqlDetail = "SELECT SUM(all_price) as 'Total', month(order_date) as 'monthRevenue' 
                      FROM `orders` WHERE year(order_date)='$year' AND status = 5 GROUP BY month(order_date)";
        $sqlQuery = mysqli_query($conn, $sqlDetail);
        if(mysqli_num_rows($sqlQuery) > 0) {
            while($row = mysqli_fetch_assoc($sqlQuery)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function getBestSellOnYear() {
        $data = [];
        $conn = getConnection();
        $sqlDetail = "SELECT b.prd_name, SUM(od.qty) AS 'productQty' FROM 
        orderdetail od INNER JOIN books b ON od.prd_id = b.prd_id
        INNER JOIN orders o ON od.order_id = o.order_id
        WHERE YEAR(o.order_date) = YEAR(CURRENT_DATE) GROUP BY od.prd_id
        ORDER BY SUM(od.qty) DESC LIMIT 10";
        $sqlQuery = mysqli_query($conn, $sqlDetail);
        if(mysqli_num_rows($sqlQuery) > 0) {
            while($row = mysqli_fetch_assoc($sqlQuery)) {
                $data[] = $row;
            }
        }
        return $data;
    }

?>