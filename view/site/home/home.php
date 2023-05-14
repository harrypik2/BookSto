<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
               <div class="newrealease-contens">
                  <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                     <?php foreach ($data['prd_randoms'] as $prd_random) { ?>
                        <li class="item">
                           <a href="javascript:void(0);">
                              <img src="/BookSto/public/uploads/<?php echo $prd_random['prd_image']; ?>"
                                 class="img-fluid w-100 rounded" alt="">
                           </a>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                  <div class="iq-header-title">
                     <h4 class="card-title mb-0">New Books</h4>
                  </div>
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                     <a href="index.php?c=category&a=" class="btn btn-sm btn-primary view-more">View More</a>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="row">
                     <?php foreach ($data['prd_lastests']['products'] as $prd_lastest) { ?>
                     <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                           <div class="iq-card-body p-0">
                              <div class="d-flex align-items-center">
                                 <div class="col-6 p-0 position-relative image-overlap-shadow">
                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                          src="/BookSto/public/uploads/<?php echo $prd_lastest['prd_image']; ?>"
                                          alt=""></a>
                                    <div class="view-book">
                                       <a href="index.php?c=product&a=detail&id=<?php echo $prd_lastest['prd_id']; ?>"
                                          class="btn btn-sm btn-white">View Book</a>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="mb-2">
                                       <h6 class="mb-1"><?php echo $prd_lastest['prd_name']; ?></h6>
                                       <p class="font-size-13 line-height mb-1"><?php echo $prd_lastest['aut_name']; ?></p>
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
                                       <h6><b><?php echo number_format($prd_lastest['prd_price'], 0, '.', ','); ?> đ</b></h6>
                                    </div>
                                    <div class="iq-product-action">
                                       <a href="index.php?c=cart&a=add&id=<?php echo $prd_lastest['prd_id'];?>"><i
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
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                  <div class="iq-header-title">
                     <h4 class="card-title mb-0">Featured Books</h4>
                  </div>
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                     <a href="index.php?c=category&a=" class="btn btn-sm btn-primary view-more">View
                        More</a>
                  </div>
               </div>
               <div class="iq-card-body similar-contens">
                  <ul id="similar-slider" class="list-inline p-0 mb-0 row">
                     <?php foreach ($data['prd_featureds']['products'] as $prd_featured) { ?>
                     <li class="col-md-3">
                        <div class="d-flex align-items-center">
                           <div class="col-5 p-0 position-relative image-overlap-shadow">
                              <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                    src="/BookSto/public/uploads/<?php echo $prd_featured['prd_image']; ?>"
                                    alt=""></a>
                              <div class="view-book">
                                 <a href="index.php?c=product&a=detail&id=<?php echo $prd_featured['prd_id']; ?>&cat_id=<?php echo $prd_lastest['cat_id']; ?>"
                                    class="btn btn-sm btn-white">View Book</a>
                              </div>
                           </div>
                           <div class="col-7">
                              <div class="mb-2">
                                 <h6 class="mb-1">
                                    <?php echo $prd_featured['prd_name']; ?>
                                 </h6>
                                 <p class="font-size-13 line-height mb-1">
                                    <?php echo $prd_featured['aut_name']; ?>
                                 </p>
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
                                 <!-- <span class="pr-1 old-price">$102</span> -->
                                 <h6><b><?php echo number_format($prd_featured['prd_price'], 0, '.', ','); ?>đ</b></h6>
                              </div>
                              <div class="iq-product-action">
                                 <a href="index.php?c=cart&a=add&id=<?php echo $prd_featured['prd_id'];?>"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
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
               <div
                  class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                  <div class="iq-header-title">
                     <h4 class="card-title mb-0">Best Selling Books</h4>
                  </div>
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                     <a href="index.php?c=category&a=detail" class="btn btn-sm btn-primary view-more">View More</a>
                  </div>
               </div>
               <div class="iq-card-body trendy-contens">
                  <ul id="trendy-slider" class="list-inline p-0 mb-0 row">
                  <?php foreach ($data['prd_bestsell']['products'] as $prd_bestsell) { ?>
                     <li class="col-md-3">
                        <div class="d-flex align-items-center">
                           <div class="col-5 p-0 position-relative image-overlap-shadow">
                              <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                    src="/BookSto/public/uploads/<?php echo $prd_bestsell['prd_image'];?>" alt=""></a>
                              <div class="view-book">
                                 <a href="index.php?c=product&a=detail&id=<?php echo $prd_bestsell['prd_id'];?>" class="btn btn-sm btn-white">View Book</a>
                              </div>
                           </div>
                           <div class="col-7">
                              <div class="mb-2">
                                 <h6 class="mb-1"><?php echo $prd_bestsell['prd_name'];?></h6>
                                 <p class="font-size-13 line-height mb-1"><?php echo $prd_bestsell['aut_name'];?></p>
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
                                 <h6><b><?php echo number_format($prd_bestsell['prd_price'], 0, '.', ','); ?>đ</b></h6>
                              </div>
                              <div class="iq-product-action">
                                 <a href="index.php?c=cart&a=add&id=<?php echo $prd_bestsell['prd_id'];?>"><i
                                       class="ri-shopping-cart-2-fill text-primary"></i></a>
                                 <a href="javascript:void();" class="ml-2"><i
                                       class="ri-heart-fill text-danger"></i></a>
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
<!-- Wrapper END -->