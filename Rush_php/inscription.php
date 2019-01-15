<?php

extract($_POST);

if(strlen($username)<3 && $username != null)
{
    echo "Le nom doit contenir entre 3 et 10 caractères.\n";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)  && $email != null)
{
    echo "Format de l'adresse email non valide.\n";
}
if ($password != $password_confirmation && $password != null)
{
    echo "Confirmation du mot de passe incorrecte.\n";
}
if (strlen($password)<3 && $password != null)
{
    echo "Format du mot de passe non valide.\n";
}
if (strlen($username)>3 && filter_var($email, FILTER_VALIDATE_EMAIL) && $password == $password_confirmation)
{
    try{

        // var_dump($_POST);
        // die();
    $dsn = "mysql:host=localhost;dbname=pool_php_rush;port=3306";

    $bdd = new PDO($dsn, "root", "root");

    $hashpswd = password_hash($password, PASSWORD_DEFAULT);
    
    $sql2 = 'SELECT username, email 
    FROM users 
    ';
        
    $stmt = $bdd ->prepare($sql2);
    $stmt -> execute();
    $result = $stmt->fetch();
        

    if ($result["username"] == $username )
    {
        echo "<p style='text-align: center'>Nom d'utilisateur déjà utilisé.</p>";
    }

    elseif($result["email"] == $email)
    {
        echo "<p style='text-align: center'>Adresse mail déjà utilisée..</p>";
    }
    else 
    {
        $sql = "INSERT INTO users (username, password, email, admin)
        VALUES('".$username."','".$hashpswd."','".$email."', 0)";
        $bdd->query($sql);
        // var_dump($sql);
        // die();
        echo "<p style='text-align: center'>Votre compte a bien été crée. Bienvenue dans le Gucci Gang.</p>";
        echo "<p style='text-align: center'>Vous allez redirigé vers la page de connexion dans 5 secondes.</p>";
        echo '<meta http-equiv="refresh" content="5;login.php" />';

    }

    }
    
    catch(PDOException $e) 
    {
    $error =$e->getMessage();
    echo "Connection failed: " . $error; 
    file_put_contents(ERROR_LOG_FILE, "PDO ERROR: <$error> storage in <error_log_file>\n");
    }
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

    <title>Inscription</title>
  </head>
  <body>
      <title>Inscription</title>

    <div class="container">
  <div class="form-group">
  <form method=post>
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="gucci@gang.com" name="email">
    <small id="emailHelp" class="form-text text-muted">Nous gardons vos données privées.</small>
    </div>
    <div class="form-group">
    <form method=post>
    <label for="Username">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="Username" aria-describedby="UsernameHelp" placeholder="Votre nom ici" name="username" minlength="3" maxlength="10">
    <small id="emailHelp" class="form-text text-muted">Entre 3 et 10 caractères.</small>
  </div>
  <div class="form-group">
  <form method=post>
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="password" minlength="3" maxlength="10">
    <small id="emailHelp" class="form-text text-muted">Entre 3 et 10 caractères.</small>

  </div>
  <div class="form-group">
  <form method=post>
    <label for="exampleInputPassword1">Confirmez votre mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="password_confirmation" minlength="3" maxlength="10">
    <small id="emailHelp" class="form-text text-muted">Entre 3 et 10 caractères.</small>

  </div>
  <form method=post>
  <button type="submit" class="btn btn-primary">Rentrer dans le Gucci Gang</button>

    
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html> 