<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>igotit - public</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../public\assets/../public\assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- product page css -->
    <link href="<?php echo $this->assets;?>lib/slick/slick.css" rel="stylesheet">
    <link href="<?php echo $this->assets;?>lib/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo $this->assets;?>lib/slick/style.css" rel="stylesheet">
    <!-- product page css-end -->

    <!-- Libraries Stylesheet -->
    
    <link href="../public\assets\lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../public\assets/css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
           
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="http://localhost/clones/igotit/public/home" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    
           
    <nav class="container navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="http://localhost/clones/igotit/public/home" class="nav-item nav-link<?php if($this->page_name == '/home'){echo " active";}?>">Home</a>
                <a href="http://localhost/clones/igotit/public/shop" class="nav-item nav-link<?php if($this->page_name == '/shop'){echo " active";}?>">Shop</a>
                <a href="http://localhost/clones/igotit/public/detail" class="nav-item nav-link<?php if($this->page_name == '/detail'){echo " active";}?>">Shop Detail</a>
                <a href="http://localhost/clones/igotit/public/cart" class="nav-item nav-link<?php if($this->page_name == '/cart'){echo " active";}?>">Shopping Cart</a>
                <a href="http://localhost/clones/igotit/public/checkout" class="nav-item nav-link<?php if($this->page_name == '/checkout'){echo " active";}?>">Checkout</a>
                <a href="http://localhost/clones/igotit/public/contact" class="nav-item nav-link<?php if($this->page_name == '/contact'){echo " active";}?>">Contact</a>
            </div>
            <?php 
                if(isset($_COOKIE['customer_id'])){ ?>
                <div class="navbar-nav  py-0">
                    <a class="nav-item nav-link" onclick="removeUser()">LogOut</a>
                </div>
            <?php } else { ?>
                <div class="navbar-nav  py-0">
                    <a href="http://localhost/clones/igotit/public/login" class="nav-item nav-link<?php if($this->page_name == '/login'){echo " active";}?>">Login</a>
                    <a href="http://localhost/clones/igotit/public/register" class="nav-item nav-link<?php if($this->page_name == '/register'){echo " active";}?>">Register</a>
                </div>
            <?php };?>
        </div>
    </nav>
            
    
    <!-- Topbar End -->


   <script>
    function removeUser(){
        document.cookie = "customer_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href="http://localhost/clones/igotit/public/login";
    }
   </script>