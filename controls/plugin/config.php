<?php
if (!session_id()) {
    session_start();
}
$con = mysqli_connect("localhost", "root", "", "escrowisfy");
if (mysqli_connect_errno()) {
    # code...
    echo "Failed to connect to Mysql" . mysqli_connect_errno();
}
define('BASE_URL', filter_var('http://localhost/escrowsify/controls/', FILTER_SANITIZE_URL));
?>
