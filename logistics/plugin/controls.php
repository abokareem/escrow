<?php

session_start();
//include_once'User.php';
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'escrowisfy');


if (isset($_POST['page']) && !empty($_POST['page'])) {
    $action = $_POST['page'];
    switch ($action) {
        case 'usersregisteradmin' :
            $Auth = new Auth();
            echo $Auth->usersregisteradmin();
            break;
        case 'logicticsuserlogin':
            $Auth = new Auth();
            echo $Auth->logicticsuserlogin();
            break;
        case 'delefunc':
            $Auth = new Auth();
            echo $Auth->delefunc();
            break;
        case 'usersregisteradmin':
            $Auth = new Auth();
            echo $Auth->usersregisteradmin();
            break;
        case 'payment':
            $Auth = new Auth();
            echo $Auth->payment();
            break;
    }
}

class Auth
{

    public $db;

    public function __construct()
    {
        # code...
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {

            echo "Error: Could not connect to database.";

            exit;
        }
    }

    public function usersregisteradmin()
    {
        $firstnamme = trim($_POST['']);
        $lastname = trim($_POST['']);
        $email = trim($_POST['']);
        $phonenumber = trim($_POST['']);
        $username = trim($_POST['']);
        $address = trim($_POST['']);
        $userpassword = trim($_POST['']);
        $encuserpassword = md5($userpassword);
        $time_keeper = date("Y-m-d H:i:s");
        $findOccurance = "SELECT tblid FROM escrowsify_tblcustomer WHERE username='$username' OR emailaddres='$email'";
        $runSearchOccurance = mysqli_query($this->db,$findOccurance);
        if ($runSearchOccurance){
            $counter = mysqli_num_rows($runSearchOccurance);
            if ($counter < 1){
                $insertQuery = "INSERT INTO escrowsify_tblcustomer set firstname='$firstnamme',lastname='$lastname',username='$username',emailaddre='$email',address='$address',phonenumber='$phonenumber',userpassword='$encuserpassword',createdon='$time_keeper'";
                $runQuery = mysqli_query($this->db, $insertQuery);
                if ($runQuery) {
                    echo "registered";
                } else {
                    echo $insertQuery;
                }
            }else{
                echo "Username or Email address has been used";
            }
        }else{
            echo $findOccurance;
        }
    }

    public function userlogin(){
        $username = trim($_POST['']);
        $userpassword = trim($_POST['']);
        $encUser = md5($userpassword);
        $findUer = "SELECT tblid,firstname,lastname,username,emailaddre,address,phonenumber FROM escrowsify_tblcustomer WHERE username='$username' OR emailaddres='$username' AND userpassword='$encUser'";
        $runFindUserQuery = mysqli_query($this->db,$findUer);
        $counter = mysqli_num_rows($runFindUserQuery);
        if ($runFindUserQuery){
            if ($counter < 0){

                $fetcher = mysqli_fetch_array($runFindUserQuery);
                $_SESSION['userid'] = $fetcher['tblid'];
                $_SESSION['firstname'] = $fetcher['firstname'];
                $_SESSION['lastname'] = $fetcher['lastname'];
                $_SESSION['username'] = $fetcher['username'];
                $_SESSION['emailaddre'] = $fetcher['emailaddre'];
                $_SESSION['address'] = $fetcher['address'];
                $_SESSION['phonenumber'] = $fetcher['phonenumber'];

            }else{
                echo "Username or password incorrect";
            }
        }else{
            echo $findUer;
        }


    }

    public function logicticsuserlogin()
    {
        $username = trim($_POST['username']);
        $userpassword = trim($_POST['userpassword']);
        $encPassword = md5($userpassword);
        $findQuery = "SELECT tblid,fisrtname,lastname,email,username FROM escrowsify_tbldelivery WHERE username='$username' OR email='$username' AND userpassword='$encPassword'";
        $runQuery = mysqli_query($this->db, $findQuery);
        if ($runQuery) {
            $counter = mysqli_num_rows($runQuery);
            if ($counter > 0) {
                $fetchuser = mysqli_fetch_array($runQuery);
                $_SESSION['userid'] = $fetchuser['tblid'];
                $_SESSION['fisrtname'] = $fetchuser['fisrtname'];
                $_SESSION['lastname'] = $fetchuser['lastname'];
                $_SESSION['email'] = $fetchuser['email'];
                $_SESSION['username'] = $fetchuser['username'];
                echo "found";
            } else {
                echo "Username or password is incorrect";
                // echo "user not found";
            }
        } else {
            echo $findQuery;
        }

        # code...
    }

    public function delefunc()
    {
        $tblid = trim($_POST['tblid']);
        $table = trim($_POST['table']);
        $deleteQuery = "DELETE FROM '$table' WHERE tblid='$tblid'";
        $runDelete = mysqli_query($this->db,$deleteQuery);
        if ($runDelete){
            echo "deleted";
        }else{
            echo $deleteQuery;
        }
    }

    function payment(){

        $price = trim($_POST['realprice']);
        $time_keeper = date("Y-m-d H:i:s");
        //Specify your credentials
        $username = "sandbox";
        $apiKey   = "e536077edb79864982f4d89e05bab9c098bfe7216300f6eb291f9dfc586084d7";
//Create an instance of our awesome gateway class and pass your credentials
        $gateway = new AfricasTalkingGateway($username, $apiKey);
        /*************************************************************************************
        NOTE: If connecting to the sandbox:
        1. Use "sandbox" as the username
        2. Use the apiKey generated from your sandbox application
        https://account.africastalking.com/apps/sandbox/settings/key
        3. Add the "sandbox" flag to the constructor
        $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
         **************************************************************************************/
// Specify the name of your Africa's Talking payment product
        $productName  = "Escrowsify";
// Specify the payment card values of the customer checking out.
        $paymentCard  = array(
            "number"      => "123456789012345",
            "countryCode" => "NG",
            "cvvNumber"   => 123,
            "expiryMonth" => 9,
            "expiryYear"  => 2019,
            "authToken"   => "1234");
// The 3-Letter ISO currency code for the checkout amount
        $currencyCode = "NGN";
// The checkout amount
        $amount       = $price;
// A narration describing the transaction on the user's bank statement
        $narration    = "Payment for Airtime";
// Any metadata that you would like to send along with this request
// This metadata will be  included when we send back the final payment notification
        $metadata     = array(
            "requestId" => "MyRequestId1",
            "productId" => "321"
        );
        try {
            // Initiate the checkout. If successful, you will get back a transactionId
            // that you can then use to validate the OTP that is sent to the user
            $transactionId = $gateway->cardPaymentCheckoutCharge($productName,
                $paymentCard,
                $currencyCode,
                $amount,
                $narration,
                $metadata);
            $otp = "1234";
            try {
                // Initiate the checkout. If successful, you will get back a checkoutToken
                $checkoutToken = $gateway->cardPaymentCheckoutValidation($transactionId,
                    $otp);
                $insertQuery = "INSERT INTO escrowsify_orders SET userid='1',produuctid='1',delieveredby='1',status='1',created_on='$time_keeper'";
                $runIserQuery = mysqli_query($this->db,$insertQuery);
                if($runIserQuery){
                    echo "The checkout token for future transactions is ".$checkoutToken;
                }else{
                    echo $insertQuery;
                }

            }
            catch(AfricasTalkingGatewayException $e){
                echo "Received error response: ".$e->getMessage();
            }


        }
        catch(AfricasTalkingGatewayException $e){
            echo "Received error response: ".$e->getMessage();
        }
    }



}

?>
