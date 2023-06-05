<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('hed.php'); ?>
    
    <link rel="stylesheet" href="css/select2.app.css">
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
    <?php include("../connect.php"); ?>
    <br><br>
    <a href="index.php"><i style="font-size:30px; color:#3A3939; margin:6%" class="ion-chevron-left"></i></a>
    <br><br>
    <h2 style="margin:15px">NEW CUSTOMER</h2>
    <br>

    <center>
        <img src="img/new customer.svg" width="80%">


<br><br><br>

        <form action="../save_cus.php" method="post">

        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box color-purple" type="text" name="cus_name" placeholder="Customer Name">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box color-purple" type="text" name="phone_no" placeholder="Phone No">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box color-purple" type="text" name="email" placeholder="E-mail">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box color-purple" type="text" name="address" placeholder="Address">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box color-purple" type="text" name="birthday" placeholder="Birthday">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <input class="model-box" type="text" name="vehicle_no" placeholder="Vehicle No">
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                <select class="model-box select2" name="model" style="width: 80%;">

                <option value="0" selected disabled>Model</option>
                    <?php  $invo = $_GET['id'];
                $result = $db->prepare("SELECT * FROM model ");
                $result->bindParam(':userid', $res);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){ ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['manufacture_name'].' - '.$row['name']; ?></option>
                <?php	} ?>
                </select>
            </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <select name="fuel_type" class="model-box" style="width: 80%;">
                <option value="0" selected disabled>Fuel Type</option>
                <option value="Diesel">Diesel</option>
                <option value="Petrol">Petrol</option>
            </select>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        <select name="transmission" class="model-box" style="width: 80%;">
                <option value="0" selected disabled>Transmission</option>
                <option value="Manual">Manual</option>
                <option value="Auto">Auto</option>
            </select>
        </div>



        </div>
        
            <input type="hidden" name="end" value="app">
            <input type="submit" value="Save" class="login-btn">
            
        </form>
    </center>
    <br><br><br><br>
</body>
<!-- jQuery 2.2.3 -->
<script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Select2 -->
<script src="../../../plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="js/cam/webcam.min.js"></script>
<script>
$(function() {
    //Initialize Select2 Elements
    $(".select2").select2();
});
</script>

</html>