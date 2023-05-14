<?php if(empty($data['products'])) { ?>
    <div class="products">
        <h3>Kết quả tìm kiếm với sản phẩm <span><?php echo $data['keyword']; ?></h3>
    </div>
<?php }else{ ?> 
<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $data['keyword']; ?></span>
    </div>
    <div class="product-list row">
        <div class="product-list row">
            <?php foreach ($data['products'] as $key => $product) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                    <div class="product-item card text-center">
                        <a href="index.php?c=product&a=detail&id=<?php echo $product['prd_id']; ?>"><img src="/BookStore/public/site/images/product/<?php echo $product['prd_image']; ?> "></a>
                        <h4><a href="index.php?c=product&a=detail&id=<?php echo $product['prd_id']; ?>"><?php echo $product['prd_name']; ?></a></h4>
                        <p>Giá Bán: <span><?php echo number_format($product['prd_price'], 0, ',', '.'); ?>đ</span></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>

<?php } ?>