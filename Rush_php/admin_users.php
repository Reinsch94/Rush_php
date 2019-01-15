<?php
function connect_db($host, $username, $passwd, $port, $db)
{
    try
    {
        $bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $passwd);
        return $bdd;
    }
    catch (Exception $e)
    {
        echo "PDO ERROR: " . $e->getMessage() . " storage in " . ERROR_LOG_FILE . "\n";
        error_log($e->getMessage(), 3, ERROR_LOG_FILE);
    }
}


//$sql = "INSERT INTO users VALUES "

class User
{
	private $bdd;

    public function __construct()
    {
       
        	$this->bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
        //est-ce qu'on créé une option pour rendre un nouvel user admin ? sinon comment donner les droits d'admin sans rentrer dans le code
        //est-ce qu'on a besoin de mettre les droits admin par défaut ? 
    }

  	public function createUser($username, $email, $password)
    {  	
    	echo "Welcome " . $username . "!\n";

			$hashpsw = password_hash($password, PASSWORD_DEFAULT);

		    $sql = "INSERT INTO users(username, email, password)
		    VALUES('" . $username . "', '" . $email . "', '" . $hashpsw ."');";

		    $this->bdd->query($sql);		    

		    var_dump($sql);
    }

	public function editUser($id, $username, $email, $password)
	{
		echo ($email);
	  if ($password != "") {
		$hashpsw = password_hash($password, PASSWORD_DEFAULT);

		$sql = "UPDATE users
	    SET username='" . $username ."', email='" . $email .  "', password='" . $hashpsw . "'
	    WHERE id='" . $id ."' ;";

	  } else {
	  	$sql = "UPDATE users
	    SET username='" . $username ."', email='" . $email . "'
	    WHERE id='" . $id ."' ;";

	  }

	    $this->bdd->query($sql);

	    echo "Account edited!\n";  

	}
	  
	public function deleteUser($id)
	{
		echo "Hope to see you back one day :'(\n";   
        $sql = "DELETE FROM users
	    WHERE id= '" . $id ."' ;";
	    $this->bdd->query($sql);

	}

	public function getUser($id=NULL)
	{
		//echo "chiotte";
		$sql = "SELECT admin FROM users;";
    $dem = $this->bdd->query($sql);
  //  $nbrdata=$pdo_select->rowCount();
   // $res = $dem->fetchall();

    // var_dump($res);
		if ($id != NULL)
		{
	        $sql = "SELECT * FROM users
		    WHERE id= '" . $id ."' ;";

		    $res = $this->bdd->query($sql);
		    $res = $res->fetch();
		    return $res;  
	    }

	     else
	    {
	    	//echo"merde";
	    	$sql = "SELECT * FROM users;";

		    $res = $this->bdd->query($sql);
		    $res = $res->fetchall();
		    return $res; 
	    	//var_dump($res);
	    }
	}
}



