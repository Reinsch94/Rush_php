<?php

include("admin_categories.php");
$add= new Category;


if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['parent_id']) && !empty($_POST['parent_id']))
{
$name = $_POST['name'];
$parent_id = $_POST['parent_id'];
$add->addCategory($name, $parent_id);
}

if (isset($_POST['Retour']))
{
    header('location: admin.php');
    exit();
}

//header('location:admin.php');

?>

<html>
<form method=post>
    <div>
  Name:<br>
  <input type="text" name="name"><br>
</div>
<div>
  Parent id:<br>
  <input type="int" name="parent_id"><br>
</div>
<div>
  <input type="submit" name="Submit" value="Submit">
</div>
<div>
  <input type="submit" name="Retour" value="Retour">
</div>
</form> 
</html>