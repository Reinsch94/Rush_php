<?php

include_once("admin_users.php");

Class Category
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
    }

    public function AddCategory($name, $parent_id)
	{

		$sql = "INSERT INTO categories(name,parent_id) VALUES ('".$name."','".$parent_id."');";

		$stmt = $this->bdd ->prepare($sql);
		$stmt -> execute();

		echo "Nouvelle catégorie " .$name. " crée !";

	}

	public function DeleteCategory($id)
	{
		$sql = "DELETE FROM categories
		WHERE id = :id";

		$stmt = $this->bdd ->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt -> execute();

		echo "Catégorie suprimée.";

	}

	public function EditCategory($id, $name, $parent_id)
	{

		$sql = "UPDATE categories
		SET name = :name, parent_id = :parent_id
		WHERE id = :id";

		$stmt = $this->bdd ->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":parent_id", $parent_id);
		$test=$stmt -> execute();
        
    }
    
    public function getCategory()
	{
		$sql = "SELECT * FROM categories;";
        $res = $this->bdd->query($sql);
        $res = $res->fetchall();
        return $res; 

	}

}

?>