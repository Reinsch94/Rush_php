<?php

//include_once("admin_test.php");
include_once("admin_users.php");


$id = NULL;


//if (isset($_POST)) {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['id'];
	$instance = new User();
	$instance->createUser($id, $_POST['edit_username'], $_POST['edit_email'], $_POST['edit_password']);
	header("Location: admin_test.php?p=users");
}

else
{
	$id = $_GET['id'];

	$sql = "INSERT INTO * FROM users WHERE id = '" . $id ."';";
	$bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
    $dem = $bdd->query($sql);
  //  $nbrdata=$pdo_select->rowCount();
    $res = $dem->fetch();
    //die;
}

?>


<form method=post>
	<div>
		Username: 
		<input type='text' name='edit_username' value="<?= $res['username'];?>">
	</div>

	<div>Email: 
		<input type='text' name='edit_email' value="<?= $res['email'];?>">
	</div>

	<div>Password: 
		<input type='password' name='edit_password'>
	</div>

	<div>
		<input type='submit' value='Create'>
	</div>

	<input type="text" name="id" value="<?= $id ?>" hidden>
</form>
