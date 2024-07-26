<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="iq-card">
               <div class="iq-card-body p-0">
                  <div class="iq-edit-list">
                     <ul class="iq-edit-profile d-flex justify-content-around nav nav-pills">
                        <li class="col-md-6 p-0">
                           <a class="nav-link active" data-toggle="pill" href="#personal-information">
                              Personal Information
                           </a>
                        </li>
                        <li class="col-md-6 p-0">
                           <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                              Change Password
                           </a>
                        </li>                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-edit-list-data">
               <div class="tab-content">
                  <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Personal Information</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="index.php?c=user&a=store&id=<?php echo $data['user_id']; ?>" role="form" method="post" enctype="multipart/form-data">
                              <div class="form-group row align-items-center">
                                 <div class="col-md-12">
                                    <div class="profile-img-edit">
                                       <img class="profile-pic" src="/BookSto/public/uploads/avatar/<?php echo $data['acc_avatar']; ?>" alt="profile-pic">
                                       <div class="p-image">
                                          <i class="ri-pencil-line upload-button"></i>
                                          <input name="acc_image" class="file-upload" type="file" accept="image/*"/>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class=" row align-items-center">
                                 <div class="form-group col-sm-6">
                                    <label for="fname">Full Name:</label>
                                    <input name="acc_full" type="text" class="form-control" id="fname" value="<?php echo $data['acc_full_name']; ?>" required="">
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="dob">Date Of Birth:</label>
                                    <input name="acc_dob" type="date" class="form-control" id="dob" value="<?php echo $data['acc_date_of_birth']; ?>" required="">
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label>Bio:</label>
                                    <textarea class="form-control" name="acc_bio" rows="2" style="line-height: 22px;"><?php echo $data['acc_bio']; ?></textarea>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="pnumber">Mobile Number:</label>
                                    <input type="tel" pattern="^0\d{9}$|^\+\d{11}$" class="form-control" id= "pnumber" name="acc_phone" value="<?php echo $data['acc_phone_number']; ?>" required="">
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label>Address:</label>
                                    <textarea class="form-control" name="acc_address" rows="4" style="line-height: 22px;"><?php echo $data['acc_address']; ?></textarea>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <button type="reset" class="btn iq-bg-danger" onclick="redirectToPage()">Cancel</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Change Password</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form>
                              <div class="form-group">
                                 <label for="cpass">Current Password:</label>
                                 <input type="Password" class="form-control" id="cpass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="npass">New Password:</label>
                                 <input type="Password" class="form-control" id="npass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="vpass">Verify Password:</label>
                                 <input type="Password" class="form-control" id="vpass" value="">
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <button type="reset" class="btn iq-bg-danger" onclick="redirectToPage()">Cancel</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   function redirectToPage() {
      window.location.href = 'index.php?c=user&a=index';
   }
</script>