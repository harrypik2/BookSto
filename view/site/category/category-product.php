         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card-transparent mb-0">
                        <div class="d-block text-center">
                           <h2 class="mb-3">Search by Book Name</h2>    
                           <div class="w-100 iq-search-filter">
                           <form action="index.php?c=category&a=search" method="POST">
                              <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                                 <li class="search-menu-opt">
                                    <div class="iq-dropdown">
                                       <div class="form-group mb-0">
                                          <select name="cat_id" class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect2">
                                             <option selected="" value = "">Genres</option>
                                             <?php foreach ($data['categories'] as $key => $cate) { ?>
                                                <option value=<?php echo $cate['cat_id']; ?>><?php echo $cate['cat_name']; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="search-menu-opt">
                                    <div class="iq-dropdown">
                                       <div class="form-group mb-0">
                                          <select name="year" class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect3">
                                             <option selected="" value = "">Year</option>
                                             <option value= 2015>2015</option>
                                             <option value= 2016>2016</option>
                                             <option value= 2017>2017</option>
                                             <option value= 2018>2018</option>
                                             <option value= 2019>2019</option>
                                             <option value= 2020>2020</option>
                                             <option value= 2021>2021</option>
                                             <option value= 2022>2022</option>
                                             <option value= 2023>2023</option>
                                          </select>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="search-menu-opt">
                                    <div class="iq-dropdown">
                                       <div class="form-group mb-0">
                                          <select name="aut_id" class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect4">
                                             <option selected="" value = "">Author</option>
                                             <?php foreach ($data['authors'] as $key => $aut) { ?>
                                                <option value=<?php echo $aut['aut_id']; ?>><?php echo $aut['aut_name']; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="search-menu-opt">
                                    <div class="iq-dropdown">
                                       <div class="form-group mb-0">
                                          <select name="pub_id" class="form-control form-search-control bg-white border-0" id="exampleFormControlSelect1">
                                             <option selected="" value="">Publisher</option>
                                             <?php foreach ($data['publishers'] as $key => $pub) { ?>
                                                <option value=<?php echo $pub['pub_id']; ?>><?php echo $pub['pub_name']; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="search-menu-opt">
                                    <div class="iq-search-bar search-book d-flex align-items-center">
                                       <div class="searchbox mb-3">
                                          <input type="text" name="keyword" class="text search-input" placeholder="search here...">
                                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                       </div>
                                       <input name="btn_submit" type="submit" value="Search" class="btn btn-primary search-data ml-2 mb-3">
                                    </div>
                                 </li>
                              </ul>
                              </form>
                           </div> 
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <div class="row">
                              <?php foreach ($data['products'] as $key => $product) { ?>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="/BookSto/public/uploads/<?php echo $product['prd_image']; ?>" alt=""></a>
                                             <div class="view-book">
                                                <a href="index.php?c=product&a=detail&id=<?php echo $product['prd_id']; ?>" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1"><?php echo $product['prd_name']; ?></h6>
                                                <p class="font-size-13 line-height mb-1"><?php echo $product['aut_name']; ?></p>
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
                                                <h6><b><?php echo number_format($product['prd_price'], 0, '.', ','); ?> đ</b></h6>
                                             </div>
                                             <div class="iq-product-action">
                                                <a href="index.php?c=cart&a=add&id=<?php echo $product['prd_id'];?>"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                                <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
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
                                 echo '<li class="page-item"><a class="page-link" href="index.php?c=category&a=index&page='.$prev.'">Previous</a></li>';
                              }
                           ?>
                           <?php
                              for($i = 1; $i <= $data['totalPage']; $i++){
                                 $link = "index.php?c=category&a=index&page=$i";
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
                                 echo '<li class="page-item"><a class="page-link" href="index.php?c=category&a=index&page='.$next.'">Next</a></li>';
                              }else{
                                 echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
                              }
                           ?>
                           </ul>
                        </div>
                        <!-- Kết thúc phân trang -->
                     </div>
                  </div>
                  <!-- similar books -->
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
                  <!--End similar books -->
                  <!--Trendy books -->
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Trendy Books</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=category&a=" class="btn btn-sm btn-primary view-more">View
                                 More</a>
                           </div>
                        </div>
                        <div class="iq-card-body similar-contens">
                           <ul id="similar-slider" class="list-inline p-0 mb-0 row">
                              <?php foreach ($data['trendy_products']['products'] as $prd_trendy) { ?>
                              <li class="col-md-3">
                                 <div class="d-flex align-items-center">
                                    <div class="col-5 p-0 position-relative image-overlap-shadow">
                                       <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                             src="/BookSto/public/uploads/<?php echo $prd_trendy['prd_image']; ?>"
                                             alt=""></a>
                                       <div class="view-book">
                                          <a href="index.php?c=product&a=detail&id=<?php echo $prd_trendy['prd_id']; ?>&cat_id=<?php echo $prd_lastest['cat_id']; ?>"
                                             class="btn btn-sm btn-white">View Book</a>
                                       </div>
                                    </div>
                                    <div class="col-7">
                                       <div class="mb-2">
                                          <h6 class="mb-1">
                                             <?php echo $prd_trendy['prd_name']; ?>
                                          </h6>
                                          <p class="font-size-13 line-height mb-1">
                                             <?php echo $prd_trendy['aut_name']; ?>
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
                                          <h6><b><?php echo number_format($prd_trendy['prd_price'], 0, '.', ','); ?>đ</b></h6>
                                       </div>
                                       <div class="iq-product-action">
                                          <a href="index.php?c=cart&a=add&id=<?php echo $prd_trendy['prd_id'];?>"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
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
                  <!--End trendy books -->
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
