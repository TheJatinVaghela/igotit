<?php 
require_once("../model/model.php");
class controller extends model{

    public $page_name="";
    public function __construct(){
        parent::__construct();
        if(!isset($_SERVER["PATH_INFO"]) || $_SERVER["PATH_INFO"] == NULL){
           $path = "default";
        }else{
            $arr = explode("/",$_SERVER['REQUEST_URI']);
            $path = $arr[3].$_SERVER["PATH_INFO"];
        };
         
        
        $this->page_name = $path;
        if(isset($_COOKIE["customer_id"])){
            $data = ["customer_id" => $_COOKIE["customer_id"]];
            $answer = $this->chack_account("customer", $data);
            if($answer == false){
                unset($_COOKIE['customer_id']); 
                setcookie('customer_id', '', -1, '/'); 
            };
        };

        switch ($path){
            // PUBLIC CODE
            case "public/home":
                $this->view("../view/home.php"); 
                break;
            case "public/shop":
                $this->view("../view/shop.php"); 
                break;
            case "public/detail":
                $this->view("../view/detail.php"); 
                break;
            case "public/cart":
                $this->view("../view/cart.php"); 
                break;
            case "public/checkout":
                $this->view("../view/checkout.php"); 
                break;
            case "public/contact":
                $this->view("../view/contact.php"); 
                break;
            case "public/login":
                $this->view("../view/login.php"); 
                break;
            case "public/register":
                $this->view("../view/register.php"); 
                break;
            case "public/forgotpassword":
                $this->view("../view/forgotpassword.php"); 
                break;
            case "public/create_account":
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        $data = $this->create_account("customer",$_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'public/chack_account':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        $data = $this->chack_account("customer",$_POST);
                        print_r(json_encode($data));
                    };  
                };
                break;
            case 'public/changepassword':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        $Temp_Arr = $_POST;
                        array_pop($Temp_Arr); 
                        $data = $this->chack_account("customer",$Temp_Arr);
                        if($data['data'] == NULL){print_r(json_encode($data));};
                        $data = $this->update_account("customer",$_POST,$Temp_Arr);
                        print_r(json_encode($data));
                    };  
                };
                break;
            // SELLER CODE
            case 'seller/home':
                if(!isset($_COOKIE["seller_id"])){
                    echo "<center><h1>GO TO <a href='http://localhost/clones/igotit/seller/register'>SIGN UP</a>OR <a href='http://localhost/clones/igotit/seller/login'>SIGN IN</a> </h1> </center>";
                    exit();
                };
                $this->seller_view('../view/seller/seller_home.php');
                break;
            case 'seller/login':
                $this->seller_view('../view/seller/seller_login.php');
                break;
            case 'seller/register':
                $this->seller_view('../view/seller/seller_register.php');
                break;
            case 'seller/uploadproduct':
                $this->seller_view('../view/seller/uploadproduct.php');
                break;
            case 'seller/product':
                $this->seller_view('../view/seller/see_product.php');
                break;
            case 'seller/forgotpassword':
                $this->seller_view('../view/seller/forgotpassword.php');
                break;
            case 'seller/create_seller':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        array_pop($_POST);
                        $data = $this->create_account("seller",$_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'seller/chack_account':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        array_pop($_POST);
                        $data = $this->chack_account("seller",$_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'seller/changepassword':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return = $this->validate_data($_POST);
                    if($return == true){
                        print_r(json_encode(['data'=>$_POST,'message'=>'data Was empty','status' =>404]));
                    }else{
                        if($_POST["seller_password"] != $_POST["seller_password_re"]){
                            print_r(json_encode(['data'=>$_POST,'message'=>'Password Did Not Match','status' =>404]));
                        };
                        array_pop($_POST);
                        $Temp_Arr = $_POST;
                        array_pop($Temp_Arr); 
                        $data = $this->chack_account("seller",$Temp_Arr);
                        if($data['data'] == NULL){print_r(json_encode($data));};
                        $data = $this->update_account("seller",$_POST,$Temp_Arr);
                        print_r(json_encode($data));
                    };  
                };
                break;
            default:
                echo " NO PAGE " ;
                break;
                
        }
    }

    public function validate_data($data){
        $return =false;
        $empty = [];
        foreach($data as $key => $value){
            if($value === "" || !isset($value)){
                $return =true;
                array_push($empty, $value);
            } ;
        };
        return $return;
    }
    public function view($url){
        require_once("../view/header.php");
        require_once($url);
        require_once("../view/footer.php");
    }
    public function seller_view($url){
        require_once("../view/seller/header.php");
        require_once($url);
        require_once("../view/seller/footer.php");
    }

}