<?php

include_once("admin_product.php");
$add= new Product;

 if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category_id']))
  {  
    $name=($_POST['name']);
    $price=($_POST['price']);
    $category_id=($_POST['category_id']);
    $add->addProduct($name,$price,$category_id);
    header('location:admin_test.php?p=add_product');
    
  }





?>
<html>
<form method=post>
    <div>
        Name:<input type='text' name='name' value=" ">
    </div>
    <div>
        Price:<input type='text' name='price' value=' '>
    </div>
    <div>
        Categorie:<input type='text' name='category_id' value=" ">
    </div>
    <input type='submit' name="Add" value='Add'>
</form>

<a href='admin.php'>Back</a>


</html>
