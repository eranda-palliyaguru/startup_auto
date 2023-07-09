
<table width='100%' class='table' >
<?php  include('connect.php');

$mat=$_GET['mat'];
$qty=$_GET['qty'];
if(isset($_GET['pro_id'])){$pro_id=$_GET['pro_id'];}else{$pro_id=0;}

$result = $db->prepare("SELECT * FROM product WHERE product_id='$mat'");
$result->bindParam(':userid', $res);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){ $mat_name=$row['name']; }

$sql = "INSERT INTO use_product (product_name,qty,product_id,main_product ) VALUES (?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($mat_name,$qty,$mat,$pro_id));


$result = $db->prepare("SELECT * FROM use_product WHERE main_product ='$pro_id' ");
$result->bindParam(':userid', $res);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>


    <tr >
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><b class="btn btn-danger dllpack" id="<?php echo $row['id']; ?>"
                                                            onclick="dll(<?php echo $row['id']; ?>)"><i
                                                                class="icon-trash">x</i></b></td>
    </tr>

<?php } ?>
</table>