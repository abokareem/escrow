<?php

include_once 'config.php';
if(isset($_GET['login'])){
	$order->auth_merchant();
}

class Orders{

	private $connection;

	public function __construct($connection){

			$this->connection = $connection;
		}

		public function is_loggedin(){
			if(isset($_SESSION['merchant_auth']))
			{
				return true;
			}
		}

		public function auth_merchant(){
			
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
					$_SESSION['merchant_auth'] = $row['tblid'];
					$_SESSION['merchant_name'] = $row['firstname'].' '.$row['lastname'];
					$_SESSION['merchant_email'] = $row['emailaddres'];
					echo "success";
				}
			}else{
				echo "details";
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

					if($row['created_on'] == null){$created = "-";}
					else{$created == $row['created_on'];}

					if($row['delieveredon'] == null){$delivered = "-";}
					else{$delivered == $row['delieveredon'];}

					$myjson = array(
						"order"=>$row['tblid'],
						"customer"=>$row['userid'],
						"delivery"=>$row['delieveredby'],
						"status"=>$status,
						"created"=>$created,
						"delivered"=>$delivered,
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
					$myjson = array(
						"order"=>$row['tblid'],
						"customer"=>$row['userid'],
						"delivery"=>$row['delieveredby']
					);

					array_push($json, $myjson);
				}
				return json_encode($json);
			}
		}

		public function getTotalMade(){
			$json = array();
			$sql = "SELECT produuctid FROM escrowsify_orders WHERE status='1'";
			$query = $this->connection->query($sql);
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$sql = "SELECT * FROM escrowsify_tblproduct WHERE tblid='".$row['produuctid']."'";
				$query = $this->connection->query($sql);
				if($query->num_rows > 0){
					$amount = 0;
					while($row = $query->fetch_array()){
						$percent = 10/100;
						$tempCost = $percent * intval($row['productPrice']);
						$amount += $tempCost;
					}
					$json['amount'] = $amount;
					return $json;	
				}
			}
		}

		public function getTotalLoss(){
			$json = array();
			$sql = "SELECT produuctid FROM escrowsify_orders WHERE cancelled='1'";
			$query = $this->connection->query($sql);
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$sql = "SELECT * FROM escrowsify_tblproduct WHERE tblid='".$row['produuctid']."'";
				$query = $this->connection->query($sql);
				if($query->num_rows > 0){
					$amount = 0;
					while($row = $query->fetch_array()){
						$percent = 10/100;
						$tempCost = $percent * intval($row['productPrice']);
						$amount += $tempCost;
					}
					$json['amount'] = $amount;
					return $json;	
				}
			}
		}

		public function getEscrowAmount(){
			$json = array();
			$sql = "SELECT produuctid FROM escrowsify_orders WHERE cancelled='1'";
			$query = $this->connection->query($sql);
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$sql = "SELECT * FROM escrowsify_tblproduct WHERE tblid='".$row['produuctid']."'";
				$query = $this->connection->query($sql);
				if($query->num_rows > 0){
					$amount = 0;
					while($row = $query->fetch_array()){
						$percent = 10/100;
						$tempCost = $percent * intval($row['productPrice']);
						$amount += $tempCost;
					}
					$json['amount'] = $amount;
					return $json;	
				}
			}
		}

		public function getTotalCancelled(){
			$json = array();
			$sql = "SELECT cancelled FROM escrowsify_orders WHERE cancelled='1'";
			$query = $this->connection->query($sql);
			$count = $query->num_rows;
			if($count > 0){
				$json['count'] = $count;
				return $json;
			}else{
				$json['count'] = '0';
				return $json;
			}
		}

		public function getTotalDelivered(){
			$json = array();
			$sql = "SELECT status FROM escrowsify_orders WHERE status='1'";
			$query = $this->connection->query($sql);
			$count = $query->num_rows;
			if($count > 0){
				$json['count'] = $count;
				return $json;
			}else{
				$json['count'] = '0';
				return $json;
			}
		}

		public function getTotalPending(){
			$json = array();
			$sql = "SELECT status FROM escrowsify_orders WHERE status='0'";
			$query = $this->connection->query($sql);
			$count = $query->num_rows;
			if($count > 0){
				$json['count'] = $count;
				return $json;
			}else{
				$json['count'] = '0';
				return $json;
			}
		}

		public function __destruct(){
			// $this->connection.close();
		}
	}

	?>