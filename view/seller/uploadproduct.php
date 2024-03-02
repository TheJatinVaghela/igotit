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
        <input type="text"  name="product_name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="name">
        <span id="product_name_error" class="text-danger bold" style="display:none;">please Enter Product Name</span>
      </div>
      <div class="form-group">
        <label>Product Discription</label>
        <input type="text"  name="product_discription" class="form-control form-control-lg" id="exampleInputdiscription1" placeholder="discription">
        <span id="product_discription_error" class="text-danger bold" style="display:none;">please Enter Product Discription</span>
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
        <input type="file" name="product_img"  accept="image/*" multiple class="form-control form-control-lg" id="exampleInputimage1">
        <span id="product_img_error" class="text-danger bold" style="display:none;">please Select A Image</span>
      </div>

      <div class="form-group">
        <label>Tages</label>
        <input class="form-control"  name="product_tags" type="text" placeholder="cloth/now/trend">
        <p>Ex:- cloth/trend/now</p>
        <span id="product_tags_error" class="text-danger bold" style="display:none;">please Enter Tegs</span>
      </div>

      <div class="form-group">
        <label for="select_category">select category</label>
        <select class="form-control form-control-lg" name="product_category_id" id="select_category" >
          <option>Select</option>
          <?php foreach ($this->data['CATEGORY']['data'] as $key => $value) { ?>
            <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
          <?php } ?>
        </select>
        <span id="product_category_id_error" class="text-danger bold" style="display:none;">please select Category</span>
      </div>
      <div class="form-group">
        <label for="select_subcategory">select subcategory</label>
        <select class="form-control form-control-lg" name="product_subcategory_id" id="select_subcategory" >
          <!-- <?php foreach ($this->data['SUBCATEGORY']['data'] as $key => $value) { ?>
                      <option value="<?php echo $value['subcategory_id'] ?>"><?php echo $value['subcategory_name'] ?></option> 
                    <?php } ?>   -->
        </select>
        <span id="product_subcategory_id_error" class="text-danger bold" style="display:none;">please select SubCategory</span>
      </div>
      <div class="form-group">
        <label>Retail - Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">$</span>
          </div>
          <input type="text" pattern="[0-9]+"  class="form-control" name="product_retailprice" placeholder="Only Numbers" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <span id="product_retailprice_error" class="text-danger bold" style="display:none;">please Enter Retail Price</span>
      </div>
      <div class="form-group">
        <label>Sale - Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">$</span>
          </div>
          <input type="text" pattern="[0-9]+"  class="form-control" name="product_saleprice" placeholder="Only Numbers" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
        <span id="product_saleprice_error" class="text-danger bold" style="display:none;">please Enter Sale Price</span>
      </div>
      <div class="mb-4">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input type="checkbox" name="seller_terms"  class="form-check-input">
            I agree to all Terms & Conditions
          </label>
          <span id="seller_terms_error" class="text-danger bold" style="display:none;">please Agree to terms And Condition</span>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">UPLOAD</button>
      </div>
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#uploadproduct').on('submit', function(e) {
      e.preventDefault();
      let data = new FormData(this);
      let url = "http://localhost/clones/igotit/seller/add_product";
      let href = "http://localhost/clones/igotit/seller/home";

      validateAndSendData({

          "product_name_error": (
            ($("input[name='product_name']", '#uploadproduct')) &&
            ($("input[name='product_name']", '#uploadproduct').val().trim() !== '')
          ) ? true : false,

          "product_discription_error": (
            ($("input[name=product_discription]", '#uploadproduct')) &&
            ($("input[name=product_discription]", '#uploadproduct').val().trim() !== '')
          ) ? true : false,

          "product_tags_error": (
            ($("input[name=product_tags]", '#uploadproduct')) &&
            ($("input[name=product_tags]", '#uploadproduct').val().trim() !== '')
          ) ? true : false,

          "product_retailprice_error": (
            ($("input[name=product_retailprice]", '#uploadproduct')) &&
            ($("input[name=product_retailprice]", '#uploadproduct').val().trim() !== '') &&
            (!isNaN($("input[name=product_retailprice]", '#uploadproduct').val().trim())) && 
            (Number.isInteger($("input[name=product_retailprice]", '#uploadproduct').val().trim()))
          ) ? true : false,

          "product_saleprice_error": (
            ($("input[name=product_saleprice]", '#uploadproduct')) &&
            ($("input[name=product_saleprice]", '#uploadproduct').val().trim() !== '') &&
            (!isNaN($("input[name=product_saleprice]", '#uploadproduct').val().trim())) && 
            (Number.isInteger($("input[name=product_saleprice]", '#uploadproduct').val().trim()))
          ) ? true : false,

          // "seller_email_error": (
          //   ($("input[name='seller_email']", '#uploadproduct')) &&
          //   ($("input[name='seller_email']", '#uploadproduct').val()) &&
          //   (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test($("input[type='email'][name='seller_email']", '#uploadproduct').val())) /*&&
          //   (chackIsUniqueMail($("input[name='seller_email']", '#uploadproduct'), $('#seller_email_error'), 'seller'))*/
          // ) ? true : false, 

          "product_category_id_error": (
            ($("[name='product_category_id']", '#uploadproduct').prop('selected', true)) &&
            ($("[name='product_category_id']", '#uploadproduct').prop('selected', true).is(':selected'))
          ) ? true : false,

          "product_subcategory_id_error": (
            ($("[name='product_subcategory_id']", '#uploadproduct').prop('selected', true)) &&
            ($("[name='product_subcategory_id']", '#uploadproduct').prop('selected', true).is(':selected'))
          ) ? true : false,

          // "seller_password_error": (
          //   ($("input[type='password'][name=seller_password]", '#uploadproduct')) &&
          //   (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test($("input[type='password'][name=seller_password]", '#uploadproduct').val()))
          // ) ? true : false,

          // "seller_phone_error": (
          //   ($("input[type='tel'][name='seller_phone']", '#uploadproduct')) &&
          //   (/^(\(\d{3}\)|\d{3})[- .]?\d{3}[- .]?\d{4}$/.test($("input[type='tel'][name='seller_phone']", '#uploadproduct').val().trim()))
          // ) ? true : false,

          "seller_terms_error": (
            ($("input:checkbox[name='seller_terms']", '#uploadproduct')) &&
            ($("input:checkbox[name='seller_terms']", '#uploadproduct').is(':checked'))
          ) ? true : false,

          "product_img_error": (
            ($("input[type='file'][name=product_img]", '#uploadproduct')) &&
            ($("input[type='file'][name=product_img]", '#uploadproduct').val()) &&
            ($("input[type='file'][name=product_img]", '#uploadproduct').val().toLowerCase().match(/\.(png|jpg|jpeg|gif|bmp)$/))
          ) ? true : false,

          /*  "fav_language_error": (
              ($("input[type='radio'][name='fav_language']:checked")) &&
              ($("input[type='radio'][name='fav_language']:checked").length > 0)
            ) ? true : false,  */

        },
        function() {
          jQuery.ajax({
            url: url,
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(result) {
              result = JSON.parse(result);
              if (result.status == 200) {
                window.location.href = href;
              } else {
                console.log(result);
              };
            }
          });
        });

    });

    $('#select_category').on('change', function(e) {
      let data = {
        select_category: this.value
      };
      url = 'http://localhost/clones/igotit/seller/get_subcategory';
      jQuery.ajax({
        data: data,
        url: url,
        type: 'POST',
        cache: false,
        success: function(result) {
          result = JSON.parse(result);
          if (result.status == 200) {
            console.log(result.data);
            result.data.map((e) => {
              console.log(e);
              $('#select_subcategory').append(`<option value='${e.subcategory_id}'>${e.subcategory_name}</option> `);
              //document.getElementById('select_subcategory').innerHTML +=`<option value='${e.subcategory_id}'>${e.subcategory_name}</option> `;
            });
          } else {
            console.log(result);
          };
        }
      })
    })
  });
</script>