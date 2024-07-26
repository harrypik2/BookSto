         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Edit Book: <?php echo $data['product']['prd_name']; ?></h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="index.php?c=product&a=update&id=<?php echo $data['product']['prd_id']; ?>" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                                 <label>Book Name:</label>
                                 <input required name="prd_name" type="text" class="form-control" value="<?php echo $data['product']['prd_name']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Book Image:</label>
                                 <div class="custom-file">
                                    <input name="prd_image" type="file" class="custom-file-input" onchange="preview();">
                                    <label class="custom-file-label">Choose file</label>        
                                 </div>
                                 <div>
                                 <br>
                                 </div>
                                 <div class="custom-file-preview">
                                    <?php 
                                       if(empty($data['product']['prd_image'])) {
                                          echo '<img src="/BookSto/public/uploads/no-img.jpg" height="200px" id="prd_image">';
                                       }else{
                                          echo '<img src="/BookSto/public/uploads/'.$data['product']['prd_image'].'" height="200px" id="prd_image">';
                                       }
                                    ?>
                                    
                                 </div> 
                              </div>
                              <div class="form-group">
                                 <label>Book Category:</label>
                                 <select name="cat_id" class="form-control" >
                                    <option selected="" disabled="">Book Category</option>
                                    <?php foreach ($data['categories'] as $key => $cate) { ?>
                                    <option
                                        <?php if($data['product']['cat_id'] == $cate['cat_id']) echo "selected"; ?>
                                        value=<?php echo $cate['cat_id']; ?>>
                                        <?php echo $cate['cat_name']; ?>
                                    </option>
                                <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Book Author:</label>
                                 <select name="aut_id" class="form-control">
                                    <option selected="" disabled="">Book Author</option>
                                    <?php foreach ($data['authors'] as $key => $aut) { ?>
                                    <option
                                        <?php if($data['product']['author']['aut_id'] == $aut['aut_id']) echo "selected"; ?>
                                        value=<?php echo $aut['aut_id']; ?>>
                                        <?php echo $aut['aut_name']; ?>
                                    </option>
                                <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Book Publisher:</label>
                                 <select name="pub_id" class="form-control">
                                    <option selected="" disabled="">Book Publisher</option>
                                    <?php foreach ($data['publishers'] as $key => $pub) { ?>
                                    <option
                                        <?php if($data['product']['pub_id'] == $pub['pub_id']) echo "selected"; ?>
                                        value=<?php echo $pub['pub_id']; ?>>
                                        <?php echo $pub['pub_name']; ?>
                                    </option>
                                <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Book Release Date:</label>
                                 <input required name="prd_date" type="date" class="form-control" value="<?php echo $data['product']['prd_date']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input required name="prd_price" type="text" class="form-control" value="<?php echo $data['product']['prd_price']; ?>">
                              </div>
                              <div class="form-group">
                                 <label>Book Status:</label>
                                 <select name="prd_status" class="form-control">
                                    <option value=1 <?php if($data['product']['prd_status'] == 1) echo "selected"; ?>>In stock</option>
                                    <option value=0 <?php if($data['product']['prd_status'] == 0) echo "selected"; ?>>Sold out</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <input name="prd_featured" type="checkbox" value=1 <?php if($data['product']['prd_featured'] == 1) echo "checked"; ?> class="form-check-input form-control form-control-sm">
                                 <label class="form-check-label">Book Featured:</label>
                              </div>
                              <div class="form-group">
                                 <label>Book Description:</label>
                                 <textarea name="prd_detail" class="form-control" rows="4"><?php echo $data['product']['prd_detail']; ?></textarea>
                              </div>
                              <input type="submit" name="sbm" value="Submit" class="btn btn-primary">
                              <button type="reset" class="btn btn-danger">Reset</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<script>
   function preview() {
      prd_image.src=URL.createObjectURL(event.target.files[0]);
   }
</script>
      <!-- Wrapper END -->
