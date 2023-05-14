         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Publisher List</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=publisher&a=create" class="btn btn-primary">Add New Publisher</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="20%">Publisher Name</th>
                                        <th width="65%">Publisher Description</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php foreach ($data as $key => $pub) { ?>
                                    <tr>
                                        <td><?php echo $pub['pub_id']; ?></td>
                                        <td><?php echo $pub['pub_name']; ?></td>
                                        <td>
                                          <p class="mb-0"><?php echo $pub['pub_description']; ?></p>
                                        </td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="index.php?c=publisher&a=edit&id=<?php echo $pub['pub_id']; ?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="index.php?c=publisher&a=delete&id=<?php echo $pub['pub_id']; ?>" onclick="return deletePub();"><i class="ri-delete-bin-line"></i></a>
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
         function deletePub() {
            return confirm("Do you want delete?");
         }
      </script>
      <!-- Wrapper END -->
