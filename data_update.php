<?php 
include('connect.php');

$result = $db->prepare("SELECT * FROM customer ");
$result->bindParam(':userid', $date);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
    $name=$row['customer_name'];
    $id=$row['id'];


echo $name." <br>";

    $sql = "UPDATE vehicle 
        SET customer_name=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($name,$id));
}