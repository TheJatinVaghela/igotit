<?php
require_once("../model/model.php");
class controller extends model
{
    public $data;
    public $page_name = "";
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SERVER["PATH_INFO"]) || $_SERVER["PATH_INFO"] == NULL) {
            $path = "default";
        } else {
            $arr = explode("/", $_SERVER['REQUEST_URI']);
            $path = $arr[3] . $_SERVER["PATH_INFO"];
        };
        $this->page_name = $path;
        $this->chack_userExists('customer', 'customer');
        $this->chack_userExists('admin', 'admin');
        $this->chack_userExists('seller', 'seller');

        switch ($path) {
                // PUBLIC CODE
            case "public/home":
                $this->data =          //data You Want              ,        //form this table,    //right JOIN category ON subcategory.product_category_id = category.category_id
                    $this->select_join(['category_name', 'subcategory_name'], 'subcategory', [['type' => 'right', 'table' => 'category', 'key' => 'subcategory.product_category_id', 'value' => 'category.category_id']]);

                $newArr = [];

                foreach ($this->data['data'] as $item) {
                    $categoryName = $item['category_name'];
                    $subcategoryName = $item['subcategory_name'];

                    if (!isset($newArr[$categoryName])) {
                        $newArr[$categoryName] = [];
                    }

                    if (!empty($subcategoryName)) {
                        $newArr[$categoryName][] = $subcategoryName;
                    }
                }
                $this->data = $newArr;
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $data = $this->insert("customer", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'public/chack_account':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $data = $this->chack_account("customer", $_POST);
                        if($data['data'][0]['customer_ban'] == '1'){
                            print_r(json_encode(['data'=>Null,'message'=>'You Have Been Banned','status'=>404]));
                        }else{
                            print_r(json_encode($data));
                        };
                    };
                };
                break;
            case 'public/changepassword':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $Temp_Arr = $_POST;
                        unset($Temp_Arr["customer_password"]);
                        array_pop($Temp_Arr);
                        $data = $this->chack_account("customer", $Temp_Arr);
                        if ($data['data'] == NULL) {
                            print_r(json_encode($data));
                        };
                        $data = $this->update_account("customer", $_POST, $Temp_Arr);
                        print_r(json_encode($data));
                    };
                };
                break;
                // SELLER CODE
            case 'seller/home':
                if (!isset($_COOKIE["seller_id"])) {
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
                $this->data['CATEGORY'] = $this->select('category', ['*']);
                $this->data['SUBCATEGORY'] = $this->select('subcategory', ['*']);
                $this->seller_view('../view/seller/uploadproduct.php');
                break;
            case 'seller/product':
                $this->seller_view('../view/seller/see_product.php');
                break;
            case 'seller/forgotpassword':
                $this->seller_view('../view/seller/forgotpassword.php');
                break;
            case 'seller/create_seller':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        unset($_POST['seller_terms']);
                        $data = $this->insert("seller", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'seller/chack_account':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        unset($_POST["seller_terms"]);
                        $data = $this->chack_account("seller", $_POST);
                        if($data['data'][0]['seller_ban'] == '1'){
                            print_r(json_encode(['data'=>Null,'message'=>'You Have Been Banned','status'=>404]));
                        }else{
                            print_r(json_encode($data));
                        };
                    };
                };
                break;
            case 'seller/changepassword':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        if ($_POST["seller_password"] != $_POST["seller_password_re"]) {
                            print_r(json_encode(['data' => $_POST, 'message' => 'Password Did Not Match', 'status' => 404]));
                        };
                        unset($_POST['seller_password_re']);
                        $Temp_Arr = $_POST;
                        unset($Temp_Arr['seller_password']);
                        $data = $this->chack_account("seller", $Temp_Arr);
                        if($data['data'][0]['seller_ban'] == '1'){
                            print_r(json_encode(['data'=>Null,'message'=>'You Have Been Banned','status'=>404]));
                        }else{
                            if ($data['data'] == NULL) {
                                print_r(json_encode($data));
                            };
                            $data = $this->update_account("seller", $_POST, $Temp_Arr);
                            print_r(json_encode($data));
                        };
                    };
                };
                break;
            case 'seller/get_subcategory':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {

                        $data=$_POST['select_category'];
                        $data = $this->connection->query("SELECT subcategory_id,subcategory_name FROM subcategory WHERE  `product_category_id` = $data");
                        if($data->num_rows > 0){
                            $data = $this->fatch_all($data);
                            print_r(json_encode($data));
                        }else{
                            print_r(json_encode(['data'=>NULL , 'message'=>'NO Sub Category Found','status'=>500]));
                        };
                        
                    };
                };
                break;
            case 'seller/add_product':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        try {
                            $uniq_id = time() . uniqid() . '_';
                            $img_name = $uniq_id . $_FILES['product_img']['name'];
                            move_uploaded_file($_FILES['product_img']['tmp_name'], $this->product_img . $img_name);
                            $_POST['product_img'] = $img_name;
                            $_POST['seller_id'] = $_COOKIE['seller_id'];
                            $_POST['product_code'] = uniqid() . time();
                        } catch (\Exception $th) {
                            print_r($th->getMessage());
                            exit();
                        }
                        unset($_POST['seller_terms']);
                        $data = $this->insert("product", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
                // ADMIN CODE
            case 'admin/home':
                if (!isset($_COOKIE["admin_id"])) {
                    echo "<center><h1>GO TO <a href='http://localhost/clones/igotit/admin/register'>SIGN UP</a>OR <a href='http://localhost/clones/igotit/admin/login'>SIGN IN</a> </h1> </center>";
                    exit();
                };
                $this->admin_view('../view/admin/admin_home.php');
                break;
            case 'admin/login':
                $this->admin_view('../view/admin/admin_login.php');
                break;
            case 'admin/register':
                $this->admin_view('../view/admin/admin_register.php');
                break;
            case 'admin/product':
                $this->admin_view('../view/admin/see_product.php');
                break;
            case 'admin/forgotpassword':
                $this->admin_view('../view/admin/forgotpassword.php');
                break;
            case 'admin/create_category':
                $this->admin_view('../view/admin/add_category.php');
                break;
            case 'admin/create_subcategory':
                $this->data = $this->select('category', ['*']);
                $this->admin_view('../view/admin/add_subcategory.php');
                break;
            case 'admin/customer-table':
                try {
                    $this->data = $this->select('customer', ['*']);
                    $this->data['name'] = 'Customer';
                } catch (\Exception $th) {
                    print_r($th);
                };
                $this->admin_view('../view/admin/usertable.php');
                break;
            case 'admin/seller-table':
                try {
                    $this->data = $this->select('seller', ['*']);
                    $this->data['name'] = 'Seller';
                } catch (\Exception $th) {
                    print_r($th);
                };
                $this->admin_view('../view/admin/usertable.php');
                break;
            case 'admin/create_admin':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        unset($_POST['admin_terms']);
                        $data = $this->insert("admin", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'admin/chack_account':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        unset($_POST['admin_terms']);
                        $data = $this->chack_account("admin", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'admin/changepassword':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        if ($_POST["admin_password"] != $_POST["admin_password_re"]) {
                            print_r(json_encode(['data' => $_POST, 'message' => 'Password Did Not Match', 'status' => 404]));
                        };
                        unset($_POST['admin_password_re']);
                        $Temp_Arr = $_POST;
                        unset($Temp_Arr['admin_password']);
                        $data = $this->chack_account("admin", $Temp_Arr);
                        if ($data['data'] == NULL) {
                            print_r(json_encode($data));
                        };
                        $data = $this->update_account("admin", $_POST, $Temp_Arr);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'admin/update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $key = array_key_exists('seller_id', $_POST) ? 'seller_id' : 'customer_id';
                        $table = explode('_', $key);
                        array_pop($table);
                        $data = $this->update_account($table[0], $_POST, [$key => $_POST[$key]]);
                        print_r(json_encode($data));
                    }
                };
                break;
            case 'admin/delete':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $post_data = json_decode(file_get_contents('php://input'), true);

                    $return = $this->validate_data($post_data);
                    if ($return == true) {
                        print_r(json_encode(['data' => $post_data, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $key = array_key_exists('seller_id', $post_data) ? 'seller' : 'customer';
                        $data = $this->chack_account("admin", $post_data);
                        if ($data['data'] == NULL) {
                            print_r(json_encode($data));
                        };
                        $data = $this->delete($key, $post_data);
                        print_r(json_encode($data));
                    }
                };
                break;
            case 'admin/block':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $post_data = json_decode(file_get_contents('php://input'), true);

                    $return = $this->validate_data($post_data);
                    if ($return == true) {
                        print_r(json_encode(['data' => $post_data, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $key = array_key_exists('seller_id', $post_data) ? 'seller' : 'customer';
                        $data = $this->chack_account("admin", $post_data);
                        if ($data['data'] == NULL) {
                            print_r(json_encode($data));
                        };
                        
                        $data = $this->update_account($key, [$key . "_ban" => '1'], $post_data);

                        print_r(json_encode($data));
                    }
                };
                break;
            case 'admin/unblock':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $post_data = json_decode(file_get_contents('php://input'), true);

                    $return = $this->validate_data($post_data);
                    if ($return == true) {
                        print_r(json_encode(['data' => $post_data, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $key = array_key_exists('seller_id', $post_data) ? 'seller' : 'customer';
                        $data = $this->chack_account("admin", $post_data);
                        if ($data['data'] == NULL) {
                            print_r(json_encode($data));
                        };

                        $data = $this->update_account($key, [$key . "_ban" => '0'], $post_data);

                        print_r(json_encode($data));
                    }
                };
                break;
            case 'admin/add_category':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $data = $this->insert("category", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            case 'admin/add_subcategory':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST)) {
                    $return = $this->validate_data($_POST);
                    if ($return == true) {
                        print_r(json_encode(['data' => $_POST, 'message' => 'data Was empty', 'status' => 404]));
                    } else {
                        $data = $this->insert("subcategory", $_POST);
                        print_r(json_encode($data));
                    };
                };
                break;
            default:
                echo " NO PAGE ";
                break;
        }
    }

    public function validate_data($data)
    {
        $return = false;
        $empty = [];
        foreach ($data as $key => $value) {
            if ($value === "" || !isset($value)) {
                $return = true;
                array_push($empty, $value);
            };
        };
        return $return;
    }
    public function chack_userExists($cookie, $tbl)
    {   
        $cookie_key = $cookie.'_id';
        if (isset($_COOKIE[$cookie_key])) {
            $data = [$cookie_key => $_COOKIE[$cookie_key]];
            $answer = $this->chack_account($tbl, $data);
            if($cookie !== 'admin'){
               
                if($answer['data'][0][$cookie.'_ban'] == '1'){
                    unset($_COOKIE[$cookie_key]);
                    setcookie($cookie_key, '', -1, '/');
                }else{
                    if ($answer['status'] == 500) {
                        unset($_COOKIE[$cookie_key]);
                        setcookie($cookie_key, '', -1, '/');
                    };
                };
            }else{
                if ($answer['status'] == 500) {
                    unset($_COOKIE[$cookie_key]);
                    setcookie($cookie_key, '', -1, '/');
                };
            };
        };
    }
    public function view($url)
    {
        require_once("../view/header.php");
        require_once($url);
        require_once("../view/footer.php");
    }
    public function seller_view($url)
    {
        require_once("../view/seller/header.php");
        require_once($url);
        require_once("../view/seller/footer.php");
    }
    public function admin_view($url)
    {
        require_once("../view/admin/header.php");
        require_once($url);
        require_once("../view/admin/footer.php");
    }
}
