<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location:/html/login.php');
exit;
