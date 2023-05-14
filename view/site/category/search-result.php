<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                  <div class="iq-header-title">
                     <h5 class="card-title mb-0">
                     Found <?php echo $data['totalRecord']; ?> books
                        <?php if(isset($data['keyword'])) echo '|| Keyword: '.$data['keyword'] ; ?>
                        <?php if(isset($data['cat'])) echo "|| Genres: ".$data['cat']['cat_name'] ; ?>
                        <?php if(isset($data['year'])) echo "|| Year: ".$data['year'] ; ?>                        
                        <?php if(isset($data['aut'])) echo "|| Author: ".$data['aut']['aut_name'] ; ?>
                        <?php if(isset($data['pub'])) echo "|| Publisher: ".$data['pub']['pub_name'] ; ?>
                     </h5>
                  </div>
               </div>
               <?php if(isset($data['products'])) { ?> 
               <div class="iq-card-body">
                  <div class="row">
                     <?php foreach ($data['products'] as $product) { ?>
                     <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                           <div class="iq-card-body p-0">
                              <div class="d-flex align-items-center">
                                 <div class="col-6 p-0 position-relative image-overlap-shadow">
                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                          src="/BookSto/public/uploads/<?php echo $product['prd_image']; ?>"
                                          alt=""></a>
                                    <div class="view-book">
                                       <a href="index.php?c=product&a=detail&id=<?php echo $product['prd_id']; ?>"
                                          class="btn btn-sm btn-white">View Book</a>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="mb-2">
                                       <h6 class="mb-1"><?php echo $product['prd_name']; ?></h6>
                                       <p class="font-size-13 line-height mb-1"><?php echo $product['aut_name']; ?></p>
                                       <div class="d-block line-height">
                                          <span class="font-size-11 text-warning">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="price d-flex align-items-center">
                                       <!-- <span class="pr-1 old-price">$100</span> -->
                                       <h6><b><?php echo number_format($product['prd_price'], 0, '.', ','); ?> đ</b></h6>
                                    </div>
                                    <div class="iq-product-action">
                                       <a href="index.php?c=cart&a=add&id=<?php echo $product['prd_id'];?>"><i
                                             class="ri-shopping-cart-2-fill text-primary"></i></a>
                                       <a href="javascript:void();" class="ml-2"><i
                                             class="ri-heart-fill text-danger"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>

               <!-- Phân trang -->
               <div class="d-flex justify-content-end ">
                     <ul class="pagination pagination-sm mr-3"> 
                     <?php
                        if($data['page'] == 1 ) {
                           echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
                        }else{
                           $prev = $data['page'] - 1;
                           echo '<li class="page-item"><a class="page-link" href="index.php?c=category&a=search&page='.$prev.'">Previous</a></li>';
                        }
                     ?>
                     <?php
                        for($i = 1; $i <= $data['totalPage']; $i++){
                           $link = "index.php?c=category&a=search&page=$i";
                           if($i == $data['page']){
                              echo '<li class="page-item active" ><a class="page-link" href="">'.$i.'</a></li>';
                           }else{
                              echo '<li class="page-item"><a class="page-link" href="'.$link.'">'.$i.'</a></li>';
                           }
                        }
                     ?>
                     <?php
                        if($data['page'] < $data['totalPage'] ) {
                           $next = $data['page'] + 1;
                           echo '<li class="page-item"><a class="page-link" href="index.php?c=category&a=search&page='.$next.'">Next</a></li>';
                        }else{
                           echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
                        }
                     ?>
                     </ul>
                  </div>
                  <!-- Kết thúc phân trang -->
                  <?php }?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Wrapper END -->