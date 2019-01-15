<?php

session_start();


  if (isset($_COOKIE["email"]))
      $_SESSION['email'] = $_COOKIE["email"];
  if (isset($_COOKIE["username"]))
      $_SESSION['username'] = $_COOKIE["username"];
   

  if (empty($_SESSION['email']) || $_SESSION['log'] == false)
  {
      header('location: login.php');
      exit();
  }
  else
  {
      //echo "Hello " . $_SESSION["username"] . "<br>"; 
      if (isset($_POST['Logout']))
      {
          header('location:logout.php');
          exit();
      }
  }

?>

<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
</head>
<body>
<form method=post>
<input type="submit" name="Logout" value="Logout"><br>
</body>
</html> -->

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

  <!-- Carousel-->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="test.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="test.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="test.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--Cartes-->

<div class="row">
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <img src="images.jpeg" alt="product">
        <h5 class="card-title" align="center"><br>High fashioned shooes</h5>
        <p class="card-text" align="center">An highly interesting product you'll fall in love with</p>
        <a href="#" class="btn btn-primary">Shop me</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <img src="images.jpeg" alt="product">
        <h5 class="card-title" align="center"><br>White & gold blanket</h5>
        <p class="card-text" align="center">Another awesome product made in Gucci gang's team</p>
        <a href="#" class="btn btn-primary">Shop me</a>
      </div>
    </div>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>