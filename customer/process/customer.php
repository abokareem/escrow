<?php

include_once 'config.php';
if(isset($_GET['login'])){
	$order->userLogin();
}elseif(isset($_GET['addBank'])){
	$order->addBank();
}
elseif(isset($_GET['register'])){
	$order->usersRegister();
}

class Customer{

	private $connection;

	public function __construct($connection){

		$this->connection = $connection;
	}

	public function is_loggedin(){
		if(isset($_SESSION['userid']))
		{
			return true;
		}
	}

	public function userLogin(){

		$email = mysqli_real_escape_string($this->connection, $_POST['email']);
		$password = mysqli_real_escape_string($this->connection, $_POST['password']);

		$authPass = md5($password);

		$sql = "SELECT * FROM escrowsify_tblcustomer WHERE username='$email' OR emailaddres='$email' AND userpassword='$password'";
		$query = $this->connection->query($sql);
		if($query->num_rows == 1){
			$row = $query->fetch_assoc();
			if($row['userpassword'] != $authPass){
				echo "password";
			}else{
				$_SESSION['userid'] = $row['tblid'];
				$_SESSION['name'] = $row['firstname'].' '.$row['lastname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['emailaddres'] = $row['emailaddres'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['phonenumber'] = $row['phonenumber'];
				echo "success";
			}
		}else{
			echo "details";
		}
	}

	public function usersRegister()
	{
		$firstnamme = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$email = trim($_POST['email']);
		$phonenumber = trim($_POST['phone']);
		$username = trim($_POST['username']);
		$address = trim($_POST['address']);
		$userpassword = trim($_POST['password']);
		$encuserpassword = md5($userpassword);
		$time_keeper = date("Y-m-d H:i:s");
		$sql = "SELECT tblid FROM escrowsify_tblcustomer WHERE username='$username' OR emailaddres='$email'";
		$query = $this->connection->query($sql);
		if ($query){
			if ($query->num_rows < 1){
				$insertSql = "INSERT INTO escrowsify_tblcustomer set firstname='$firstnamme',lastname='$lastname',username='$username',emailaddre='$email',address='$address',phonenumber='$phonenumber',userpassword='$encuserpassword',createdon='$time_keeper'";
				$runQuery = $this->connection->query($insertSql);
				if ($runQuery) {
					echo "success";
				} else {
					echo "error";
				}
			}else{
				echo "details";
			}
		}else{
			echo "failed";
		}
	}

	public function getOrders(){
		$json = array();
		$sql = "SELECT * FROM escrowsify_orders";
		$query = $this->connection->query($sql); 
		if($query->num_rows){
			while($row = $query->fetch_array()){
				if($row['cancelled'] == 1){
					$status = "cancelled"; 
				}else{
					if($row['status'] == 1){
						$status = "completed"; 
					}else{
						$status = "pending";
					}
				}

				$sql = "SELECT * FROM escrowsify_tbldelivery WHERE tblid='".$row['delieveredby']."'";
				$query = $this->connection->query($sql);
				$result = $query->fetch_assoc();

				$myjson = array(
					"order"=>$row['tblid'],
					"delivery"=>$result['fisrtname'].' '.$result['lastname'],
					"status"=>$status,
				);

				array_push($json, $myjson);
			}
			return json_encode($json);
		}
	}

	public function getRecentCancelledOrders(){
		$json = array();
		$sql = "SELECT * FROM escrowsify_orders WHERE cancelled='1'";
		$query = $this->connection->query($sql); 
		if($query->num_rows){
			while($row = $query->fetch_array()){
				$sql = "SELECT * FROM escrowsify_tbldelivery WHERE tblid='".$row['delieveredby']."'";
				$query = $this->connection->query($sql);
				$result = $query->fetch_assoc();

				$myjson = array(
					"order"=>$row['tblid'],
					"delivery"=>$result['fisrtname'].' '.$result['lastname'],
					"status"=>$status,
				);

				array_push($json, $myjson);
			}
			return json_encode($json);
		}
	}

	public function getTotalSpent(){
		$json = array();
		$sql = "SELECT SUM(escrowsify_orders.tblid) AS TotalAmount,SUM(escrowsify_tblproduct.productPrice) AS productPrice FROM escrowsify_orders INNER JOIN escrowsify_tblproduct ON escrowsify_orders.produuctid=escrowsify_tblproduct.tblid WHERE escrowsify_orders.userid='".$_SESSION['userid']."' AND status='1'";
		$query = $this->connection->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$TotalAmount = $row['productPrice'];
			$json['amount'] = $TotalAmount;
			return $json;
		}
	}

	public function getEscrowAmount(){
		$json = array();
		$sql = "SELECT SUM(escrowsify_orders.tblid) AS TotalAmount,SUM(escrowsify_tblproduct.productPrice) AS productPrice FROM escrowsify_orders INNER JOIN escrowsify_tblproduct ON escrowsify_orders.produuctid=escrowsify_tblproduct.tblid WHERE escrowsify_orders.userid='".$_SESSION['userid']."' AND status='0'";
		$query = $this->connection->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$TotalAmount = $row['productPrice'];
			$json['amount'] = $TotalAmount;
			return $json;
		}
	}

	public function addBank(){
		$bankName = mysqli_real_escape_string($this->connection, $_POST['bankName']);
		$acctName = mysqli_real_escape_string($this->connection, $_POST['acctName']);
		$acctNo = mysqli_real_escape_string($this->connection, $_POST['acctNo']);
		$user = $_SESSION['userid'];

		$sql = "INSERT INTO escrowsify_tblcustomerbank (bank,acctNo,acctName,userid) VALUES('$bankName','$acctNo','$acctName','$user'";
		$query = $this->connection->query($sql);
		if($query){
			return "success";
		}else{
			return "error";
		}
	}

	public function getBanks(){
		$json = array();
		$sql = "SELECT * FROM escrowsify_tblcustomerbank WHERE userid='".$_SESSION['userid']."'";
		$query = $this->connection->query($sql);
		if($query->num_rows > 0){
			while($row = $query->fetch_array()){
				$data = array(
					"bank"=>$row['bank'],
					"acctNo"=>$row['acctNo'],
					"acctName"=>$row['acctName'],
				);
				array_push($json, $data);
			}
			return json_encode($json);
		}
	}

	public function __destruct(){
			// $this->connection.close();
	}
}

?>