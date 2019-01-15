<?php

session_start();

include_once("admin_users.php");
include_once("admin_product.php");
include_once("admin_categories.php");

//if($_SESSION["log"] == true)
//{

	
    //return $res; 

	//if($res == 1) //donc s'il est admin
	
	// $var=null;
	// $var2=null;
	if(isset($_POST['user']))
		{
			$instance = new User();
			$var = $instance->getUser();
		}
		if(isset($_POST['product']))
		{
			$product= new Product();
			$var2= $product->getProduct();
		}
		
	

//}

?>

<!DOCTYPE html>

<html>
<head>

</head>
<body>
<form method="POST">
	<input type="submit" name="product" value="product">
	<input type="submit" name="user" value="display user">
	<input type="submit" name="categorie" value="categorie">
</form>


<?php
if(isset($_POST['user']))
{

$var = $instance->getUser();
	foreach($var as $row)
	{
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['password'];?></td>
			<td><?php echo $row['email'];?></td>
			<input type="submit" name="modify" value="modify"><input type="submit" name="delete" value="delete">		
			<br>
			</tr>
<?php
	}	
	}
?>
<?php
if(isset($_POST['product']))
{?>
	<a href="add_product.php">Add</a><br>
	<a href="show_product.php?category_id=1000">Show Categorie</a><br>
	
	<?php
	$product= new Product();
	$var2= $product->getProduct();
	foreach($var2 as $row)
	{
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['category_id'];?></td>
			<a href="delete_product.php?id=<?PHP echo $row['id'];?>">Delete</a>
			<a href="edit_product.php?id=<?PHP echo $row['id'];?>">Modification</a>
			

			<br>
			</tr>
<?php	
	}
}
?>
</body>
</html>

