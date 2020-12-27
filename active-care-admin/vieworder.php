<?php
require_once('auth.php');
include "header.php";
$id = $_REQUEST['id'];
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Order Details</h3>
            </div>             
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order Details </h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?php
$banner_que = "SELECT * from activecare_orders where status IN (2,3) AND orderid='$id'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$menbanner_res = $stmt1->fetch(PDO::FETCH_ASSOC);
$customerdata = getCustomerdata($menbanner_res['customerid']);
$customertype = $customerdata['customertype'];
?>
                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12 invoice-header">
                                    <h1>
                                        <i class="fa fa-globe"></i> Order ID: <?php echo $id ?>
                                        <small class="pull-right">Order Date: <?php echo $menbanner_res['paymentdate']; ?></small>
                                    </h1>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>                               
                                                <th>Sr.No</th>
                                                <th>Product Name</th>

                                                <th>Price</th>        
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$i = 1;
$totamt = 0;
$prod_que = "SELECT * from activecare_orders where status IN (2,3) AND orderid='$id'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($prod_que);
$stmt1->execute();
$prod_res = $stmt1->fetchAll(PDO::FETCH_ASSOC);
foreach ($prod_res as $prod_result) {
    $amt = $prod_result['product_price'];
    $totamt += $amt;
    $grandtotal = $totamt;
    ?>
                                                <tr>                               
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $prod_result['prodname']; ?></td>

                                                    <td><?php echo number_format($prod_result['product_price'], 3); ?> KWD</td>
                                                </tr>
    <?php $i++;
} ?>  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->  
                            <div class="row">

                                <div class="col-xs-4" style="margin-left: 45%;">
                                    <table class="table">
                                        <tbody>                        
                                            <tr>
                                                                                              

                                                <th>Grand Total:</th>
                                                <td><?php echo number_format($grandtotal, 3); ?> KWD</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  <!--<p class="lead">Total Amount</p>-->
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- this row will not appear when printing
                            <div class="row no-print">
                              <div class="col-xs-12">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                              </div>
                            </div> -->					 
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include "footer.php" ?>
