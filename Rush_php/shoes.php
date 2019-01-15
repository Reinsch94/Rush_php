<?php

include_once("admin_product.php");

$instance = new Product();
$instance->getProduct();
	
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Accueil</title>
  </head>
  <body>
    <header>

<!--Navbar-->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img src="gucci_logo.png" alt="logo" width="20%"></a>
      <!--Catégories-->
      <span class="navbar-text"><a href="index.php">
        Home</a>
      </span>
      <span class="navbar-text"><a href="categorie1.php">
        Women</a>
      </span>
       <span class="navbar-text">
        Men
      </span>

    <!--Barre de recherche-->
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search products" aria-label="Search">
        <button class="btn btn-sm btn-outline-secondary" type="button">Search</button>
      </form>
    </nav>

</nav>
</header>

<!-- Container-->

<div class="container">

<!--Cartes-->


<div class="card mb-3">
  <img class="card-img-top" src="gucci.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Gucci sneakers</h5>
    <p class="card-text">An embroidered appliqué adds a head-turning twist to stylish street sneakers crafted in Italy from supple leather.</p>
    <p class="card-text"><small class="text-muted">SOLD OUT</small></p>
  </div>
</div>




</div>
   
   <!-- Footer -->
<nav class="navbar navbar-dark bg-dark">
<!--text nav bar-->

 <span class="navbar-text">
MY ACCOUNT <br>
 <?php   if($_SESSION['admin'] == 1)
    {
?>
        <a href="admin_test.php">Access admin</a><br>
<?php
    }
    ?>
<a href="user_admin.php">Modify my account</a><br>
<a href="logout.php">Logout</a><br>
  </span>
   <span class="navbar-text">
    SHOP <br>
    <a href="#ref">Catégorie 1</a><br>
<a href="#ref">Catégorie 2</a><br>
  </span>
  <form class="form-inline">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" class="form-control" placeholder="Newsletter registration" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </form>
  <nav>
</nav>
</nav>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>