<?php
include_once 'admin/include/init.php';
session_unset();
session_destroy();
header('location:user.php');
?>
