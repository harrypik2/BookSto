<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row profile-content">
         <div class="col-12 col-md-12 col-lg-4">
            <div class="iq-card">
               <div class="iq-card-body profile-page">
                  <div class="profile-header">
                     <div class="cover-container text-center">
                        <img src="/BookSto/public/uploads/avatar/<?php echo $data['acc_avatar']; ?>" width="120" alt="profile-bg" class="img-fluid rounded-circle mr-3">
                        <div class="profile-detail mt-3">
                           <h3><?php echo $_SESSION['user']['user_name']; ?></h3>
                           <p class="text-primary">Bio</p>
                           <p><?php echo $data['acc_bio']; ?></p>
                        </div>
                        <div class="iq-social d-inline-block align-items-center">
                           <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                              <li>
                                 <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i
                                       class="fa fa-facebook" aria-hidden="true"></i></a>
                              </li>
                              <li>
                                 <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i
                                       class="fa fa-twitter" aria-hidden="true"></i></a>
                              </li>
                              <li>
                                 <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i
                                       class="fa fa-youtube-play" aria-hidden="true"></i></a>
                              </li>
                              <li>
                                 <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i
                                       class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-md-12 col-lg-8">
            <div class="row">
               <div class="col-md-12">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Personal Details</h4>
                        </div>
                        <div class="float-right">                              
                              <a href="index.php?c=user&a=edit" class="btn btn-sm btn-primary view-more">Update</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                        <li>
                           <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-sm-6">
                                    <h6>Full name</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0"><?php echo $data['acc_full_name']; ?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-sm-6">
                                    <h6>Birthday</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0"><?php if (!empty($data['acc_date_of_birth'])) {echo date_format(date_create($data['acc_date_of_birth']),"d/m/Y");}else{ echo "";} ?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-sm-6">
                                    <h6>Address</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0"><?php echo $data['acc_address']; ?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-sm-6">
                                    <h6>Phone</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0"><?php echo $data['acc_phone_number']; ?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="row align-items-center justify-content-between mb-3">
                                 <div class="col-sm-6">
                                    <h6>Email</h6>
                                 </div>
                                 <div class="col-sm-6">
                                    <p class="mb-0"><?php echo $_SESSION['user']['user_mail']; ?></p>
                                 </div>
                              </div>
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