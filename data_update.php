<?php 
include('connect.php');

$result = $db->prepare("SELECT * FROM product ");
$result->bindParam(':userid', $date);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
  
    $pro_id=$row['product_id'];
    $id=$row['product_systemid'];




    $sql = "UPDATE use_product
        SET main_product=?
		WHERE system_id=?";
$q = $db->prepare($sql);
$q->execute(array($pro_id,$id));
}