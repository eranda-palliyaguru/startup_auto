<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['code'];
$c = $_POST['type'];
$d = $_POST['sell'];
$e = $_POST['cost'];
$f = $_POST['re_order'];
$rack = $_POST['rack'];




// query
$sql = "INSERT INTO product (name,code,type,sell,cost,re_order,rack) VALUES (:a,:b,:c,:d,:e,:f,:rack)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':rack'=>$rack));
header("location: product_view.php");


?>