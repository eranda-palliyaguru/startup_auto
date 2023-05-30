<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('hed.php'); ?>
    <link rel="stylesheet" href="css/datepik.css">
    <link rel="stylesheet" href="css/datepik.css">
    <style>
    input {
        width: 80%;
    }

    .login-btn {
        border-radius: 30px;
        width: 40%;
        background: linear-gradient(27deg, rgba(190, 0, 0, 0.8), rgba(50, 0, 0, 0.6));
        /* color:#FF3636; */
        color: #ABABAB;
        margin-top: 50px;
        font-size: 17px;
        height: 40px;
    }
    </style>
</head>

<body>
    <?php include('preload.php'); include("../connect.php"); ?>
    <br><br>
    <a href="<?php echo $back; ?>"><i style="font-size:30px; color:#3A3939; margin:6%" class="ion-chevron-left"></i></a>
    <br><br>
    <h2 style="margin:15px">ADD NEW JOB</h2>
    <br>

    <center>
        <form action="../job_save.php" method="post">
            <div class="model-box" style="width: 350px;">
                <label> Vehicle</label>
                <select class="model-box select2 " name="cus" style="width: 80%;">
                    <?php 
			 $result = $db->prepare("SELECT * FROM vehicle ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['vehicle_no']; ?> (
                        <?php echo $row['manufacture']; ?>-<?php echo $row['model']; ?> ) </option>
                    <?php
				}
			?>
                </select>
            </div>
            <br>
            <div class="model-box" style="width: 350px;">
                <label> Mileage</label>
                <input type="number" class="model-box" name="km">
            </div>
            <br>

            <div class="model-box" style="width: 350px;">
                <label> Vehicle</label>
                <select class="model-box" name="type" style="width: 80%;">

                    <?php  $invo = $_GET['id'];
                  $result = $db->prepare("SELECT * FROM job_type WHERE action='' ORDER by order_no ASC ");
                 $result->bindParam(':userid', $res);
                 $result->execute();
                 for($i=0; $row = $result->fetch(); $i++){ ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
                    <?php	} ?>
                </select>
            </div>

            <br>
            <textarea name="note" class="model-box" placeholder="Note"
                style="width: 90%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            <br>
            <input type="submit" value="Save" class="login-btn">
            <input type="hidden" name="end" value="app">
        </form>
    </center>
</body>

</html>