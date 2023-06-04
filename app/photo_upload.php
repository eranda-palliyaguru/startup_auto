<?php 
include("../connect.php");

$job_no='1';


if(isset($_FILES['webcam']["tmp_name"])){
    $tmp_name=$_FILES['webcam']["tmp_name"];
    $image_name=date('YmdHis').'.jpeg';
    move_uploaded_file($tmp_name,'job_img/'.$image_name);

$date=date('Y-m-d');
$time=date('H:i:s');

$sql = "INSERT INTO job_img (name,job_no,date,time) VALUES (?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($image_name, $job_no, $date, $time));
}

?>