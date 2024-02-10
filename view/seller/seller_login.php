
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4>(❁´◡`❁)</h4>
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" id="seller_login">
                <div class="form-group">
                  <input type="email" required name="seller_email"class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Seller Email">
                </div>
                <div class="form-group">
                  <input type="password" required name="seller_password"class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="seller_terms" required class="form-check-input">
                     Will Keep you signed in
                    </label>
                  </div>
                  <a href="http://localhost/clones/igotit/seller/forgotpassword" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mt-3 my-2">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="http://localhost/clones/igotit/seller/register" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>



<script>
  $(document).ready(function() {
    $('#seller_login').on('submit', function(e) {
      e.preventDefault();
      let data = new FormData(this);
      let url = "http://localhost/clones/igotit/seller/chack_account";
      jQuery.ajax({
        url: url,
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(result) {
          result = JSON.parse(result);
          if (result.status == 200) {
            setCookie("seller_id",result.data[0].seller_id,2);
            setCookie("seller_name",result.data[0].seller_name,2);
            window.location.href = "http://localhost/clones/igotit/seller/home";
          } else {
            setCookie("seller_id",'NULL',-2);
            setCookie("seller_name",'NULL',-2);
            alert(result.message);
          };
        }
      });
    });
  });

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
</script>