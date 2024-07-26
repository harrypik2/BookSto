      <!-- Page Content  -->
      <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Order</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <div class="table-responsive">
                        <table class=" table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th style="width: 3%;">ID</th>
                                  <th style="width: 15%;">User Name</th>
                                  <th style="width: 14%;">Email</th>
                                  <th style="width: 8%;">Phone</th>
                                  <th style="width: 16%;">Address</th>
                                  <th style="width: 12%;">Status</th>
                                  <th style="width: 12%;">Total Amount</th>
                                  <th style="width: 10%;">Order Date</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td><?php echo $data['order']['order_id'] ?></td>
                                  <td><?php echo $data['order']['user_name'] ?></td>
                                  <td><?php echo $data['order']['user_email']; ?></td>
                                  <td><?php echo $data['order']['user_phone']; ?></td>
                                  <td><?php echo $data['order']['address']; ?></td>
                                  <td><?php 
                                        switch ($data['order']['status']) {
                                            case 1:
                                                echo '<span class="iq-bg-warning pl-2 pr-2 rounded d-inline-block">Unprocess</span>';
                                                break;
                                            case 2:
                                                echo '<span class="iq-bg-success pl-2 pr-2 rounded d-inline-block">Processing</span>';
                                                break;
                                            case 3:
                                                echo '<span class="iq-bg-secondary pl-2 pr-2 rounded d-inline-block">Transporting</span>';
                                                break;
                                            case 4:
                                                echo '<span class="iq-bg-primary pl-2 pr-2 rounded d-inline-block">Transported</span>';
                                                break;
                                            case 5:
                                                echo '<span class="iq-bg-info pl-2 pr-2 rounded d-inline-block">Paid</span>';
                                                break;
                                            case 6:
                                                echo '<span class="iq-bg-danger pl-2 pr-2 rounded d-inline-block">Canceled</span>';
                                                break;
                                        }
                                      ?></td>
                                  <td><?php echo number_format($data['order']['all_price'], 0, '.', ','); ?> đ</td>
                                  <td><?php echo date_format(date_create($data['order']['order_date']),"H:i:s d/m/Y"); ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Order Detail</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table table-striped table-bordered" style="width:100%">
                             <thead>
                                 <tr>
                                     <th style="width: 3%;">No.</th>
                                     <th style="width: 12%;">Book Image</th>
                                     <th style="width: 16%;">Book Name</th>
                                     <th style="width: 12%;">Category</th>
                                     <th style="width: 12%;">Author</th>
                                     <th style="width: 12%;">Pubisher</th>
                                     <th style="width: 8%;">Quantity</th>
                                     <th style="width: 13%;">Release Date</th>
                                     <th style="width: 15%;">Price</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php $i = 1;
                                 foreach ($data['details'] as $key => $detail) { ?>
                                 <tr>
                                     <td><?php echo $i; ?></td>
                                     <td><img class="img-fluid rounded" src="/BookSto/public/uploads/<?php echo $detail['prd_image']; ?>" alt=""></td>
                                     <td><?php echo $detail['prd_name']; ?></td>
                                     <td><?php echo $detail['cat_name']; ?></td>
                                     <td><?php echo $detail['aut_name']; ?></td>
                                     <td><?php echo $detail['pub_name']; ?></td>                                        
                                     <td><?php echo $detail['qty']; ?></td> 
                                     <td><?php echo date_format(date_create($detail['prd_date']),"d/m/Y"); ?></td>                                       
                                     <td><?php echo number_format($detail['prd_price'],0,'.',','); ?> đ</td>
                                 </tr>
                               <?php $i++; } ?>
                                 
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
   <!-- Wrapper END -->
