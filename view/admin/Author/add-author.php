         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Author</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="index.php?c=author&a=store" method="post">
                              <div class="form-group">
                                 <label>Author Name:</label>
                                 <input required name="aut_name" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Author Description:</label>
                                 <textarea name="aut_description" class="form-control" rows="4"></textarea>
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
