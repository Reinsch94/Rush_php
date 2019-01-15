<?php
try{
    $dsn = "mysql:host=127.0.0.1;dbname=pool_php_rush;port=3306";
    $conn = new PDO($dsn, "root", "root"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // echo "Connected successfully!\n";
    // return $conn; 
    
    if(isset($_POST['Inscription']))
    {
        header('location: inscription.php');
        exit();
    }

    if(!empty($_POST))
    {
        extract($_POST);

        //$email = htmlspecialchars($email);
        //$password = htmlspecialchars($password);

        $sql = "SELECT password, id, admin
                FROM users
                WHERE email = '$email'"; //modif caro

        $stmt = $conn->prepare($sql);
        //$stmt->bindParam(":login", $login);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($result);
        // echo $result->email;
        // die;

       
        if($result)
        {
            //var_dump($result);
            if(password_verify($password, $result->password)) 
            {
                 //var_dump($result);
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $username;
                $_SESSION["userid"] = $result->id; //modif caro 
                $_SESSION["admin"] = $result->admin; //modif caro (incertaine)
                $_SESSION["log"] = true;

                if (isset($_POST['remember_me']))
                {
                    setcookie('email',$_SESSION['email'],time()+36000);
                    setcookie('username' , $_SESSION['username'], time()+36000);
                    setcookie('admin', $_SESSION['admin'], time()+36000);
                }

                
                header('Location:index.php');
            }
                
            else
            {
                echo "Mot de passe incorrect.";
            }

        }       
        else
        {
            
            echo "Email ou mot de passe incorrect.\n";
        
        }
    } 
}


catch(PDOException $e) 
    {
    $error =$e->getMessage();
    echo "Connection failed: " . $error; 
    file_put_contents(ERROR_LOG_FILE, "PDO ERROR: <$error> storage in <error_log_file>\n");
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

    <title>Log in</title>
  </head>
  <body>
   
      <title>Log in</title>
    
    <div class="container">
  <div class="form-group">
  <form method=post>
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="your email address" name="email">
    </div>
    <div class="form-group">
    <form method=post>
    <label>Password</label>
    <input type="password" class="form-control" placeholder="your password here" name="password" minlength="3" maxlength="10">
  </div>
  Remember me:
  <input type="checkbox" name="remember_me"><br>
 
  <button type="submit" name="Submit" value="Connexion">Connexion</button>
  <br>
  <br>
  <br>

    Not yet a member from the Gucci gang ?
  <form method=post>
    <br>
  <button type="submit" class="btn btn-primary" name="Inscription" value="Register myself">Rentrer dans le Gucci Gang</button>
</div>
</form>
</form>
</form>
</div>
</form>
</div>
    
</form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
      </div>
          </div>

</html> 
