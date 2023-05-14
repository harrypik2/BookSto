         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Book List</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="index.php?c=product&a=create" class="btn btn-primary">Add New Book</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">No.</th>
                                        <th style="width: 12%;">Book Image</th>
                                        <th style="width: 15%;">Book Name</th>
                                        <th style="width: 12%;">Book Category</th>
                                        <th style="width: 12%;">Book Author</th>
                                        <th style="width: 12%;">Book Pubisher</th>
                                        <th style="width: 18%;">Book Description</th>
                                        <th style="width: 10%;">Book Price</th>
                                        <th style="width: 8%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data as $key => $product) { ?>
                                    <tr>
                                        <td><?php echo $product['prd_id']; ?></td>
                                        <td><img class="img-fluid rounded" src="/BookSto/public/uploads/<?php echo $product['prd_image']; ?>" alt=""></td>
                                        <td><?php echo $product['prd_name']; ?></td>
                                        <td><?php echo $product['cat_name']; ?></td>
                                        <td><?php echo $product['aut_name']; ?></td>
                                        <td><?php echo $product['pub_name']; ?></a></td>                                        
                                        <td>
                                          <p class="mb-0"><?php echo $product['prd_detail']; ?></p>
                                        </td>
                                        <td><?php echo number_format($product['prd_price'],0,'.',','); ?> đ</td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="index.php?c=product&a=edit&id=<?php echo $product['prd_id']; ?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="index.php?c=product&a=delete&id=<?php echo $product['prd_id']; ?>" onclick="return deleteProduct();"><i class="ri-delete-bin-line"></i></a>
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
         function deleteProduct() {
            return confirm("Bạn có muốn xóa không?");
         }
      </script>
      <!-- Wrapper END -->
