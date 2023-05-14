<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("location:index.php");
    }
?>

<!doctype html>
<html lang="en">
   
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Booksto - Sign In</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="public/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="public/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="public/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="public/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="public/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                              <h3 class="mb-0 text-center text-white">Sign in</h3>
                              <?php if(isset($_SESSION['error_login'])) {
                                echo $_SESSION['error_login'];
                              }else{
                                echo '<p class="text-center text-white">Enter your email address and password to sign in</p>';
                              } ?>
                              <form class="mt-4 form-text" method="post" action="login-process.php">
                                  <div class="form-group">
                                      <label for="inputEmail">Email address</label>
                                      <input type="email" class="form-control text-dark mb-0" id="inputEmail" name="user_mail" placeholder="Enter email">
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword">Password</label>
                                      <a href="#" class="float-right text-dark">Forgot password?</a>
                                      <input type="password" class="form-control text-dark mb-0" id="inputPassword" name="user_pass" placeholder="Password">
                                  </div>
                                  <div class="d-inline-block w-100">
                                      <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                          <input type="checkbox" class="custom-control-input" id="customCheck">
                                          <label class="custom-control-label" for="customCheck">Remember Me</label>
                                      </div>
                                  </div>
                                  <div class="sign-info text-center">
                                      <input type="submit" value="Sign in" name="btn_login" class="btn btn-white text-dark d-block w-100 mb-2">
                                      <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="sign-up.php" class="text-white">Sign up</a></span>
                                  </div>
                              </form>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
        
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="public/js/jquery.min.js"></script>
      <script src="public/js/popper.min.js"></script>
      <script src="public/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="public/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="public/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="public/js/waypoints.min.js"></script>
      <script src="public/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="public/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="public/js/apexcharts.js"></script>
      <!-- lottie JavaScript -->
      <script src="public/js/lottie.js"></script>
      <!-- Slick JavaScript --> 
      <script src="public/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="public/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="public/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="public/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="public/js/smooth-scrollbar.js"></script>
      <!-- Style Customizer -->
      <script src="public/js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="public/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="public/js/custom.js"></script>
   </body>

</html>
