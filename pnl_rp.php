<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
    <?php 
include_once("auth.php");
$r=$_SESSION['SESS_LAST_NAME'];

if($r =='Cashier'){

header("location:./../../../index.php");
}
if($r =='admin'){

include_once("sidebar.php");
}
?>




    <link rel="stylesheet" href="datepicker.css" type="text/css" media="all" />
    <script src="datepicker.js" type="text/javascript"></script>
    <script src="datepicker.ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $("#datepicker1").datepicker({
            dateFormat: 'yy/mm/dd'
        });
        $("#datepicker2").datepicker({
            dateFormat: 'yy/mm/dd'
        });

    });
    </script>




    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->


    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profit and Loss Report
                <small>Preview</small>
            </h1>

        </section>




        <form method="get">
            <center>



                <strong>

                    From :<input type="text" style="width:223px; padding:4px;" name="d1" id="datepicker" value=""
                        autocomplete="off" />
                    To:<input type="text" style="width:223px; padding:4px;" name="d2" id="datepickerd" value=""
                        autocomplete="off" />

                    <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;"
                        type="submit">
                        <i class="icon icon-search icon-large"></i> Search
                    </button>

                </strong>

                <br>

                <h4> Report from&nbsp;<i class=" text-primary "><?php echo $_GET['d1'] ?></i>&nbsp;to&nbsp;<i
                        class=" text-primary "><?php echo $_GET['d2'] ?> </i> </h4>

            </center>
        </form>



        <section class="content">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">GROSS PROFIT Report</h3>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Customer</th>
                                <th>Vehicle No</th>
                                <th>Date</th>
                                <th>amount</th>
                                <th>Profit</th>
                                <th>#</th>


                            </tr>

                        </thead>

                        <tbody>
                            <?php
                                   $d1=$_GET['d1'];
				                   $d2=$_GET['d2'];
			                       $gs_profit=0;
                                   $result = $db->prepare("SELECT * FROM sales WHERE  action='active' AND date BETWEEN '$d1' AND '$d2'  ");
				                   $result->bindParam(':userid', $date);
                                   $result->execute();
                                   for($i=0; $row = $result->fetch(); $i++){
				                   $id=$row['invoice_number'];
			                       ?>
                            <tr>
                                <td><?php echo $row['invoice_number'];?></td>
                                <td><?php echo $row['customer_name'];?></td>
                                <td><?php echo $row['vehicle_no'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td>Rs.<?php echo $row['amount'];?></td>
                                <td>Rs.<?php echo $row['profit'];?></td>
                                <td><a href="bill.php?id=<?php echo $id;?>"
                                        class="btn btn-primary btn-xs"><b>Print</b></a></td>



                                <?php $gs_profit+=$row['profit']; } ?>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    <center>
                        <h3>GROSS PROFIT Total Rs.<?php echo number_format( $gs_profit,2); ?></h3>
                    </center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.col -->





            <!-- Main content -->

            <!-- /.row -->

        </section>



        <section class="content">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Expenses Report</h3>
                </div>

                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>amount</th>
                                


                            </tr>

                        </thead>

                        <tbody>
                            <?php
                                   $d1=$_GET['d1'];
				                   $d2=$_GET['d2'];
			                       $ex_tot=0;
                                   $result = $db->prepare("SELECT * FROM expenses_records WHERE date BETWEEN '$d1' AND '$d2'  ");
				                   $result->bindParam(':userid', $date);
                                   $result->execute();
                                   for($i=0; $row = $result->fetch(); $i++){
				                   
			                       ?>
                            <tr>
                                <td><?php echo $row['sn'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['comment'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td>Rs.<?php echo $row['amount'];?></td>
                                
                                <?php $ex_tot+=$row['amount']; } ?>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    <center>
                        <h3>Expenses Total Rs.<?php echo number_format( $ex_tot,2); ?></h3>
                    </center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.col -->





            <!-- Main content -->

            <!-- /.row -->

        </section>
        <!-- /.content -->


        <section class="content">

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">GROSS PROFIT Report</h3>
    </div>

    <div class="box-body">
        <table style="width:40%; font-size:20px" class="table table-bordered table-striped">

            <tbody>
                <tr>
                    <td>GROSS PROFIT</td>
                    <td style="text-align:end;">Rs.<?php echo number_format($gs_profit,2); ?></td>
                </tr>
                <tr>
                    <td>Expenses</td>
                    <td style="text-align:end;">Rs.<?php echo number_format($ex_tot,2); ?></td>
                </tr>

                <tr>
                    <td>NET Profit</td>
                    <td style="text-align:end;">Rs.<?php echo number_format($gs_profit-$ex_tot,2); ?></td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- /.col -->





<!-- Main content -->

<!-- /.row -->

</section>
<!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
  include("dounbr.php");
?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });


    $('#datepicker').datepicker({
        autoclose: true,
        datepicker: true,
        format: 'yyyy-mm-dd '
    });
    $('#datepicker').datepicker({
        autoclose: true
    });



    $('#datepickerd').datepicker({
        autoclose: true,
        datepicker: true,
        format: 'yyyy-mm-dd '
    });
    $('#datepickerd').datepicker({
        autoclose: true
    });
    </script>
</body>

</html>