<?php 

include_once("user_admin.php");

$instance = new User();
	$instance->deleteUser($_GET['id']);
	header("Location: login.php");


?>