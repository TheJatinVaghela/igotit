

          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4>Upload Product</h4>
              </div>
              <h4>🫵</h4>
              <h6 class="font-weight-light">Uploading Product is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post" id="uploadproduct" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" required name="product_name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="name">
                </div>
                <div class="form-group">
                  <label>Product Discription</label>
                  <input type="text" required name="product_discription" class="form-control form-control-lg" id="exampleInputdiscription1" placeholder="discription">
                </div>
                <!-- <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label>Images</label>
                  <input type="file" name="product_img" required accept="image/*" multiple class="form-control form-control-lg" id="exampleInputimage1" >
                </div>

                <div class="form-group">
                  <label>Tages</label>
                  <input class="form-control" required name="product_tags" type="text" placeholder="cloth/now/trend">
                  <p>Ex:- cloth/trend/now</p>
                </div>
          
                <div class="form-group">
                    <label for="exampleFormControlSelect1">select category</label>
                    <select class="form-control form-control-lg" name="product_category_id" id="exampleFormControlSelect1">
                    <?php foreach ($this->data['CATEGORY']['data'] as $key => $value) { ?>
                      <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                    <?php }?>  
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">select subcategory</label>
                    <select class="form-control form-control-lg" name="product_subcategory_id" id="exampleFormControlSelect1">
                    <?php foreach ($this->data['SUBCATEGORY']['data'] as $key => $value) { ?>
                      <option value="<?php echo $value['subcategory_id'] ?>"><?php echo $value['subcategory_name'] ?></option>
                    <?php }?>  
                    </select>
                </div>
                <div class="form-group">
                <label>Retail - Price</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white">$</span>
                    </div>
                    <input type="text" pattern="[0-9]+" required class="form-control" name="product_retailprice" placeholder="Only Numbers" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Sale - Price</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white">$</span>
                    </div>
                    <input type="text" pattern="[0-9]+" required class="form-control" name="product_saleprice" placeholder="Only Numbers" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox"  name="seller_terms" required class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >UPLOAD</button>
                </div>
              </form>
            </div>
          </div>

<script>
    $(document).ready(function(){
        $('#uploadproduct').on('submit',function(e){
            e.preventDefault();
            let data = new FormData(this);
            let url = "http://localhost/clones/igotit/seller/add_product";
            jQuery.ajax({
                url: url,
                data:data,
                processData:false,
                contentType:false,
                type: 'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if(result.status == 200){
                        window.location.href = "http://localhost/clones/igotit/seller/home";
                    }else{
                        console.log(result);
                    };
                }
            });
        });
    });
</script>