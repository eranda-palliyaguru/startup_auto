<?php 
include('connect.php');

$result = $db->prepare("SELECT * FROM sales_list ");
$result->bindParam(':userid', $date);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
    $name=$row['profit'];
    $id=$row['invoice_no'];


echo $name." <br>";

    $sql = "UPDATE sales
        SET profit=profit+?
		WHERE invoice_number=?";
$q = $db->prepare($sql);
$q->execute(array($name,$id));
}