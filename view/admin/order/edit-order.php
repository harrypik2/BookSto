      <!-- Page Content  -->
      <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Order: <?php echo $data['order_id']; ?></h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                           <form action="index.php?c=order&a=update&id=<?php echo $data['order_id']; ?>" method="post">
                              <div class="form-group">
                                 <label>Receiver:</label>
                                 <input required name="user_name" type="text" value="<?php echo $data['user_name']; ?>" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Email:</label>
                                 <input required name="user_mail" type="text" value="<?php echo $data['user_email']; ?>" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Phone Number:</label>
                                 <input required name="user_phone"  type="text" value="<?php echo $data['user_phone']; ?>" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Address:</label>
                                 <input required name="address"  type="text" value="<?php echo $data['address']; ?>" class="form-control">
                              </div>
                              
                              <div class="form-group">
                                 <label>Status:</label>
                                 <select name="status" class="form-control" >
                                    <option selected="" disabled="">Status</option>
                                    <option value = 1 <?php if($data['status'] == 1) echo 'selected'; ?>>Unprocess</option>
                                    <option value = 2 <?php if($data['status'] == 2) echo 'selected'; ?>>Processing</option>
                                    <option value = 3 <?php if($data['status'] == 3) echo 'selected'; ?>>Transporting</option>
                                    <option value = 4 <?php if($data['status'] == 4) echo 'selected'; ?>>Transported</option>
                                    <option value = 5 <?php if($data['status'] == 5) echo 'selected'; ?>>Paid</option>
                                    <option value = 6 <?php if($data['status'] == 6) echo 'selected'; ?>>Canceled</option>
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
