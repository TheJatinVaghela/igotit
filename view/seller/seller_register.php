

          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4>☆*: .｡. o(≧▽≦)o .｡.:*☆</h4>
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post" id="seller_register">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="seller_name" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="seller_email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
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
                  <label>Password</label>
                  <input type="password" name="seller_password" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" name="seller_phone" type="text" placeholder="+123 456 789" required>
                </div>
                <div class="form-group">
                  <label>Addres</label>
                  <input class="form-control" name="seller_addres" type="text" placeholder="123 Street" required>
                </div>
                
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="seller_terms" class="form-check-input" required>
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="http://localhost/clones/igotit/seller/login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>

<script>
    $(document).ready(function(){
        $('#seller_register').on('submit',function(e){
            e.preventDefault();
            let data = new FormData(this);
            let url = "http://localhost/clones/igotit/seller/create_seller";
            jQuery.ajax({
                url: url,
                data:data,
                processData:false,
                contentType:false,
                type: 'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if(result.status == 200){
                        window.location.href = "http://localhost/clones/igotit/seller/login";
                    }else{
                        console.log(result);
                    };
                }
            });
        });
    });
</script>