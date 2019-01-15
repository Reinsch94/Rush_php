<?php

include("admin_product.php");
$delete= new Product;
$delete->deleteProduct($_GET['id']);
header('location:admin_test.php?p=edit_product');

?>