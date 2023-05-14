      <!-- Page Content  -->
      <div id="content-page" class="content-page">
      <div class="container-fluid">
         <?php 
            if(isset($_SESSION['err_store']['email_exists'])) {
            echo '<div class="row">
                     <div class="col-sm-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title iq-bg-danger">'.$_SESSION['err_store']['email_exists'].'</h4>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>';
            unset($_SESSION['err_store']['email_exists']);
            }
			?>
         
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add New User</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                           <form action="index.php?c=user&a=store" method="post">
                              <div class="form-group">
                                 <label>User Name:</label>
                                 <input required name="user_full" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Email:</label>
                                 <input required name="user_mail" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Password:</label>
                                 <input required name="user_pass"  type="text" class="form-control">
                              </div>
                              
                              <div class="form-group">
                                 <label>Permission:</label>
                                 <select name="user_level" class="form-control" >
                                    <option selected="" disabled="">Permission</option>
                                    <option value = 1>Admin</option>
                                    <option value = 2>Member</option>
                                 </select>
                              </div>
                              <input name="btn_store" type="submit" value="Submit" class="btn btn-primary">
                              <button type="reset" class="btn btn-danger">Reset</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   <!-- Wrapper END -->
