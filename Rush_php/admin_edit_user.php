<?php

//include_once("admin_test.php");
include_once("admin_users.php");


$id = NULL;


//if (isset($_POST)) {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['id'];
	$instance = new User();
	$instance->editUser($id, $_POST['edit_username'], $_POST['edit_email'], $_POST['edit_password']);
	header("Location: admin_test.php?p=users");
}

else
{
	$id = $_GET['id'];

	$sql = "SELECT * FROM users WHERE id = '" . $id ."';";
	$bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
    $dem = $bdd->query($sql);
  //  $nbrdata=$pdo_select->rowCount();
    $res = $dem->fetch();
    //die;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>


<div class="container">
    <div class="form-group">
  <form method=post>
    <label>Username</label>
    <input type="text" class="form-control" name='edit_username' value="<?= $res['username'];?>">
    </div>
  <div class="form-group">
  <form method=post>
    <label>Email</label>
    <input type="email" class="form-control" name='edit_email' value="<?= $res['email'];?>">
    </div>
    <div class="form-group">
    <form method=post>
    <label>Password</label>
    <input type="password" class="form-control" name='edit_password' value="<?= $res['password'];?>" minlength="3" maxlength="10">
  </div>
  <input type="text" name="id" value="<?= $id;?>" hidden>
  
  <button type="submit" class="btn btn-primary">Edit datas</button>
  <br>
  <br>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</div>