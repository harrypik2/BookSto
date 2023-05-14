         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Edit Category: <?php echo $data['cat_name']; ?></h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="index.php?c=category&a=update&id=<?php echo $data['cat_id']; ?>" method="post">
                              <div class="form-group">
                                 <label>Category Name:</label>
                                 <input name="cat_name" type="text" value="<?php echo $data['cat_name']; ?>" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Category Description:</label>
                                 <textarea name="cat_description" class="form-control" rows="4"><?php echo $data['cat_description']; ?></textarea>
                              </div>
                              <input type="submit" value= "Submit" class="btn btn-primary">
                              <button type="reset" class="btn btn-danger">Reset</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
