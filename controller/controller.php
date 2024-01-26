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