         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Categories</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="index.php?c=category&a=store" method="post">
                              <div class="form-group">
                                 <label>Category Name:</label>
                                 <input required name="cat_name" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Category Description:</label>
                                 <textarea name="cat_description" class="form-control" rows="4"></textarea>
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
