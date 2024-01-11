<?php
require_once 'config/function.php';
session_destroy();

header("Location: auth/login.php");
exit;
?>