<!DOCTYPE html>
<html lang="en">

<head>
<?php include('hed.php'); ?>
</head>

<body>

<?php include('preload.php'); ?>

<br><br>
<h2 style="margin:10px">CUSTOMERS</h2>
<br><br>
<center>
        
            <form action="" method="get">
                <input type="text" name="number" class="model-box v-3" placeholder="Vehicle NO" > 
                <input class="model-box" type="submit" value="Filter">
            </form>
    </center>
    <br>
    <?php include("../connect.php");
    if(!$_GET["number"]){ $result = $db->prepare("SELECT *  FROM product ");}else{ $number=$_GET["number"];
        $result = $db->prepare("SELECT *  FROM product WHERE name LIKE '$number%'");
    }
    
    $result->bindParam(':userid', $date);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
    ?>
    <div
        style="border-radius: 15px; background: linear-gradient(to left,#0E1020,#181929); color:aliceblue;  margin: 55px 10px 10px 10px; ">


        

        <p style="font-size: 20px; color:#B8B8B8; margin:5px;"><?php echo $row['name'] ?></p>
        <p align="right" style="margin: -5px 5px 5px">Rs<?php echo $row['sell'] ?></p>
        <p style="margin: -5px 5px 5px"><?php echo $row['type'] ?></p>

        <table width="100%">
            <tr>
                
                <td>

                    
                </td>
                
            </tr>
        </table>

       
        
        
    </div>
    <?php } ?>

    <br><br><br><br>
    <nav class="nav">
        <div class="nav-item" id="index.php">
            <i class="material-icons home-icon  menu-icon">
                home
            </i>
            <span class="nav-text">Home</span>
        </div>
        <div class="nav-item " id="customer.php">
            <i class="material-icons person-icon menu-icon">
                person
            </i>
            <span class="nav-text">Customer</span>
        </div>
        <div class="nav-item " id="report.php">
            <i class="ion-stats-bars menu-icon"></i>
            <span class="nav-text">Reports</span>
        </div>
        <div class="nav-item active" id="product.php">
            <i class="material-icons search-icon menu-icon">
                search
            </i>
            <span class="nav-text">Product</span>
        </div>
        
    </nav>
</body>
<script src="js/nav.js"></script>

</html>