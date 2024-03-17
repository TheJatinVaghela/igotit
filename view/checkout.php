<!-- <?php $this->print_stuf($data[0]['data']); ?> -->
<!-- <?php $this->print_stuf($data[0]['total']); ?> -->
<?php
$user_id = $_COOKIE['customer_id'];
$total = $data[0]['total'];
$user_data = $data[0]['user_data']['data'][0];
//   $this->print_stuf($data[0]['data']);
?>
<!-- Page Header Start -->

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="http://localhost/clones/igotit/public/home">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5 ">
    <div class="row px-xl-5">
        <!-- 
        <div class="col-md-12 form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="shipto">
                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
            </div>
        </div> -->
        <div class="collapse mb-4" id="shipping-address">
            <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
            <div class="row">

                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" placeholder="123 Street">
                </div>
                <div class="col-md-6 form-group">
                    <label>City</label>
                    <input class="form-control" type="text" placeholder="New York">
                </div>
                <div class="col-md-6 form-group">
                    <label>State</label>
                    <input class="form-control" type="text" placeholder="New York">
                </div>
                <div class="col-md-6 form-group">
                    <label>ZIP Code</label>
                    <input class="form-control" type="text" placeholder="123">
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">New Address</button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <?php foreach ($data[0]['data'] as $key => $value) { ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $value['product_name'] ?></p>
                            <p><?php echo $value['product_saleprice'] * $value['product_qauntity'] ?></p>
                        </div>
                    <?php } ?>


                    <!-- <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">total</h6>
                        <h6 class="font-weight-medium"><?php echo $data[0]['total']; ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div> -->
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo $data[0]['total']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <!-- <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                </div> -->
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" onclick="razerpay_function()">Place Order</button>
                    <!-- <form action="http://localhost/clones/igotit/public/paymentSuccessFull" method="POST">
<script
    
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $this->razerpay_api_key; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $total * 100; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo "OID" . rand(10, 100) . 'END'; ?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay Place Order"
    data-name="igotit"
    data-description="Goods"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="<?php echo $user_data['customer_firstname'] . " " . $user_data['customer_lastname']; ?>"
    data-prefill.email="<?php echo $user_data['customer_email']; ?>"
    data-prefill.contact="<?php echo $user_data['customer_phone']; ?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form> -->

                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                        function razerpay_function() {
                            var options = {
                                "key": "<?php echo $this->razerpay_api_key; ?>", // Enter the Key ID generated from the Dashboard
                                "amount": "<?php echo $total * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name": "igotit", //your business name
                                "description": "Goods",
                                "image": "https://example.com/your_logo.jpg",
                                "handler": function(response) {
                                    // alert(response.razorpay_payment_id);
                                    // alert(response.razorpay_order_id);
                                    // alert(response.razorpay_signature)

                                    jQuery.ajax({
                                        type: 'POST',
                                        url: "http://localhost/clones/igotit/public/payment",
                                        data: JSON.stringify({
                                            'pay_id': response.razorpay_payment_id,
                                            amount: <?php echo json_encode($total); ?>,
                                            name: <?php echo json_encode($user_data['customer_firstname'] . " " . $user_data['customer_lastname']); ?>,
                                        }),
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        success: function(response) {
                                            console.log(response);
                                            console.log(JSON.parse(response));
                                            response = JSON.parse(response);
                                            if (response.status == 200) {
                                                alert("Payment successful");
                                                window.location.href = "http://localhost/clones/igotit/public/paymentSuccessFull";
                                            } else {
                                                alert("Payment Unsuccessfull");
                                                
                                            };
                                        }
                                    })
                                },
                                "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                                    "name": "<?php echo $user_data['customer_firstname'] . " " . $user_data['customer_lastname']; ?>", //your customer's name
                                    "email": "<?php echo $user_data['customer_email']; ?>",
                                    "contact": "<?php echo $user_data['customer_phone']; ?>" //Provide the customer's phone number for better conversion rates 
                                },
                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            // rzp1.on('payment.failed', function(response) {
                            //     alert(response.error.code);
                            //     alert(response.error.description);
                            //     alert(response.error.source);
                            //     alert(response.error.step);
                            //     alert(response.error.reason);
                            //     alert(response.error.metadata.order_id);
                            //     alert(response.error.metadata.payment_id);
                            // });
                            rzp1.open();
                            e.preventDefault();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
<script>



</script>