<!doctype html>
<html lang="en">
   
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Booksto - Admin</title>
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
               <a href="index.html" class="header-logo">
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

                  <?php if(!isset($_GET['c']) || $_GET['c'] == "admin") { echo '<li class="active"><a href="index.php" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-dashboard-line"></i><span>Dashboard</span></a></li>';} 
                     else { echo '<li><a href="index.php" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-dashboard-line"></i><span>Dashboard</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "user") { echo '<li class="active"><a href="index.php?c=user&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-user-3-line"></i><span>User</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=user&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span><i class="ri-user-3-line"></i><span>User</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "category") { echo '<li class="active"><a href="index.php?c=category&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-list-check-2"></i><span>Category</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=category&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-list-check-2"></i><span>Category</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "author") { echo '<li class="active"><a href="index.php?c=author&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-file-user-line"></i><span>Author</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=author&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-file-user-line"></i><span>Author</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "product") { echo '<li class="active"><a href="index.php?c=product&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-book-2-line"></i><span>Books</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=product&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-book-2-line"></i><span>Books</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "publisher") { echo '<li class="active"><a href="index.php?c=publisher&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-user-2-line"></i><span>Pubisher</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=publisher&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="ri-user-2-line"></i><span>Pubisher</span></a></li>'; }?>

                  <?php if(isset($_GET['c']) && $_GET['c'] == "order") { echo '<li class="active"><a href="index.php?c=order&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="las la-th-list"></i><span>Order</span></a></li>'; }
                     else { echo '<li><a href="index.php?c=order&a=" class="iq-waves-effect" ><span class="ripple rippleEffect"></span></span><i class="las la-th-list"></i><span>Order</span></a></li>'; }?>

                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <!-- <div class="image"><img src="/BookSto/public/images/page-img/side-bkg.png" alt=""></div>                            -->
                           <div class="d-inline-block w-100 text-center p-3">
                              <a class="bg-primary iq-sign-btn" href="sign-out.php" role="button">Sign out and back home<i class="ri-login-box-line ml-2"></i></a>
                           </div>
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
                     <h4 class="mb-0 text-dark">Dashboard</h4>
                     <p class="mb-0"><span class="text-primary">Hi there,</span> Welcome back <?php echo $_SESSION['user']['user_full']; ?></p>
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
                     <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2020 <a href="#">Booksto</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->

      <!-- Optional JavaScript -->
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
      <!-- Canvasjs JavaScript -->
      <script src="/BookSto/public/js/canvasjs.min.js"></script>
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
      <!-- Custom JavaScript -->
      <script src="/BookSto/public/js/custom.js"></script>
   </body>

</html>