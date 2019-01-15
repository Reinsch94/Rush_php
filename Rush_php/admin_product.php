<?php

include_once("admin_users.php");

class Product
{
private $bdd;

    public function __construct()
    {
        $this->bdd = connect_db("localhost","root", "root", 3306, "pool_php_rush");
			
    }


    public function getProduct()
	{
        $sql = "SELECT * FROM products;";
        $res = $this->bdd->query($sql);
        $res = $res->fetchall();
        return $res;
    }

    public function deleteProduct($id)
    {
        $sql="DELETE FROM products WHERE id= :id";
        $del = $this->bdd->prepare($sql); 
        $del->bindParam(":id",$id);
        $test=$del->execute();
        return $test;
    }


    public function AddProduct($name,$price,$category_id)
    {   
        $sql="INSERT INTO products(name,price,category_id) VALUES(:name,:price,:category_id)";
        $add=$this->bdd->prepare($sql);
        $add->bindParam(":name",$name);
        $add->bindParam(":price",$price);
        $add->bindParam(":category_id",$category_id);
        $test=$add->execute();
    }

    public function editProduct($id,$name,$price,$category_id)
    {
        $sql = "UPDATE products
                SET name= :name, price= :price ,category_id= :category_id
                WHERE id= :id";

        $edit=$this->bdd->prepare($sql);
        $edit->bindParam(":name",$name);
        $edit->bindParam(":price",$price);
        $edit->bindParam(":category_id",$category_id);
        $edit->bindParam(":id",$id);
        $test=$edit->execute();
    }

    public function ProduitCat($category_id)
    {
        $sql= "SELECT *
        FROM products
        WHERE category_id= :category_id";
        $prod=$this->bdd->prepare($sql);
        $prod->bindParam(":category_id",$category_id);
        $prod->execute();
        $prod=$prod->fetchall();
        return $prod;



    }


}

?>