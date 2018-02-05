<?php
if (!isset( $_SESSION['userid'])) {
    header("Location: page-login.html");
    die();
}

?>