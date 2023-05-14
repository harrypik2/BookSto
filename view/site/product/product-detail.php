         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <h4 class="card-title mb-0">Books Description</h4>
                        </div>
                        <div class="iq-card-body pb-0">
                           <div class="description-contens align-items-top row">
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <div class="row align-items-center">
                                          <div class="col-2"></div>
                                          <div class="col-9">
                                                <div class="list-inline p-0 m-0  d-flex align-items-center">
                                                   <img src="/BookSto/public/uploads/<?php echo $data['product']['prd_image']; ?>" class="img-fluid w-100 rounded" alt="">
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <h3 class="mb-3"><?php echo $data['product']['prd_name']; ?></h3>
                                       <div class="price d-flex align-items-center font-weight-500 mb-2">
                                          <!-- <span class="font-size-20 pr-2 old-price">$99</span> -->
                                          <span class="font-size-24 text-dark"><?php echo number_format($data['product']['prd_price'],0,'.',','); ?> đ</span>
                                       </div>
                                       <div class="mb-3 d-block">
                                          <span class="font-size-20 text-warning">
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star"></i>
                                          </span>
                                       </div>
                                       <span class="text-dark mb-4 pb-4 iq-border-bottom d-block"><?php echo $data['product']['prd_detail']; ?></span>
                                       <div class="text-primary mb-4">Author: <span class="text-body"><?php echo $data['product']['aut_name']; ?></span></div>
                                       <div class="mb-4 d-flex align-items-center">                                       
                                          <a href="index.php?c=cart&a=add&id=<?php echo $data['product']['prd_id'];?>" class="btn btn-primary view-more mr-2">Add To Cart</a>
                                       </div>
                                       <div class="mb-3">
                                          <a href="#" class="text-body text-center"><span class="avatar-30 rounded-circle bg-primary d-inline-block mr-2"><i class="ri-heart-fill"></i></span><span>Add to Wishlist</span></a>
                                       </div>
                                       <div class="iq-social d-flex align-items-center">
                                          <h5 class="mr-2">Share:</h5>
                                          <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                             <li>
                                                <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                             </li>
                                             <li>
                                                <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                             </li>
                                             <li>
                                                <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                             </li>
                                             <li >
                                                <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Best Selling Books</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=category&a=" class="btn btn-sm btn-primary view-more">View More</a>
                           </div>
                        </div>
                        <div class="iq-card-body single-similar-contens">
                           <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                           <?php foreach ($data['bestsell_products']['products'] as $bestsell) { ?>

                              <li class="col-md-3">
                                 <div class="row align-items-center">
                                    <div class="col-5">
                                       <div class="position-relative image-overlap-shadow">
                                          <a href="javascript:void();"><img class="img-fluid rounded w-100" src="/BookSto/public/uploads/<?php echo $bestsell['prd_image']; ?>" alt=""></a>
                                          <div class="view-book">
                                             <a href="index.php?c=product&a=detail&id=<?php echo $bestsell['prd_id']; ?>" class="btn btn-sm btn-white">View Book</a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-7 pl-0">
                                       <div class="mb-2">
                                          <h6 class="mb-1"><?php echo $bestsell['prd_name']; ?></h6>
                                          <p class="font-size-13 line-height mb-1"><?php echo $bestsell['aut_name']; ?></p>
                                             <div class="d-block">
                                                <span class="font-size-13 text-warning">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                </span>
                                             </div>
                                          </div>
                                       <div class="price d-flex align-items-center">
                                          <!-- <span class="pr-1 old-price">$89</span> -->
                                          <h6><b><?php echo number_format($bestsell['prd_price'],0,'.',','); ?> đ</b></h6>
                                       </div>
                                       <div class="iq-product-action">
                                          <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                          <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <?php } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Trendy Books</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=category&a=" class="btn btn-sm btn-primary view-more">View More</a>
                           </div>
                        </div>
                        <div class="iq-card-body trendy-contens">
                           <ul id="trendy-slider" class="list-inline p-0 mb-0 row">
                           <?php foreach ($data['trendy_products']['products'] as $trendy) { ?>
                              <li class="col-md-3">
                                 <div class="d-flex align-items-center">
                                    <div class="col-5 p-0 position-relative image-overlap-shadow">
                                       <a href="javascript:void();"><img class="img-fluid rounded w-100" src="/BookSto/public/uploads/01.jpg" alt=""></a>
                                       <div class="view-book">
                                          <a href="index.php?c=product&a=detail&id=<?php echo $trendy['prd_id']; ?>&cat_id=<?php echo $trendy['cat_id']; ?>" class="btn btn-sm btn-white">View Book</a>
                                       </div>
                                    </div>
                                    <div class="col-7">
                                       <div class="mb-2">
                                          <h6 class="mb-1"><?php echo $trendy['prd_name']; ?></h6>
                                          <p class="font-size-13 line-height mb-1"><?php echo $trendy['aut_name']; ?></p>
                                          <div class="d-block">
                                             <span class="font-size-13 text-warning">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="price d-flex align-items-center">
                                          <!-- <span class="pr-1 old-price">$99</span> -->
                                          <h6><b><?php echo number_format($trendy['prd_price'],0,'.',','); ?> đ</b></h6>
                                       </div>
                                       <div class="iq-product-action">
                                          <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                          <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <?php } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
