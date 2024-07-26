         <!-- Page Content  -->
         <?php if (empty($data)) {?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Order History List</h4>
                           </div>
                        </div>
                        <div class="iq-card-body d-flex justify-content-center">
                           <div class="iq-header-title">
                              <h5 class="card-title">You don't have any orders yet!</h5>
                              <?php if(!isset($_SESSION['user'])){ ?>
                                 <h5 class="card-title text-center">Sign in to shopping now !</h5>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="sign-in.php" role="button">Sign in <i class="ri-login-circle-line"></i></a>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <?php } else { ?>
            <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Order History List</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
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
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data as $key => $ord) { ?>
                                    <tr>
                                        <td><?php echo $ord['order_id']; ?></td>
                                        <td><?php echo $ord['user_name']; ?></td>
                                        <td><?php echo $ord['user_email']; ?></td>
                                        <td><?php echo $ord['user_phone']; ?></td>
                                        <td><?php echo $ord['address']; ?></td>

                                        <td>
                                            <?php 
                                                switch ($ord['status']) {
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
                                            ?>
                                        </td>                                       
                                        <td><?php echo number_format($ord['all_price'], 0, '.', ','); ?> đ</td>
                                        <td><?php echo date_format(date_create($ord['order_date']),"H:i:s d/m/Y"); ?></td>
                                        <td>
                                             <div class="flex align-items-center list-user-action">
                                                <a class="bg-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="index.php?c=cart&a=detail&id=<?php echo $ord['order_id']; ?>"><i class="ri-eye-line"></i></a>

                                                <!-- Nếu trạng thái là dã thanh toán thì không cho huỷ đơn -->
                                                <?php if($ord['status'] == 1) { ?>
                                                <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel" href="index.php?c=cart&a=cancel&id=<?php echo $ord['order_id']; ?>" onclick="return cancelOrder();"><i class="ri-close-circle-line"></i></a>
                                                <?php } ?>
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
      <?php } ?>
      <script>
         function cancelOrder() {
            return confirm("Do you want to cancel this order?");
         }
      </script>
      <!-- Wrapper END -->
