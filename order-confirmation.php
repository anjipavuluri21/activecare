<?php
    include 'includes/products_header.php';

include 'connection.php';
if (isset($_SESSION['userdata'])) {
$charge_id=$_REQUEST['tap_id'];
$curl = curl_init();
//echo "https://api.tap.company/v2/charges/$charge_id";exit;
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/charges/$charge_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response=json_decode($response);
//print_r($response);exit;
$TransactionStatus=$response->status;
$TransactionDate=$response->transaction->created;
$OrderID=$response->reference->order;
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}

if ($TransactionStatus == "CAPTURED ") {
$trans_status="Success";
    $cartprod_que = "UPDATE activecare_orders SET status=2, paystatus=2,  paymentdate=NOW() where status IN (1) AND orderid='$OrderID' AND customerid='" . $_SESSION['userdata']['id'] . "'";
}
else {
$trans_status="Fail or Pending";

    $cartprod_que = "UPDATE activecare_orders SET status=3, paystatus=3,  paymentdate=NOW() where status IN (1) AND orderid='$OrderID' AND customerid='" . $_SESSION['userdata']['id'] . "'";
}
mysqli_query($conn, $cartprod_que);
?>
<div class="container clearfix">
    <div class="row" id="ele2">
        <div class="col-lg-12 col-md-12">
            <h1 class="text-center fullwidth">Order <span>Confirmation</span></h1>
        </div>
        <div class="col-lg-6 col-md-6 mycart-column">
            <div class="my-cart-items address-summary gold-color-bg">
                <h4>Address Summary</h4>
                <div class="my-cart-items-sub">
                </div>
                <p>Order ID : <strong><?php echo $OrderID; ?></strong><br>
                    Transaction Id : <strong><?php echo $OrderID;?></strong><br>
                    Date : <strong><?php echo $TransactionDate; ?></strong><br>
                    Transaction Status : <strong><?=$TransactionStatus?></strong>
                </p>
                <div class="print-btn"><a href="javascript:void(0);" class="button no-print print-link">Print</a> <a href="products.php" class="button">Continue Shopping</a></div>

            </div>
        </div>
    </div>
</div>
<?php }

else{
        header("Location: index.php");exit;
    } ?>
