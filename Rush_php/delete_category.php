<?php

include("admin_categories.php");
$delete= new Category;
$delete->DeleteCategory($_GET['id']);
header('location:admin_test.php?p=edit_category');

?>