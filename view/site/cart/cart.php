         <!-- Page Content  -->
         <?php if (empty($data)) {?>
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="cart" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Shopping Cart</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body d-flex justify-content-center">
                                 <div class="iq-header-title">
                                    <h5 class="card-title text-center">Your cart is empty!</h5>
                                    <?php if(!isset($_SESSION['user'])){ ?>
                                    <h5 class="card-title text-center">Sign in to shopping now !</h5>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="sign-in.php" role="button">Sign in <i class="ri-login-circle-line"></i></a>
                                    </div>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } else { ?>
            
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="cart" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Shopping Cart</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <ul class="list-inline p-0 m-0">

                              <?php if (isset($_SESSION['cart_error_del'])) { ?>
                                    <div class="row">
                                       <div class="text-danger">
                                          <?php echo $_SESSION['cart_error_del']; ?>
                                       </div>
                                    </div>
                                    <?php
                                    unset($_SESSION['cart_error_del']);
                                 }
                              ?>

                              <form method="post" action="index.php?c=cart&a=update">
                              <?php
                              $totalPrice = 0;
            
                              foreach ($data as $key => $item) {
                                 $qty = $_SESSION['cart'][$item['prd_id']]['qty'];
                                 $price = $_SESSION['cart'][$item['prd_id']]['prd_price'];
                                 $subTotal = $qty * $price;
                                 $totalPrice += $subTotal;
                                 $totalPriceVAT = $totalPrice + ($totalPrice * 5 / 100);
                              ?>
                                    <li class="checkout-product">
                                       <div class="row align-items-center">
                                          <div class="col-sm-2">
                                             <span class="checkout-product-img">
                                             <a href="javascript:void();"><img class="img-fluid rounded" src="/BookSto/public/uploads/<?php echo $item['prd_image']; ?>" alt=""></a>
                                             </span>
                                          </div>
                                          <div class="col-sm-4">
                                             <div class="checkout-product-details">
                                                <h5><?php echo $item['prd_name']; ?></h5>
                                                <p class="text-success"><?php echo $item['aut_name']; ?></p>
                                                <div class="price">
                                                   <h5><?php echo number_format($price, 0, ',', '.'); ?>đ</h5>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="row">
                                                <div class="col-sm-10">
                                                   <div class="row align-items-center mt-2">
                                                      <div class="col-sm-7 col-md-6">
                                                         <!-- <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button> -->
                                                         <span class="text-success">Số lượng: </span>
                                                         <input type="number" id="quantity" name="quantity[<?php echo $item['prd_id'] ?>]" value="<?php echo $qty; ?>" min="1" required>
                                                         <!-- <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button> -->
                                                      </div>
                                                      <div class="col-sm-5 col-md-6">
                                                         <span class="product-price"><?php echo number_format($subTotal, 0, ',', '.'); ?>đ</span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <a href="index.php?c=cart&a=delete&id=<?php echo $item['prd_id'] ?>" onclick="return deleteCart();" class="text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <?php } ?>

                                 </ul>
                              </div>
                              <div class="iq-card ">
                                    <div class="iq-card-body">
                                       <button id="update-cart" class="btn btn-primary d-block mt-3" type="submit" name="sbm">Update cart</button>
                                    </div>
                              </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="iq-card">
                              <div class="iq-card-body">
                                 <p><b>Price Details</b></p>
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>Total Price</span>
                                    <span><?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</span>
                                 </div>
                                 <div class="d-flex justify-content-between mb-1">
                                    <!-- <span>Bag Discount</span>
                                    <span class="text-success">-20$</span> -->
                                 </div>
                                 <div class="d-flex justify-content-between mb-1">
                                    <!-- <span>Estimated Tax</span>
                                    <span>$15</span> -->
                                 </div>
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>VAT</span>
                                    <span>5%</span>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <!-- <span>Delivery Charges</span>
                                    <span class="text-success">Free</span> -->
                                 </div>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                    <span class="text-dark"><strong>Total</strong></span>
                                    <span class="text-dark"><strong><?php echo number_format($totalPriceVAT, 0, ',', '.'); ?>đ</strong></span>
                                 </div>
                                 <a id="place-order" href="javascript:void();" class="btn btn-primary d-block mt-3 next">Place order</a>
                              </div>
                           </div>
                           <div class="iq-card ">
                              <div class="card-body iq-card-body p-0 iq-checkout-policy">
                                 <ul class="p-0 m-0">
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-checkbox-line"></i>
                                       </div>
                                       <h6>Security policy (Safe and Secure Payment.)</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-truck-line"></i>
                                       </div>
                                       <h6>Delivery policy (Home Delivery.)</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-arrow-go-back-line"></i>
                                       </div>
                                       <h6>Return policy (Easy Retyrn.)</h6>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="address" class="card-block p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Enter Your Information</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form method="post" id="formCash" action="index.php?c=cart&a=store" onsubmit="required()">
                                    <div class="row mt-3">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name: *</label> 
                                             <input type="text" class="form-control" name="fullname" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Mobile Number: *</label> 
                                             <input type="text" class="form-control" name="phone" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Email: *</label> 
                                             <input type="email" class="form-control" name="mail" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Address: *</label> 
                                             <input type="text" class="form-control" name="address" required="">
                                          </div>
                                       </div>
                                       <input type="hidden" name="all_price" value="<?php echo $totalPriceVAT; ?>">
                                       <div class="col-md-6">
                                          <button id="savenddeliver" type="submit" class="btn btn-primary">Buy Now</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?> 

      <script>
         function deleteCart() {
            return confirm("Bạn có muốn xóa không?");
         }
      </script>
      <!-- Wrapper END -->
