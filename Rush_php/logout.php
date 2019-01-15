<?php

session_start();
session_unset();
session_destroy();
setcookie('email',$_SESSION['email'],time()-1);
setcookie('username' , $_SESSION['username'], time()-1);
setcookie('id', $_SESSION['id'], time()-1);
header('location:index.php');

?>