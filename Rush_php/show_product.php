<?php 

    include_once ("admin_product.php");
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
    ?>



