<?php 
session_start();

include_once("admin_users.php");
include_once("admin_product.php");
include_once("admin.php");
include_once("admin_categories.php");

	if($_SESSION['admin'] != "1"){
		header("location:index.php");
	}
?>
<!DOCTYPE html>

<html>
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Administration site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
    </ul>
    <span class="navbar-text">
  </div>
</nav>
</span>
</div>
</nav>

<div class="container">

	<br>
	<br>
	<br>
<div class="card-group">
<div class="card border-info mb-3" style="max-width: 18rem;">
  <div class="card-header">USERS</div>
  <div class="card-body text-info">
    <p class="card-text"><a href="?p=add_user">Create users</a></p>
     <p class="card-text"><a href="?p=users">Display - Edit - Delete users</a></p>
  </div>
</div>
<div class="card border-warning mb-3" style="max-width: 18rem;">
  <div class="card-header">PRODUCTS</div>
  <div class="card-body text-warning">
    <p class="card-text"><a href="?p=add_product">Create products</a></p>
    <p class="card-text"><a href="?p=edit_product">Display - Edit - Delete products</a></p>
  </div>
</div>
<div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">CATEGORIES</div>
  <div class="card-body text-dark">
    <p class="card-text"><a href="?p=add_categorie">Create categories</a></p>
    <p class="card-text"><a href="?p=edit_category">Display - Edit - Delete categories</a></p>
  </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php


//if($_SESSION['log']) == true)
//{

	if($_GET['p'] == "users")
	{
		$instance = new User();
		$var = $instance->getUser();
		/*echo "<table>
		<tr>
		<th>id</th>
		<th>username</th>
		<th>email</th>
		</tr>";*/
		?>
		<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Options</th>
      <th scope="col"></th>
    </tr>
  </thead>

  	<?php

		//echo $table;

		foreach($var as $row)
		{
	?>

  
	<tr>
	<td><?= $row['id']?></td>
	<td><?= $row['username']?></td>
	<td><?= $row['email']?></td>
	<td> <a href="admin_edit_user.php?id=<?=$row['id']?>">Edit</a></td>
	<td> <a href="admin_delete_user.php?id=<?=$row['id']?>">Delete</a></td>
	</tr>
</form>
 </tbody>
</div>
	<?php
		}

		echo "</table>";
	}

	if($_GET['p'] == "add_user")
	{
?>

<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
 <form method=post>
		<tr>
		<td><input type='text' name='username'/></td><br>
		<td><input type='text'name='email'/></td><br>
		<td><input type='text' name='password'/></td><br>
		<td><input type='submit' name='add' value='add'/></td>
		</tr>
		</form>
  </tbody>
</table>
</div>

<!--
		<form method=post>";
		<tr>";
		<td><input type='text' name='username'/></td><br>";
		<td><input type='text'name='email'/></td><br>";
		<td><input type='text' name='password'/></td><br>";
		<td><input type='submit' name='add' value='add'/></td>";
		</tr>";
		</form>";	-->
<?php
		//echo "</table>";
		//"<a href='admin_add_user.php?id=>".$var['id']."'>Add</a>". "
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$instance = new User();
			$instance->createUser($_POST['username'], $_POST['email'], $_POST['password']);
			header("Location: admin_test.php?p=users");
		}	
			
	}

	if(isset($_POST['edit']))

	{
		header("Location: admin_edit_user.php");
	}

//page pour ajouter un produit
	if($_GET['p']=="add_product")
	{
		$add= new Product;

 		if(isset($_POST['productname']) && isset($_POST['price']) && isset($_POST['category_id']))
  		{  
		    $name=($_POST['productname']);
		    $price=($_POST['price']);
		    $category_id=($_POST['category_id']);
		    $add->addProduct($name,$price,$category_id);
		    header('location:admin_test.php?p=add_product');
    
  		}
  		?>

<!-- Fonction add product -->
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product's name</th>
      <th scope="col">Price</th>
      <th scope="col">Categorie</th>
    </tr>
  </thead>
  <tbody>
 <form method=post>
		<tr>
		<td><input type='text' name='productname'/></td><br>
		<td><input type='text'name='price'/></td><br>
		<td><input type='text' name='category_id'/></td><br>
		<td><input type='submit' name='add' value='add'/></td>
		</tr>
		</form>
  </tbody>
</table>
</div>



<!-- <a href='admin.php'>Back</a> -->


</html>
<?php
  	}

//fonction edit product

if($_GET['p']=="edit_product")
{
	$product= new Product();
    $show=$product->ProduitCat($_GET['category_id']);
    
    foreach($show as $row)
    {

 ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['price'];?></td>
            <td><?php echo $row['category_id'];?></td>
            <br>
		</tr>




    <?php
    }
    
	//if(isset($_POST['product']))
	//{
	$product= new Product();
	$var2= $product->getProduct();
?>

<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product's name</th>
      <th scope="col">Price </th>
      <th scope="col">Categorie</th>
        <th scope="col">Options</th>
        <th scope="col"></th>
    </tr>
  </thead>

<?php 

	foreach($var2 as $row)
	{
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['category_id'];?></td>
			<td><a href="edit_product.php?id=<?PHP echo $row['id'];?>">Edit</a></td>
			<td><a href="delete_product.php?id=<?PHP echo $row['id'];?>">Delete</a></td>
			
			

			<br>
			</tr>
<?php	
	//}
	}
}

//fonction ajout catégories


if($_GET['p']=="add_categorie")
{
	$add= new Category;


if (isset($_POST['category_name']) && !empty($_POST['category_name']) && isset($_POST['parent_id']) && !empty($_POST['parent_id']))
{
$name = $_POST['category_name'];
$parent_id = $_POST['parent_id'];
$add->addCategory($name, $parent_id);
}

if (isset($_POST['Retour']))
{
    header('location: admin.php');
    exit();
}

?>


<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Category's name</th>
      <th scope="col">Parent ID</th>
    </tr>
  </thead>
  <tbody>
 <form method=post>
		<tr>
		<td><input type='text' name='category_name'/></td><br>
		<td><input type='number'name='parent_id'/></td><br>
		<td><input type='submit' name='Submit' value='Submit'/></td>
		<td><input type="submit" name="Retour" value="Return"></td>
		</tr>
		</form>
  </tbody>
</table>
</div>



<?php
}
//header('location:admin.php');

//fonction edit category

if($_GET['p']=="edit_category")
{
    $category = new Category();
    $var3 = $category->getCategory();

    ?>
    <div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category's name</th>
      <th scope="col">Parent's ID</th>
        <th scope="col">Options</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <?php 

    foreach($var3 as $row)
    {
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['parent_id'];?></td>
			<td><a href="edit_category.php?id=<?PHP echo $row['id'];?>">Edit</a><br></td>
            <td><a href="delete_category.php?id=<?PHP echo $row['id'];?>">Delete</a></td>

            </tr>
	<?php   


	}
	

	if (isset($_POST['Return']))
	{
	    header('location: admin.php');
	    exit();
	}
}
?>
