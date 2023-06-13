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
    <h2 style="margin:15px">QUICK PRODUCT</h2>
    <br>

    <center>
        <img src="img/quick product.svg" width="80%">


        <br><br><br>

        <form action="../save_product.php" method="post">

            <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <input class="model-box color-purple" type="text" name="name" 
                        placeholder="Name" autocomplete="off">
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <input class="model-box color-purple" type="text"  name="code" placeholder="Code"
                        autocomplete="off">
                </div>



                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <input class="model-box color-purple" type="text"  name="sell" placeholder="Sell Price"
                        autocomplete="off">
                </div>

               

              

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <select class="model-box select2" name="category" style="width: 80%;">

                        <option value="0" selected disabled>Category</option>
                        <?php
                            $result = $db->prepare("SELECT * FROM catogary_list ");
		                    $result->bindParam(':userid', $res);
		                    $result->execute();
		                    for($i=0; $row = $result->fetch(); $i++){
	                    ?>
                        <option value="<?php echo $row['id'];?>">
                            <?php echo $row['name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>





            </div>

            <input type="hidden" name="end" value="app">
            <input type="hidden" name="type" value="Quick">
            <input type="hidden" name="cost" value="0">
            <input type="hidden" name="invo" value="<?php echo $_GET['id']; ?>">
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
function ex_cus() {
    var phone = document.getElementById('phone').value;
    var data = 'ur';
    fetch("customer_data.php?phone=" + phone)
        .then((response) => response.json())
        .then((json) => fill(json));
}

function fill(json) {


    if (json.action == "true") {
        console.log("old customer");
        document.getElementById('name').value = json.name;
        document.getElementById('address').value = json.address;
        document.getElementById('email').value = json.email;
        document.getElementById('birthday').value = json.birthday;
        document.getElementById('cus_id').value = json.id;

        document.getElementById('name').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('email').disabled = true;
        document.getElementById('birthday').disabled = true;

    } else {
        console.log("new customer");
        document.getElementById('name').value = '';
        document.getElementById('address').value = '';
        document.getElementById('email').value = '';
        document.getElementById('birthday').value = "";
        document.getElementById('cus_id').value = "0";

        document.getElementById('name').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('email').disabled = false;
        document.getElementById('birthday').disabled = false;
    }
}


$(function() {
    //Initialize Select2 Elements
    $(".select2").select2();
});
</script>

</html>