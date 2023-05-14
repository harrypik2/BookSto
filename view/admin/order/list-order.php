         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Order List</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">ID</th>
                                        <th style="width: 15%;">Name</th>
                                        <th style="width: 13%;">Email</th>
                                        <th style="width: 8%;">Phone</th>
                                        <th style="width: 16%;">Address</th>
                                        <th style="width: 12%;">Status</th>
                                        <th style="width: 12%;">Amount</th>
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
                                        <td><?php echo date_format(date_create($ord['order_date']),"d/m/Y"); ?></td>
                                        <td>
                                             <div class="flex align-items-center list-user-action">
                                                <a class="bg-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="index.php?c=order&a=detail&id=<?php echo $ord['order_id']; ?>"><i class="ri-eye-line"></i></a>

                                                <!-- Nếu trạng thái là đã giao hàng hoặc đã thanh toán thì không cho sửa và xóa và duyệt -->
                                                <?php if($ord['status'] != 5 && $ord['status'] != 6) { ?>
                                                <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="index.php?c=order&a=edit&id=<?php echo $ord['order_id']; ?>"><i class="ri-pencil-line"></i></a>
                                                <a class="bg-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Check" href="index.php?c=order&a=check&id=<?php echo $ord['order_id']; ?>"><i class="ri-checkbox-circle-line"></i></a>
                                                <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel" href="index.php?c=order&a=cancel&id=<?php echo $ord['order_id']; ?>" onclick="return cancelOrder();"><i class="ri-close-circle-line"></i></a>
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
      <script>
         function cancelOrder() {
            return confirm("Do you want to cancel this order?");
         }
      </script>
      <!-- Wrapper END -->
