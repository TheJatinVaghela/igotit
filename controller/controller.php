<?php 
require_once("../model/model.php");
class controller extends model{

    public $page_name="";
    public function __construct(){
        parent::__construct();
        $path = (!isset($_SERVER["PATH_INFO"]) || $_SERVER["PATH_INFO"] == NULL)? "/home": $_SERVER["PATH_INFO"];
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
            case "/home":
                $this->view("../view/home.php"); 
                break;
            case "/shop":
                $this->view("../view/shop.php"); 
                break;
            case "/detail":
                $this->view("../view/detail.php"); 
                break;
            case "/cart":
                $this->view("../view/cart.php"); 
                break;
            case "/checkout":
                $this->view("../view/checkout.php"); 
                break;
            case "/contact":
                $this->view("../view/contact.php"); 
                break;
            case "/login":
                $this->view("../view/login.php"); 
                break;
            case "/register":
                $this->view("../view/register.php"); 
                break;
            case "/forgotpassword":
                $this->view("../view/forgotpassword.php"); 
                break;
            case "/create_account":
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
            case '/chack_account':
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
            case '/changepassword':
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

}