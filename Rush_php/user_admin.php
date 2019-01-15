<?php
session_start();

include_once("admin_users.php");

//il se connecte et voit directement ses infos
$instance = new User();
$var = $instance->getUser($_SESSION['userid']);
/*echo "<table>
<tr>
<th>id</th>
<th>username</th>
<th>email</th>
</tr>";*/


//On fait la fonction edit : si on clique sur edit alors on lance la fonction edit
if(!empty($_POST))
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_SESSION['userid'];
		$admin = $_SESSION['admin']; //ajout incertain
		//$instance = new User();
		$instance->editUser($id, $_POST['edit_username'], $_POST['edit_email'], $_POST['edit_password']);

		//("Location: user_admin.php");
		header("Refresh:0");
				echo "Account edited!";
	}

	else
	{
		$id = $_SESSION['id'];

		$sql = "SELECT * FROM users WHERE id = '" . $id ."';";
		$bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
	    $dem = $bdd->query($sql);
	  //  $nbrdata=$pdo_select->rowCount();
	    $res = $dem->fetch();
	    //die;
	}
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

    <title>Accueil</title>
  </head>
  <body>
    <header>

<!--Navbar-->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img src="gucci_logo.png" alt="logo" width="20%"></a>
      <!--Catégories-->
      <span class="navbar-text"><a href="index.php">
        Home</a>
      </span>
      <span class="navbar-text">
        Catégorie1
      </span>
       <span class="navbar-text">
        Catégorie2
      </span>

    <!--Barre de recherche-->
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search products" aria-label="Search">
        <button class="btn btn-sm btn-outline-secondary" type="button">Search</button>
      </form>
    </nav>

</nav>
</header>

<!-- Container-->

<div class="container">

<!--form de bootstrap-->
<form method=post>
  <div class="form-group">
  	   <label>Username</label>
    	<input type="text" class="form-control" name='edit_username' value="<?= $var['username'];?>">
    	<small id="emailHelp" class="form-text text-muted">Write directly here to modify your data</small>
  </div>
   <div class="form-group">
    		<label>Email address</label>
    		<input type="email" class="form-control" name='edit_email' value="<?= $var['email'];?>">
    		<small id="emailHelp" class="form-text text-muted">Write directly here to modify your data</small>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control"  name='edit_password' value="<?= $var['password'];?>">
    <small id="emailHelp" class="form-text text-muted">Write directly here to modify your data</small>
  </div>
  <button type='submit' name='edit' value='Edit'>Edit my account</button>

  <div>
		<a href="user_delete.php?id=<?= $var['id']?>">Delete my account</a>
	</div>

	<input type="text" name="id" value="<?= $id ?>" hidden>
</form>

</div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>