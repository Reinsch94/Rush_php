<?php

include_once("admin_users.php");
$instance = new User();
$instance->deleteUser($_GET['id']);
header("Location: admin_test.php?p=users");

?>