<meta charset="utf-8" />
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=pool_php_rush;charset=utf8','root','root');

//$produit = $bdd->query('SELECT * FROM products ORDER BY id DESC');
if(isset($_GET['q']) AND !empty($_GET['q']) ) {
   $q = htmlspecialchars($_GET['q']);
   $produit = $bdd->query('SELECT * FROM products WHERE CONCAT(name, price, category_id)  LIKE "%'.$q.'%" ORDER BY id DESC');
}
?>

<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<?php if($produit->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $produit->fetch()) { ?>
      <li><?= $a['name'] ?></li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>
<?php } ?>

