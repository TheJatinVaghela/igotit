<?php
//  print_r($data);
$total = $data[0]['total'];
if (isset($data[0])) {

    if (isset($data[0]['data']) && $data[0]['data'] != NULL) {
        $data = $data[0]['data'];
    } else if ($data[0]['status'] == 500) {
        $data = $data[0]['message'];
    };
} else {
    $data = NULL;
};

?>
<header>
    <meta http-equiv="" content="0; url=http://localhost/clones/igotit/public/cart?user=ok" />
</header>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="http://localhost/clones/igotit/public/home">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php if (isset($data) && is_array($data)) { ?>

                        <?php foreach ($data as $key => $value) {
                            // print_r($value);
                        ?>
                            <tr>
                                <td class="align-middle"><img src="<?php echo $this->product_img . $value['product_img']; ?>" alt="😀" style="width: 50px;"> <?php echo $value['product_name']; ?></td>
                                <td class="align-middle"><?php echo $value['product_saleprice']; ?></td>
                                <td class="">
                                    <div class="input-group quantity">


                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-minus" onclick="remove_qauntity('product_qauntity_<?php echo $value['cart_id']; ?>',<?php echo $value['cart_id']; ?>,'totalPrice_<?php echo $value['cart_id']; ?>')">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                        </div>
                                        <input id="product_qauntity_<?php echo $value['cart_id']; ?>" type="text" class="form-control bg-secondary text-center" value="<?php echo $value['product_qauntity']; ?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-plus" onclick="add_qauntity('product_qauntity_<?php echo $value['cart_id']; ?>',<?php echo $value['cart_id']; ?>,'totalPrice_<?php echo $value['cart_id']; ?>')">
                                                <i class="fa fa-plus"></i>
                                            </button>

                                        </div>

                                    </div>
                                </td>
                                <td class="align-middle" id="totalPrice_<?php echo $value['cart_id']; ?>"><?php $saleprice = json_encode($value['product_saleprice']);
                                                                            echo $value['product_saleprice'] * $value['product_qauntity']; ?></td>
                                <td class="align-middle"><button class="btn btn-sm btn-primary" onclick="removeProduct('product_qauntity_<?php echo $value['cart_id']; ?>',<?php echo $value['cart_id'] ?>,'totalPrice_<?php echo $value['cart_id']; ?>')"><i class="fa fa-times"></i></button></td>
                            </tr>
                        <?php } ?>
                        <?php } else { ?><?php
                                            if ($data == NULL) {
                                                echo '<tr><td class="align-middle"  > YOU NEED TO LOGIN OR SIGN UP</td></tr>';
                                            } else if ($data != NULL) {
                                                echo '<tr><td class="align-middle"  ></td></tr>';
                                            };
                                        }; ?>


                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Do Chack Out</h4>
                </div>
                <!-- <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div> -->
                <div class="card-footer border-secondary bg-transparent">
                    <!-- <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" id="FullTotal"><?php echo $total; ?></h5>
                    </div> -->
                    <a href="http://localhost/clones/igotit/public/checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


<script>
   async function add_qauntity(quntityTagId,cart_id,totalTagId) {
    
        console.log(cart_id);
        val = document.getElementById(quntityTagId).value;
        let input = Number(val) + 1;
        document.getElementById(quntityTagId).value = input;
        document.getElementById(totalTagId).innerHTML = Number(<?php echo $saleprice; ?>) * input;
        let url = "http://localhost/clones/igotit/public/increaseProductQuantity";
        let data = {
                "product_qauntity": input,
                "cart_id": cart_id,
            };
        try {
            const config = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            }
            const responce = await fetch(url, config)
            const result = await responce.json()
            console.log(result);
            if (result.status == 200) {
                // window.location.reload();
            } else {
                // window.location.reload();
            };
        } catch (error) {
            // window.location.reload();
            console.log(error);
        }
    }true;
</script>
<script>
   async function remove_qauntity(quntityTagId,cart_id,totalTagId) {
        val = document.getElementById(quntityTagId).value;
        let input;
        if (Number(val) > 1) {
            input = Number(val) - 1;
            document.getElementById(quntityTagId).value = input;
            document.getElementById(totalTagId).innerHTML = Number(<?php echo $saleprice; ?>) * input;

        } else {
            input = 1;
            document.getElementById(quntityTagId).value = input;
            document.getElementById(totalTagId).innerHTML = Number(<?php echo $saleprice; ?>) * input;
        };
        let url = "http://localhost/clones/igotit/public/decreaseProductQuantity";
        try {
            const config = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                "product_qauntity": input,
                "cart_id": cart_id
            })
            }
            const responce = await fetch(url, config)
            const result = await responce.json()
            console.log(result);
            if (result.status == 200) {
                // window.location.reload();
            } else {
                // window.location.reload();
            };
        } catch (error) {
            // window.location.reload();
            console.log(error);
        }
    };

    function removeProduct(code) {
        let data = {
            "cart_id": code
        };
        console.log(data);
        let url = "http://localhost/clones/igotit/public/removeCart";
        jQuery.ajax({
            url: url,
            data: JSON.stringify(data),
            type: "POST",
            contentType: false,
            processData: false,
            success: function(result) {
                result = JSON.parse(result);
                console.log(result);
                if (result.status == 200) {
                    window.location.reload();
                } else {
                    console.log(result);
                };
            }
        })
    }
</script>