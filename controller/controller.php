<?php 
require_once("../model/model.php");
class controller extends model{

    public function __construct(){
        parent::__construct();
        $path = (!isset($_SERVER["PATH_INFO"]) || $_SERVER["PATH_INFO"] == NULL)? "/home": $_SERVER["PATH_INFO"];

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
            case "/create_account":
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return =false;
                    $empty = [];
                    foreach($_POST as $key => $value){
                        if($value === "" || !isset($value)){
                            $return =true;
                            array_push($empty, $value);
                        } ;
                    };
                    if($return == true){
                        print_r(json_encode(['data'=>$empty,'message'=>'data Was empty','status' =>404]));
                    }else{
                        $data = $this->create_account("customer",$_POST);
                        if($data == false){
                            print_r(json_encode(['data'=>$data,'message'=>'Server ERROR','status' =>500]));
                        }else{
                            print_r(json_encode(['data'=>$data,'message'=>'success','status' =>200]));
                        };
                    };
                };
                break;
            case 'chack_account':
                if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)){
                    $return =false;
                    $empty = [];
                    foreach($_POST as $key => $value){
                        if($value === "" || !isset($value)){
                            $return =true;
                            array_push($empty, $value);
                        } ;
                    };
                    if($return == true){
                        print_r(json_encode(['data'=>$empty,'message'=>'data Was empty','status' =>404]));
                    }else{
                        $data = $this->chack_account("customer",$_POST);
                        if($data == false){
                            print_r(json_encode(['data'=>$data,'message'=>'Server ERROR','status' =>500]));
                        }else{
                            print_r(json_encode(['data'=>$data,'message'=>'success','status' =>200]));
                        };
                    };  
                };
                break;
            default:
                echo " NO PAGE " ;
                break;
                
        }
    }

    public function view($url){
        require_once("../view/header.php");
        require_once($url);
        require_once("../view/footer.php");
    }

}