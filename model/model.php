<?php 

class model {
    public $assets = "../public/assets/";
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "igotit";
    protected $connection ;

    public function __construct(){
        $this->create_connect($this->hostname,$this->username,$this->password,$this->database);
    }
    public function create_connect($hostname,$username,$password,$database){
        try {
            $this->connection = new mysqli($hostname,$username,$password,$database);
        } catch (\Exception $th) {
            print_r($th->getMessage());
            exit();
        };
        return $this->connection;
    } 

}