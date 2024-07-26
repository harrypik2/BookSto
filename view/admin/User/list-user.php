         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">User List</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=user&a=create" class="btn btn-primary">Add New User</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">ID</th>
                                        <th style="width: 15%;">User Name</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Password</th>
                                        <th style="width: 12%;">Permission</th>
                                        <th style="width: 12%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data as $key => $user) { ?>
                                    <tr>
                                        <td><?php echo $user['user_id']; ?></td>
                                        <td><?php echo $user['user_name']; ?></td>
                                        <td><?php echo $user['user_mail']; ?></td>
                                        <td><?php echo $user['user_pass']; ?></td>
                                        <td>
                                             <?php 
                                                if($user['user_level'] == 1) {
                                                   echo '<span class="badge iq-bg-danger">Admin</span>';
                                                }else{
                                                   echo '<span class="badge iq-bg-primary">Member</span>';
                                                }
                                             ?>                                        
                                        </td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="index.php?c=user&a=edit&id=<?php echo $user['user_id']; ?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="index.php?c=user&a=delete&id=<?php echo $user['user_id']; ?>" onclick="return deleteUser();"><i class="ri-delete-bin-line"></i></a>
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
         function deleteUser() {
            return confirm("Do you want delete?");
         }
      </script>
      <!-- Wrapper END -->
