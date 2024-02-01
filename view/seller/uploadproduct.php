
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4>Upload Product</h4>
              </div>
              <h4>🫵</h4>
              <h6 class="font-weight-light">Uploading Product is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post" id="uploadproduct">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" name="product_name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="name">
                </div>
                <div class="form-group">
                  <label>Product Discription</label>
                  <input type="text" name="product_discription" class="form-control form-control-lg" id="exampleInputdiscription1" placeholder="discription">
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
                  <label>Multiple Images</label>
                  <input type="file" name="product_img" accept="image/*" multiple="" data-max_length="20"  class="form-control form-control-lg" id="exampleInputimage1" >
                </div>
                <div class="form-group">
                  <label>Tages</label>
                  <input class="form-control" name="product_tags" type="text" placeholder="cloth/now/trend">
                  <p>Ex:- cloth/trend/now</p>
                </div>
                <div class="form-group">
                    <label>Addres</label>
                    <input class="form-control" name="customer_addres" type="text" placeholder="123 Street">
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <input class="form-control" name="product_category" type="text" placeholder="cloth">
                </div>
                
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>