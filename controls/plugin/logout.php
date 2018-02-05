<?php
require_once 'plugin/config.php';
/**
 * Created by PhpStorm.
 * User: Chimaobi
 * Date: 02/02/2018
 * Time: 17:30
 */
session_destroy();
header('Location: ' . BASE_URL);

?>