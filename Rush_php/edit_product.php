<?php

include_once("admin_product.php");



if(isset($_POST['edit']))
{   
    $id=$_GET['id'];

    $instance= new Product;
    $instance->editProduct($id,$_POST['name'],$_POST['price'],$_POST['category_id']);
    header("location: admin_test.php?p=edit_product");

}
//, $_POST['edit_name'],$_POST['edit_price'],$_POST['edit_category']

if($_GET['id'])
{
    $id=$_GET['id'];
    $sql = "SELECT* FROM products WHERE id= :id";
    $bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
    $res = $bdd->prepare($sql);
    $res->bindParam(":id",$id);
    $res->execute();
    $test = $res->fetch();
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
    <label>Product's name</label>
    <input type="text" class="form-control" name='name' value="<?=$test['name'];?>" required>
    </div>
  <div class="form-group">
  <form method=post>
    <label>Price</label>
    <input type="number" class="form-control" name='price'  value="<?=$test['price'];?>">
    </div>
    <div class="form-group">
    <form method=post>
    <label>Category's id</label>
    <input type="number" class="form-control" name='category_id' value="<?=$test['category_id'];?>">
  </div>
   <input type='text' value="<?=$test['id'];?>" hidden>
  
  <input type="submit" class="btn btn-primary" name='edit' value="edit">
  <br>
  <br>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</div>

