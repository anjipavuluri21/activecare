<?php 
require_once('auth.php');
include "header.php";
$id = $_REQUEST['id'];

if(isset($_POST['submit']))
{		
	$orderstatus = $_POST['orderstatus'];		
	$login_query = "UPDATE activecare_cartproducts SET orderstatus='$orderstatus' WHERE orderid='$id'"; 
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($login_query);  
	$stmt1->execute();
	$res = $stmt1->rowCount();	
}
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
						$banner_que = "SELECT * from activecare_cartproducts where status IN (2,3) AND orderid='$id'";
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
                            <h2>
							  <i class="fa fa-globe"></i> Order ID: <?php echo $id ?>
						  </h2>
                        </div>
                        <!-- /.col -->
                      </div>

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>                               
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>        
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
							<?php
							$totamt =0;							
							$prod_que = "SELECT * from activecare_cartproducts where status IN (2,3) AND orderid='$id'";
							$database1 = new Database();
							$dbCon1 = $database1->getConnection();
							$stmt1 = $dbCon1->prepare($prod_que);  
							$stmt1->execute();	
							$prod_res = $stmt1->fetchAll(PDO::FETCH_ASSOC);
							foreach($prod_res as $prod_result)	
							{									
								$prodid = getProductData($prod_result['prodid']);
								$amt = $prod_result['quantity']*$prod_result['product_price'];	
								$totamt+=$amt;
								$grandtotal = $totamt+$menbanner_res['tax']+$menbanner_res['shipping'];	
							?>
                              <tr>                               
                                <td><?php echo $prodid['prodtitle']; ?></td>
								<td><?php echo getCategory($prodid['catid']); ?></td>
								<td><?php echo getCollectionsSubmenu($prodid['subcat']); ?></td>
								<td><?php echo $prod_result['quantity']; ?></td>
                                <td><?php echo $prod_result['product_price']; ?> <?php echo $prod_result['currencycode']; ?></td> 
                                <td><?php echo number_format($amt,3); ?> <?php echo $prod_result['currencycode']; ?></td>
                              </tr>
                            <?php } ?>  
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->  
					  
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
