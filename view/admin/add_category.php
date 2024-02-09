

     
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
                  <input type="text" name="category_name" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Ect...">
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
            let url = "http://localhost/clones/igotit/admin/add_category";
            jQuery.ajax({
                url: url,
                data:data,
                processData:false,
                contentType:false,
                type: 'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if(result.status == 200){
                        window.location.href = "http://localhost/clones/igotit/admin/home";
                    }else{
                        console.log(result);
                    };
                }
            });
        });
    });
</script>