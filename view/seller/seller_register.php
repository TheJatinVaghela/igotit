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
        <input type="text" name="seller_name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
        <span id="seller_name_error" class="text-danger bold" style="display:none;">Enter Your Name</span>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="seller_email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
        <span id="seller_email_error" class="text-danger bold" style="display:none;">Enter Correct Email</span>
      </div>
      <!-- <div class="form-group">
        <select class="form-control form-control-lg" name="seller_country" id="exampleFormControlSelect2">
          <option>United States of America</option>
          <option>United Kingdom</option>
          <option>India</option>
          <option>Germany</option>
          <option>Argentina</option>
        </select>
        <span id="seller_country_error" class="text-danger bold" style="display:none;">Select County</span>
      </div> -->
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="seller_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
        <span id="seller_password_error" class="text-danger bold" style="display:none;">Please Enter Valid Password</span>
      </div>
      <!-- <div class="form-group">
        <label>File</label>
        <input type="file" name="seller_file" class="form-control form-control-lg" id="seller_file" placeholder="Password">
        <span id="seller_file_error" class="text-danger bold" style="display:none;">Input Imager File</span>
      </div> -->

      <!-- <input type="radio" id="html" name="fav_language" value="HTML">
      <label for="html">HTML</label><br>
      <input type="radio" id="css" name="fav_language" value="CSS">
      <label for="css">CSS</label><br>
      <input type="radio" id="javascript" name="fav_language" value="JavaScript">
      <label for="javascript">JavaScript</label>
      <span id="fav_language_error" class="text-danger bold" style="display:none;"> Please Select Atleast One</span> -->

      <div class="form-group">
        <label>Phone</label>
        <input class="form-control" id="seller_phone" name="seller_phone" type="tel" placeholder="+123 456 789">
        <span id="seller_phone_error" class="text-danger bold" style="display:none;">please Provide Phone Number</span>
      </div>
      <div class="form-group">
        <label>Addres</label>
        <input class="form-control" id="seller_addres" name="seller_addres" type="text" placeholder="123 Street">
        <span id="seller_addres_error" class="text-danger bold" style="display:none;">please Provide Addres</span>
      </div>

      <div class="mb-4">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input type="checkbox" id="seller_terms" name="seller_terms" class="form-check-input">
            I agree to all Terms & Conditions
          </label>
          <span id="seller_terms_error" class="text-danger bold" style="display:none;">please Agree to terms And Condition</span>
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
<button id="validate">CLICK</button>
<script>
  $(document).ready(function() {
    var spanErrorArray;
    $('#seller_register').on('submit', function(e) {
      e.preventDefault();

      spanErrorArray = validate_data({
        "seller_name_error": ($("input[name='seller_name']", '#seller_register') && $("input[name='seller_name']", '#seller_register').val().trim() !== '') ? true : false,
        "seller_addres_error": ($("input[name=seller_addres]", '#seller_register') && $("input[name=seller_addres]", '#seller_register').val().trim() !== '') ? true : false,
        "seller_email_error": (
          ($("input[name='seller_email']", '#seller_register')) 
          && 
          ($("input[name='seller_email']", '#seller_register').val())
          &&
          (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test($("input[type='email'][name='seller_email']", '#seller_register').val()))
          &&
          (chackIsUniqueMail($("input[name='seller_email']", '#seller_register'), $('#seller_email_error')))
          )? true : false,
        // "seller_country_error": ($("[name='seller_country']", '#seller_register').prop('selected', true) && $("[name='seller_country']", '#seller_register').prop('selected', true).is(':selected')) ? true : false,
        "seller_password_error": ($("input[type='password'][name=seller_password]", '#seller_register') && (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test($("input[type='password'][name=seller_password]", '#seller_register').val()))) ? true : false,
        "seller_phone_error": ($("input[type='tel'][name='seller_phone']", '#seller_register') && (/^(\(\d{3}\)|\d{3})[- .]?\d{3}[- .]?\d{4}$/.test($("input[type='tel'][name='seller_phone']", '#seller_register').val().trim()))) ? true : false,
        "seller_terms_error": ($("input:checkbox[name='seller_terms']", '#seller_register') && $("input:checkbox[name='seller_terms']", '#seller_register').is(':checked')) ? true : false,
        // "seller_file_error": ($("input[type='file'][name=seller_file]", '#seller_register') && $("input[type='file'][name=seller_file]", '#seller_register').val() && $("input[type='file'][name=seller_file]", '#seller_register').val().toLowerCase().match(/\.(png|jpg|jpeg|gif|bmp)$/)) ? true : false,
        // "fav_language_error": ($("input[type='radio'][name='fav_language']:checked") && $("input[type='radio'][name='fav_language']:checked").length > 0) ? true : false,

      });

      if (Array.isArray(spanErrorArray) && spanErrorArray.length === 0) {
        /*let data = new FormData(this);
        let url = "http://localhost/clones/igotit/seller/create_seller";
        jQuery.ajax({
          url: url,
          data: data,
          processData: false,
          contentType: false,
          type: 'POST',
          success: function(result) {
            result = JSON.parse(result);
            if (result.status == 200) {
              window.location.href = "http://localhost/clones/igotit/seller/login";
            } else {
              console.log(result);
            };
          }
        }); */
      } else {
        spanErrorArray.forEach(e => {
          let input = e.split("_error")[0];
          console.log($("[name='" + input + "']"));
          $("[name='" + input + "']").click(function(element) {
            if ($("#" + e).show()) {
              $("#" + e).hide();
            }
          })
        });
      }





    });
  });
</script>
<script>
  function validate_data(object) {
    let returnArr = [];
    for (const key in object) {
      if (object.hasOwnProperty.call(object, key)) {
        const element = object[key];
        if (element == false) {
          returnArr.push(key)
          $('#' + key).show();

          console.log(key);
        }
      }
    }
    return returnArr;
  }

  async function chackIsUniqueMail(elm, errorElm) {
    let chack = await fetch("http://localhost/clones/igotit/public/chackUniqeMail?seller=" + $(elm).val());
    let result = await chack.json();
    console.log(result);
    if(result.status == 200){
        $(errorElm).html("Email Already Exists");
        if(errorElm.hide()){
          $(errorElm).show().focus();
          return false;
        };
        return false;
    }else{
      $(errorElm).html("Enter Correct Email");
      if(errorElm.show()){
          $(errorElm).hide();
          return true;
        };
      return true;
    }
  }
</script>




<!-- 

[
        textInput = [$("input[type='text'][name=seller_name]").val(),$("input[type='text'][name=seller_addres]").val()],
        emailInput=[$("input[type='email'][name=exampleInputEmail1]").val(),],
        selectInput = [$('element_selector').prop('selected', true),],
        passwordInput = [$("input[type='password'][name=exampleInputPassword1]"),],
        phoneInput =[$("input[type='tel'][name=seller_phone]"),],
        chackboxInput = [$("input:checkbox[name='seller_terms']"),],
        fileInput = [$("input[type='password'][name=seller_file]"),],
        redioInput = [$("input[type='radio'][name=language]:checked", '#myForm'). val(),],
      ]
 -->