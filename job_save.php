<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
$vehicle_id = $_POST['cus'];

	$result = $db->prepare("SELECT * FROM vehicle WHERE id = '$vehicle_id' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $vehicle = $row['vehicle_no'];
			$customer_id=$row['customer_id'];
		}

	$result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle' and type='active' and category='' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_id = $row['id'];
		}

if($job_id>1){
?>	
	
<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<?php $sec=1;?>
<meta http-equiv="refresh" content="<?php echo $sec;?>;URL='job_add.php'">	
<body class="hold-transition skin-red sidebar-mini layout-top-nav">
	
<center>
	<br>
	
					  

<br><br><br>
 <div class="col-md-12">
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                It's Already save
              </div> </div>
	
	
	</center>
	</body>
</html>
<?php	
}else{




$job_type = $_POST['type'];
$km = $_POST['km'];
$note1 = $_POST['note'];
$product1 = "";
	
$toolkit = 0;
$carpet = 0;
$piuot_arm_cover = 0;
$piuot_arm_cover_r = 0;
$helmet = 0;	
	
	
$type="active";
$time= date("H.i");
$date= date("Y-m-d");

$note= str_replace(".","<br>",$note1); 
$product= str_replace(".","<br>",$product1);

$date=date("Y-m-d");
			 
 $result = $db->prepare("SELECT * FROM job WHERE date='$date' ORDER by id ASC limit 0,1");
 $result->bindParam(':userid', $date);
 $result->execute();
 for($i=0; $row = $result->fetch(); $i++){
	$jid=$row['id'];
}

 $result = $db->prepare("SELECT COUNT(id) FROM job WHERE date='$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$jid=$row['COUNT(id)'];
				}
$nba=1;
	
$sql = "INSERT INTO job (vehicle_no,km,note,type,date,time,product_note,job_type,job_no,cus_id,vehicle_id) VALUES (:ve,:km,:note,:type,:date,:time,:pro,:j_type,:job_no,:cus_id,:vehicle_id)";
$q = $db->prepare($sql);
$q->execute(array(':ve'=>$vehicle,':km'=>$km,':note'=>$note,':type'=>$type,':date'=>$date,':time'=>$time,':pro'=>$product,':j_type'=>$job_type,':job_no'=>$nba,':cus_id'=>$customer_id,':vehicle_id'=>$vehicle_id));

//echo $customer_id;



 header("location: index.php"); 
	
	
}



?>