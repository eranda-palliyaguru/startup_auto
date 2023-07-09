<?php
session_start();
include('connect.php');
$name = $_POST['name'];
$code = $_POST['code'];
$sell = $_POST['sell'];
$cost = $_POST['cost'];
$id =$_POST['id'];
$type =$_POST['type'];


$sql = "UPDATE product 
        SET sell=?,cost=?,name=?,code=?,type=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($sell,$cost,$name,$code,$type,$id));



header("location: product_view.php");


?>