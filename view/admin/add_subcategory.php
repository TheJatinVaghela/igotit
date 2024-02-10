

        <!-- <?php  echo "<pre>"; print_r($this->data['data']); echo "</pre>";?> -->
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4>☆*: .｡. o(≧▽≦)o .｡.:*☆</h4>
              </div>
              <h4>Creating New Category ??</h4>
              <h6 class="font-weight-light">Creating is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post" id="create_category">
                
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="subcategory_name" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Ect...">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">select category</label>
                    <select class="form-control form-control-lg" name="product_category_id" id="exampleFormControlSelect1">
                    <?php foreach ($this->data['data'] as $key => $value) { ?>
                      <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                    <?php }?>  
                    </select>
                </div>
                
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">ADD</button>
                </div>
              </form>
            </div>
          </div>

<script>
    $(document).ready(function(){
        $('#create_category').on('submit',function(e){
            e.preventDefault();
            let data = new FormData(this);
            let url = "http://localhost/clones/igotit/admin/add_subcategory";
            jQuery.ajax({
                url: url,
                data:data,
                processData:false,
                contentType:false,
                type: 'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if(result.status == 200){
                        window.location.reload();
                    }else{
                        console.log(result);
                    };
                }
            });
        });
    });
</script>