<?php 

class model {
    public $assets = "../public/assets/";
    public $seller_assets = "../seller/assets/";
    public $admin_assets = "../admin/assets/";
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

    public function create_account($tbl,$data){
        $sql = "INSERT INTO $tbl( ";
        $firstSQL ="";
        $lastSQL="" ;
        foreach ($data as $key => $value) {
            $firstSQL .= "`$key` ,";
            $lastSQL .= "'$value' ,";
        };
        $firstSQL = substr($firstSQL,0,-1);
        $firstSQL .= " ) VALUES ( ";
        $lastSQL = substr($lastSQL,0,-1);
        $lastSQL .= " )";
        $sql .=$firstSQL.$lastSQL;
        $data = $this->sqli_($sql);
        return $data;
    }
    public function update_account($tbl,$data,$where=NULL){
        $sql = "UPDATE $tbl SET ";
        foreach ($data as $key => $value) {
            $sql .= "`$key` = '$value' ,";
        };
        $sql = substr($sql,0,-1);
        $sql .= " WHERE ";
        foreach ($where as $key => $value) {
            $sql .= "`$key` = '$value' AND";
        };
        $sql = substr($sql,0,-3);
        $data = $this->sqli_($sql); 
        if($data['data'] == NULL) {return $data;};
        $data = $this->chack_account($tbl,$where);
        return $data;
    }
    public function delete($tbl,$where=NULL){
        $sql = "DELETE FROM $tbl WHERE";
        foreach ($where as $key => $value) {
            $sql .= " $key = $value AND";
        };
        $sql = substr($sql,0,-3);
        $data = $this->sqli_($sql,false);
        return $data;
    }
    
    public function chack_account($tbl,$data){
        $sql = "SELECT * FROM $tbl WHERE ";
        foreach ($data as $key => $value) {
            $sql .= "`$key` = '$value' AND";
        };
        $sql = substr($sql,0,-3);
        $data = $this->sqli_($sql); 
        if($data['data'] == NULL) {return $data;};
        $data = $this->fatch_all($data['data']);
        return $data;
    }
    public function select($tbl,$get,$where=null){
        $sql = "SELECT";// FROM $tbl WHERE"
        foreach ($get as $key => $value) {
            $sql .= " $value ,";
        };
        $sql = substr($sql,0,-1);
        if($where != null){
            $sql .= "FROM $tbl WHERE";
            foreach ($where as $key => $value) {
                $sql .= " `$key` = '$value' AND";
            };
            $sql = substr($sql,0,-3);
        }else{
            $sql .= "FROM $tbl";
        };
        $data = $this->sqli_($sql); 
        if($data['data'] == NULL) {return $data;};
        $data = $this->fatch_all($data['data']);
        return $data;
    }
    public function sqli_($sql,$error=true){
        try {
            $sqli = $this->connection->query($sql);
            if(isset($sqli) || $sqli == 1){
                return ["data"=>$sqli,"message"=>"success","status"=>200,];
            }else{
                return ["data"=>NULL,"message"=>"Server Error","status"=>500,];
            };
        } catch (\Throwable $th) {
            if($error == true){
                return ["data"=>NULL,"message"=>$th->getMessage(),"status"=>500,];
            }else if($error == false){

            };
        }
       
    }
    public function fatch_all($sql){
        if($sql->num_rows > 0){
            $arr = [];
            $data = [];
            while ($sqli = $sql->fetch_object()) {
                foreach ($sqli as $key => $value){
                    $arr[$key]=$value;
                };
                array_push($data, $arr);
            };
            return ["data"=>$data,"message"=>"success","status"=>200];
        }else{
            return ["data"=>NULL,"message"=>"There Is No Data Releted Your Query","status"=>500];
        };
    }

    public function print_stuf($stuf){
        echo"<pre>";
        print_r($stuf);
        echo"</pre>";
    }
}