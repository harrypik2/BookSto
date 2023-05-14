<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    function getAllCategories() {
        $data = [];
        $data = getAll('category');
        return $data;
    }

    function getCategoryById($id) {
        $data = [];
        $data = getById('category', $id, 'cat_id');
        return $data;
    }

    function storeCategory($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('category', $data);
    }

    function updateCategoryById($id, $data) {
        update('category', 'cat_id', $id, $data);
    }

    function deleteCategoryById($id){
        deleteRecordById('category', 'cat_id', $id);
    }

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllProductsByCategory($page, $catId) {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        $limit = 6;
        $current_page = $page;
        $totalRecords = getTotalRecordByCategory($catId);
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnection();
        $sqlAllProduct = "SELECT b.*, c.cat_name FROM books b 
        INNER JOIN category c ON b.cat_id = c.cat_id 
        WHERE b.cat_id = $catId AND b.isDelete = 0 AND b.prd_status = 1 
        ORDER BY prd_id DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['products'][] = $row;
            }
        }
        $data['cat_name'] = getCategoryById($catId)['cat_name'];
        $data['totalPage'] = $totalPage;
        return $data;
    }

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function searchProduct($page, $sql) {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        $limit = 12;
        $current_page = $page;
        $totalRecords = getTotalRecordbySearch($sql);
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnection();
        
        $sqlSearch = "SELECT b.*, a.aut_name, c.cat_name, p.pub_name FROM books b
        INNER JOIN category c ON b.cat_id = c.cat_id
        INNER JOIN bookauthor ba ON b.prd_id = ba.prd_id
        INNER JOIN author a ON a.aut_id = ba.aut_id
        INNER JOIN publisher p ON b.pub_id = p.pub_id 
        WHERE TRUE AND b.isDelete = 0 AND b.prd_status = 1 $sql
        ORDER BY b.prd_id DESC LIMIT $start, $limit";
        $querySearch = mysqli_query($conn, $sqlSearch);
        if(mysqli_num_rows($querySearch) > 0) {
            while($row = mysqli_fetch_assoc($querySearch)) {
                $data['products'][] = $row;
            }
        }

        $data['totalPage'] = $totalPage;
        $data['totalRecord'] = $totalRecords;
        return $data;
    }

?>