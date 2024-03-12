<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
            </a>
            <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="http://localhost/clones/igotit/public/home"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="http://localhost/clones/igotit/public/shop"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <!-- <a class="text-dark mb-2" href="http://localhost/clones/igotit/public/detail"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a> -->
                        <a class="text-dark mb-2" href="http://localhost/clones/igotit/public/cart"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <!-- <a class="text-dark mb-2" href="http://localhost/clones/igotit/public/checkout"><i class="fa fa-angle-right mr-2"></i>Checkout</a> -->
                        <a class="text-dark" href="http://localhost/clones/igotit/public/contact"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="../public\assets/img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->
<script>
        function add_qauntity(){
            val = document.getElementById('product_qauntity').value;
            document.getElementById('product_qauntity').value = Number(val)+1;
        };
    </script>
    <script>
                                
    function remove_qauntity(){
        val = document.getElementById('product_qauntity').value;
        if(Number(val)>1){
            document.getElementById('product_qauntity').value =Number(val)-1;
        }else{
            document.getElementById('product_qauntity').value = 1;
        }
    };
    </script>
    <script>
        
            <?php $userid = (isset($_COOKIE['customer_id'])? $_COOKIE['customer_id']:'NULL');?>
            function addtocart(e){

                
                let url = "http://localhost/clones/igotit/public/addtocart";
                let data = {
                    'product_id':<?php echo json_encode($data['product_id']);?>,
                    'customer_id':<?php echo json_encode($userid);?>,
                    'product_qauntity':document.getElementById('product_qauntity').value
                } ;
                jQuery.ajax({
                    url:url,
                    data:JSON.stringify(data),
                    cache:false,
                    processData:false,
                    contentType:false,
                    type:'POST',
                    success:function(result){
                        result = JSON.parse(result);  
                        console.log(result);  
                        if (result.status == 200) {
                            
                            window.location.href = `http://localhost/clones/igotit/public/cart?user=<?php echo json_encode($userid);?>`;
                        } else {
                            console.log(result);
                            alert(result.message);
                        };
                    }
                });
                // console.log(data);
            
            };
       
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
        let chack = await fetch("http://localhost/clones/igotit/public/chackUniqeMail?public=" + $(elm).val());
        let result = await chack.json();
        console.log(result);
        if (result.status == 200) {
            $(errorElm).html("Email Already Exists");
            if (errorElm.hide()) {
                $(errorElm).show().focus();
                return false;
            };
            return false;
        } else {
            $(errorElm).html("Enter Correct Email");
            if (errorElm.show()) {
                $(errorElm).hide();
                return true;
            };
            return true;
        }
    }
</script>


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- prodcuct tab js lib -->
<script src="<?php echo $this->assets; ?>lib/slick/easing.min.js"></script>
<script src="<?php echo $this->assets; ?>lib/slick/slick.min.js"></script>
<script src="<?php echo $this->assets; ?>lib/slick/main.js"></script>
<!-- prodcuct tab js lib -end-->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?php echo $this->assets; ?>js/main.js"></script>


</body>

</html>