<?php 
     function createMenu() {
         require_once PATH_MODEL.'/Category.php';
         $category = getAllCategories();
         echo "<ul>";
         foreach ($category as $key => $cate) {
            echo '<li class="menu-item"><a href="index.php?c=product&a=category&id='.$cate['cat_id'].'">'.$cate['cat_name'].'</a></li>';
         }
         echo "</ul>";
     }

     function pagination() {

     }
?>