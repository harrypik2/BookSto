
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $data['totalMember'] ?></span></h2>
                                 <h5 class="">Users</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $data['totalBook'] ?></span></h2>
                                 <h5 class="">Books</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-shopping-cart-2-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $data['totalSale'] ?></span></h2>
                                 <h5 class="">Sale</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $data['totalOrder'] ?></span></h2>
                                 <h5 class="">Orders</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-12 col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Best selling books</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div id="bestsell-bar"></div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Revenue <?php if(isset($_GET['year'])) {echo $_GET['year'];}else{ echo "2023";} ?></h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item" href="index.php?year=2020">2020</a>
                                    <a class="dropdown-item" href="index.php?year=2021">2021</a>
                                    <a class="dropdown-item" href="index.php?year=2022">2022</a>
                                    <a class="dropdown-item" href="index.php?year=2023">2023</a>
                                    <a class="dropdown-item" href="index.php?year=2024">2024</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div id="revenue-column"></div>
                        </div>
                     </div>
                  </div>

                  <?php if(!empty($data['unprocessOrder'])) { ?> 
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Unprocess Orders</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-bordered table-striped">
                              <thead>
                                    <tr>
                                        <th class="col" style="width: 3%;">ID</th>
                                        <th class="col" style="width: 15%;">Name</th>
                                        <th class="col" style="width: 18%;">Email</th>
                                        <th class="col" style="width: 12%;">Phone</th>
                                        <th class="col" style="width: 18%;">Address</th>
                                        <th class="col" style="width: 12%;">Amount</th>
                                        <th class="col" style="width: 10%;">Order Date</th>
                                        <th class="col" style="width: 18%;">Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php foreach ($data['unprocessOrder'] as $key => $unOrd) { ?>
                                    <tr>
                                       <td><?php echo $unOrd['order_id'] ?></td>
                                       <td><?php echo $unOrd['user_name'] ?></td>
                                       <td><?php echo $unOrd['user_email'] ?></td>
                                       <td><?php echo $unOrd['user_phone'] ?></td>
                                       <td><?php echo $unOrd['address'] ?></td>
                                       <td><?php echo number_format($unOrd['all_price'], 0, '.', ','); ?> đ</td>
                                       <td><?php echo date_format(date_create($unOrd['order_date']),"d/m/Y"); ?></td>
                                       <td><div class="flex align-items-center list-user-action">
                                          <a class="bg-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="index.php?c=order&a=detail&id=<?php echo $unOrd['order_id']; ?>"><i class="ri-eye-line"></i></a>
                                          <a class="bg-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Check" href="index.php?c=order&a=check&id=<?php echo $unOrd['order_id']; ?>"><i class="ri-checkbox-circle-line"></i></a>
                                          <a class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel" href="index.php?c=order&a=cancel&id=<?php echo $unOrd['order_id']; ?>" onclick="return cancelOrder();"><i class="ri-close-circle-line"></i></a>
                                       </div></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>

               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <script>

         window.onload = function() {

            options = {
		         chart: {
			      height: 350,
			      type: "bar"
		         },
               plotOptions: {
                  bar: {
                     endingShape: "rounded",
                     horizontal: !0
                  }
               },
               dataLabels: {
                  enabled: !1
               },
               colors: ["#0dd6b8"],
               series: [{
                  name: "Sold",
                  data: <?php if(isset($data['bar']['qty'])){ echo $data['bar']['qty'];}else{ echo "[]";} ?>
               }],
               xaxis: {
                  categories: <?php if(isset($data['bar']['prd_name'])){ echo $data['bar']['prd_name'];}else{ echo "[]";} ?>
               }
               
	         };(chart = new ApexCharts(document.querySelector("#bestsell-bar"), options)).render()

            options1 = {
               chart: {
               height: 350,
               type: "bar"
               },
               plotOptions: {
                  bar: {
                     horizontal: !1,
                     columnWidth: "55%",
                     endingShape: "rounded"
                  }
               },
               dataLabels: {
                  enabled: !1
               },
               stroke: {
                  show: !0,
                  width: 2,
                  colors: ["transparent"]
               },
               colors: ["#0dd6b8", "#1ee2ac", "#ff7750"],
               series: [{
                  name: "Revenue",
                  data: <?php if(isset($data['chart']['total'])){ echo $data['chart']['total'];}else{ echo "[]";} ?>
               }],
		
               xaxis: {
                  categories: <?php if(isset($data['chart']['month'])){ echo $data['chart']['month'];}else{ echo "[]";} ?>
               },
               yaxis: {
                  // title: {
                  //    text: " "
                  // }
               },
               fill: {
                  opacity: 1
               },
               tooltip: {
                  y: {
                     formatter: 
                        function(value) {
                           var val = Math.abs(value)
                           if (val >= 1000000) {
                              val = (val / 1000000).toLocaleString('vi-VN') + 'tr vnđ'
                           }else if (val >= 10000) {
                              val = (val / 1000).toLocaleString('vi-VN') + 'k vnđ'
                           }else {
                              val = val + ' vnđ'
                           }
                           return val
                        }
                        
                  }
               }
	         };	(chart = new ApexCharts(document.querySelector("#revenue-column"), options1)).render()
         }   

         function cancelOrder() {
            return confirm("Do you want to cancel this order?");
         }
      </script>
      </script>
      