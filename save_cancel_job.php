<?php
session_start();
include('connect.php');
$id = $_POST['id'];
$note = $_POST['note'];


$a=$a1*$c;

// query
$sql = "UPDATE  job SET reason=? WHERE id=?";
$ql = $db->prepare($sql);
$ql->execute(array($note,$id));
if($_POST['end']=="app"){header("location: app/index.php");}else{
    header("location: index.php");
}

?>



