         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Author List</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=author&a=create" class="btn btn-primary">Add New Author</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="20%">Author Name</th>
                                        <th width="65%">Author Description</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php foreach ($data as $key => $aut) { ?>
                                    <tr>
                                        <td><?php echo $aut['aut_id']; ?></td>
                                        <td><?php echo $aut['aut_name']; ?></td>
                                        <td>
                                          <p class="mb-0"><?php echo $aut['aut_description']; ?></p>
                                        </td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="index.php?c=author&a=edit&id=<?php echo $aut['aut_id']; ?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="index.php?c=author&a=delete&id=<?php echo $aut['aut_id']; ?>" onclick="return deleteAut();"><i class="ri-delete-bin-line"></i></a>
                                          </div>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                    
                                </tbody>
                            </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         function deleteAut() {
            return confirm("Do you want delete?");
         }
      </script>
      <!-- Wrapper END -->
