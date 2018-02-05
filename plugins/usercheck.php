<?php
if (!isset( $_SESSION['userid'])) {
    header("Location: index.php");
    die();
}

?>