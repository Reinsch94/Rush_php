<?php


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
{
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

if(isset($_POST['category']))

{

    ?> <a href="add_category.php?">Add Category</a><br> <?php

    $category = new Category();

    $var3 = $category->getCategory();

    foreach($var3 as $row)

    {

        ?>

        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['parent_id'];?></td>
            <td><a href="edit_category.php?id=<?PHP echo $row['id'];?>">Edit</a></td>
            <td><a href="delete_category.php?id=<?PHP echo $row['id'];?>">Delete</a></td>
            <br>
            </tr>

<?php   

    }

}
?>
</body>
</html>

