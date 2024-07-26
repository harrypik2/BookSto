<!doctype html>
<html lang="en">
   
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Booksto</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="/BookSto/public/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/BookSto/public/css/bootstrap.min.css">
      <link rel="stylesheet" href="/BookSto/public/css/dataTables.bootstrap4.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="/BookSto/public/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="/BookSto/public/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="/BookSto/public/css/responsive.css">
      <link rel="stylesheet" href="/BookSto/public/css/success.css">
      <!-- Noty CSS -->
      <!-- <link rel="stylesheet" href="/BookSto/public/css/noty.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
   </head>
   <body class="sidebar-main-active right-column-fixed">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.php" class="header-logo">
                  <img src="/BookSto/public/images/logo.png" class="img-fluid rounded-normal" alt="">
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">Booksto</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">

            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu">

               <?php if(!isset($_GET['c'])) { echo '<li class="active"><a href="index.php" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-home-4-line"></i><span>Home</span></a></li>';} 
                  else { echo '<li><a href="index.php" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-home-4-line"></i><span>Home</span></a></li>'; }?>

               <?php if(isset($_GET['c']) && $_GET['c'] == "category") { echo '<li class="active"><a href="index.php?c=category&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-function-line"></i><span>Category</span></a></li>'; }
                  else { echo '<li><a href="index.php?c=category&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-function-line"></i><span>Category</span></a></li>'; }?>

               <?php if(isset($_GET['c']) && $_GET['c'] == "cart") { echo '<li class="active"><a href="index.php?c=cart&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-shopping-cart-line"></i><span>Cart</span></a></li>'; }
                  else { echo '<li><a href="index.php?c=cart&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-shopping-cart-line"></i><span>Cart</span></a></li>'; }?>

               <!-- <?php if(isset($_GET['c']) && $_GET['c'] == "whish") { echo '<li class="active"><a href="index.php?c=whish&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-heart-line"></i><span>Wishlist</span></a></li>'; }
                  else { echo '<li><a href="index.php?c=whish&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-heart-line"></i><span>Wishlist</span></a></li>'; }?> -->

               </ul>
            </nav>

               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <div class="image"><img src="/BookSto/public/images/page-img/side-bkg.png" alt=""></div>                           
                           <!-- <button type="submit" class="btn w-100 btn-primary mt-4 view-more">Become Membership</button> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="index.php" class="header-logo">
                           <img src="/BookSto/public/images/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">Booksto</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h4 class="mb-0 text-dark">BookSto</h4>
                     <p class="mb-0"><span class="text-primary">Good books,</span> like good friends!</p>
                  </div>
                  <div class="iq-search-bar">
                     <form action="index.php?c=category&a=search" method="POST" class="searchbox">
                        <input type="text" class="text search-input" name="keyword" placeholder="Search Book Name Here...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        <input type="submit" name="btn_submit" value="submit" hidden>
                     </form>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                              <i class="ri-search-line"></i>
                           </a>
                           <form action="index.php?c=product&a=search" method="GET" class="search-box p-0">
                              <input type="text" class="text search-input" placeholder="Type here to search...">
                              <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                           </form>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-shopping-cart-2-line"></i>
                           <span class="badge badge-danger count-cart rounded-circle"><?php if(isset($_SESSION['cart'])) {echo count($_SESSION['cart']);}else{ echo "0";} ?></span>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Cart<small class="badge badge-light float-right pt-1"><?php if(isset($_SESSION['cart'])) {echo count($_SESSION['cart']);}else{ echo "0";} ?></small></h5>
                                    </div>
                                    
                                    <a href="index.php?c=cart&a=" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-shopping-cart-fill"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">View Cart</h6>
                                             <p class="mb-0 font-size-12">View all books in your cart.</p>
                                          </div>
                                       </div>
                                    </a>

                                    <a href="index.php?c=cart&a=history" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-pages-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Purchase History</h6>
                                             <p class="mb-0 font-size-12">Detail all orders you have purchased.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-flex align-items-center text-center p-3">
                                       <a class="btn btn-primary iq-sign-btn" href="index.php?c=category&a=" role="button">Shop now</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <img src="/BookSto/public/uploads/avatar/<?php if(isset($_SESSION['user'])) {echo $_SESSION['user']['avatar'];} else { echo "user.png";} ?>" class="img-fluid rounded-circle mr-3" alt="user">
                              <div class="caption">
                                 <h6 class="mb-1 line-height"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['user_name']; ?></h6>
                                 <!-- <p class="mb-0 text-primary">$20.32</p> -->
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Hello <?php if(isset($_SESSION['user'])) echo $_SESSION['user']['user_name']; ?></h5>
                                       <!-- <span class="text-white font-size-12">Available</span> -->
                                    </div>
                                    <?php if(isset($_SESSION['user'])) {?>
                                    <a href="index.php?c=user&a=index" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-file-user-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">My Profile</h6>
                                             <p class="mb-0 font-size-12">View personal profile details.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="index.php?c=user&a=edit" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Edit Profile</h6>
                                             <p class="mb-0 font-size-12">Modify your personal details.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="sign-out.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="d-flex align-items-center text-center p-3">
                                       <div class="d-inline-block text-center p-2">
                                          <a class="bg-primary iq-sign-btn" href="sign-in.php" role="button">Sign in <i class="ri-login-circle-line"></i></a>
                                       </div>
                                       <div class="d-inline-block text-center p-3">
                                          <a class="bg-primary iq-sign-btn" href="sign-up.php" role="button">Sign up <i class="ri-login-box-line"></i></a>
                                       </div>
                                    </div>
                                    <?php } ?>   
                                    
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         
         <!-- Page Content  -->
         <!-- Content -->
         <?php include_once $view . '.php'; ?>
         <!-- Wrapper END -->

      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2020 <a href="index.php">Booksto</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->

      <!-- Optional JavaScript -->
       <script>
         <?php if (isset($_SESSION['msg']['cpass'])) { ?>
            new Noty({
               text: '<?php echo $_SESSION['msg']['cpass']; ?>',
               type: 'error',
               layout: 'topRight',
               theme: 'bootstrap-v4',
               timeout: 2000
            }).show();
            <?php unset($_SESSION['msg']['cpass']); // Xóa thông báo sau khi hiển thị ?>
         <?php } ?>

         <?php if (isset($_SESSION['msg']['changePwSs'])) { ?>
            new Noty({
               text: '<?php echo $_SESSION['msg']['changePwSs']; ?>',
               type: 'success',
               layout: 'topRight',
               theme: 'bootstrap-v4',
               timeout: 2000
            }).show();
            <?php unset($_SESSION['msg']['changePwSs']); // Xóa thông báo sau khi hiển thị ?>
         <?php } ?>

         <?php if (isset($_SESSION['msg']['UpdatePrfSs'])) { ?>
            new Noty({
               text: '<?php echo $_SESSION['msg']['UpdatePrfSs']; ?>',
               type: 'success',
               layout: 'bottomRight',
               theme: 'bootstrap-v4',
               timeout: 2000
            }).show();
            <?php unset($_SESSION['msg']['UpdatePrfSs']); // Xóa thông báo sau khi hiển thị ?>
         <?php } ?>

         <?php if (isset($_SESSION['msg']['AddPrdSs'])) { ?>
            new Noty({
               text: '<?php echo $_SESSION['msg']['AddPrdSs']; ?>',
               type: 'success',
               layout: 'bottomRight',
               theme: 'bootstrap-v4',
               timeout: 2000
            }).show();
            <?php unset($_SESSION['msg']['AddPrdSs']); // Xóa thông báo sau khi hiển thị ?>
         <?php } ?>
      </script>

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="/BookSto/public/js/jquery.min.js"></script>
      <script src="/BookSto/public/js/popper.min.js"></script>
      <script src="/BookSto/public/js/bootstrap.min.js"></script>
      <script src="/BookSto/public/js/jquery.dataTables.min.js"></script>
      <script src="/BookSto/public/js/dataTables.bootstrap4.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="/BookSto/public/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="/BookSto/public/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="/BookSto/public/js/waypoints.min.js"></script>
      <script src="/BookSto/public/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="/BookSto/public/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="/BookSto/public/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="/BookSto/public/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="/BookSto/public/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="/BookSto/public/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="/BookSto/public/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="/BookSto/public/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="/BookSto/public/js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="/BookSto/public/js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="/BookSto/public/js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="/BookSto/public/js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="/BookSto/public/js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="/BookSto/public/js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="/BookSto/public/js/worldLow.js"></script>
      <!-- Raphael-min JavaScript -->
      <script src="/BookSto/public/js/raphael-min.js"></script>
      <!-- Morris JavaScript -->
      <script src="/BookSto/public/js/morris.js"></script>
      <!-- Morris min JavaScript -->
      <script src="/BookSto/public/js/morris.min.js"></script>
      <!-- Flatpicker Js -->
      <script src="/BookSto/public/js/flatpickr.js"></script>
      <!-- Style Customizer -->
      <script src="/BookSto/public/js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="/BookSto/public/js/chart-custom.js"></script>
      <!-- Noty alert JavaScript
      <script src="/BookSto/public/js/noty.js"></script> -->
      <!-- Custom JavaScript -->
      <script src="/BookSto/public/js/custom.js"></script>
   </body>

</html>