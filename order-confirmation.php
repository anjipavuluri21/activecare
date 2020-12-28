<?php
include 'includes/products_header.php';

include 'connection.php';
if (isset($_SESSION['userdata'])) {
    $userid = $_SESSION['userdata']['id'];
    $charge_id = $_REQUEST['tap_id'];
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
    $response = json_decode($response);
//print_r($response);exit;
    $TransactionStatus = $response->status;
    $TransactionDate = $response->transaction->created;
    $OrderID = $response->reference->order;
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //echo $response;
    }

    if ($TransactionStatus == "CAPTURED ") {
        $trans_status = "Success";
        $cartprod_que = "UPDATE activecare_orders SET status=2, paystatus=2,  paymentdate=NOW() where status IN (1) AND orderid='$OrderID' AND customerid='" . $_SESSION['userdata']['id'] . "'";
        $delete_query = "DELETE FROM activecare_cart WHERE userid=" . $_SESSION['userdata']['id'];
        $result = mysqli_query($conn, $delete_query);
        if (!mysqli_query($conn, $delete_query)) {
            echo("Error description: " . mysqli_error($conn));
            die();
        }
        $emailid="anji.naga1@gmail.com";
        $fullname="Anji";
        $mail = new PHPMailer;
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "code8.ecom@gmail.com";
        $mail->Password = "code8@code8";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->From = "code8.ecom@gmail.com";
        $mail->FromName = "Code8 e-commerce website";
        $mail->addAddress($emailid, $fullname);
        $mail->isHTML(true);
        $mail->Subject = "ActiveCare e-commerce website - Order Confirmation";

        $mail->Body = '<html>
	<head>
	<meta charset="utf-8">
	<title>Code8</title>
	<style type="text/css">
		a:hover{color:#cc9933!important;}
	</style>
	</head>

	<body style="margin: 0px;padding: 0px">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="padding: 25px;background:#eee ">
				<table cellpadding="0" cellspacing="0" border="0" style="background: #ffffff">
					<tr>
						<td style="padding:10px 20px;"><div style="border-bottom:1px solid #d1b555;padding-bottom:15px "><img src="' . $urlpath . '/images/logo.png" alt="Code8" /></div></td>
					</tr>
					<tr>
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:20px;line-height: 25px;color: #000;border-collapse: collapse;padding: 15px;padding:10px 20px">Order Confirmed !</td>
					</tr>
					<tr>
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:15px;line-height: 25px;color: #000;border-collapse: collapse;padding:10px 20px">
							Dear
							<strong style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;line-height: 25px;color: #ac5e2a;border-collapse: collapse;">' . $fullname . ',</strong>

						</td>
					</tr>
					<tr>		
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:15px;line-height: 25px;color: #000;border-collapse: collapse;padding:10px 20px">
							Greetings from ActiveCare!!
						</td>
					</tr>
					<tr>		
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:15px;line-height: 25px;color: #000;border-collapse: collapse;padding:10px 20px">
							Thank you for shopping with us. We would like to let you know that Code8 has received your Order, and is preparing for the Shipment.
						</td>
					</tr>
					<tr>		
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:15px;line-height: 25px;color: #000;border-collapse: collapse;padding:10px 20px 10px 20px">
							Please find below the summary of your order <strong style="color:#ac5e2a;">' . $OrderID . '</strong>
						</td>
					</tr>
					<tr>		
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:15px;line-height: 25px;color: #000;border-collapse: collapse;padding:10px 20px 10px 20px;font-weight: bold">
							Order ID : <strong style="color:#ac5e2a;"> ' . $OrderID . '</strong> &nbsp; | &nbsp; Seller : <strong style="color:#ac5e2a;">Code8</strong><br />
							Item (S) Ordered :
						</td>
					</tr>
					<tr>		
						<td style="-moz-hyphens: none;-webkit-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;word-break: break-word;-webkit-hyphens: none;-ms-text-size-adjust: 100%;hyphens: none;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:14px;line-height:normal;color: #000;border-collapse: collapse;padding:10px 20px 10px 20px;">
							<table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr>
									<th align="left" style="border:1px solid #eee;padding:5px">Product Details</th>
									<th align="left" style="border:1px solid #eee;padding:5px">Ordered Date</th>											
									<th align="left" style="border:1px solid #eee;padding:5px">Price</th>
								</tr>';
        $orders_query = "SELECT * FROM activecare_products RIGHT JOIN activecare_orders on activecare_products.id=activecare_orders.prodid WHERE customerid='".$userid."' and activecare_orders.status=2 and orderid=".$OrderID;
        $result = mysqli_query($conn, $orders_query);
       $currencycode="KWD";
        $subtotal = 0;
        while($row = mysqli_fetch_assoc($result)) {  
           
            $subtotal += $row['title'];
            $grandtotal = $subtotal;
            $mail->Body .= '<tr>
							<td align="left" style="border:1px solid #eee;padding:5px">' . $row['title'] . '</td>
							<td align="left" style="border:1px solid #eee;padding:5px">' . date("M ,d  Y",strtotime($row['paymentdate'])) . '</td>										
							<td align="left" style="border:1px solid #eee;padding:5px">' . $row['price'] . ' KD</td>
						</tr>';
        }
        $mail->Body .= '<tr>
						
							<td colspan="4" align="right" style="border:1px solid #eee;padding:5px" ><strong>Total</strong></td>
							<td align="right" style="border:1px solid #eee;padding:5px"><strong>' . $grandtotal . ' ' . $currencycode . '</strong></td>
						</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</body>
	</html>';
        $mail->send();
    } else {
        $trans_status = "Fail or Pending";


        $cartprod_que = "UPDATE activecare_orders SET status=3, paystatus=3,  paymentdate=NOW() where status IN (1) AND orderid='$OrderID' AND customerid='" . $_SESSION['userdata']['id'] . "'";
    }
    mysqli_query($conn, $cartprod_que);
    ?>
    <div class="container clearfix">
        <div class="row" id="ele2">
            <div class="col-lg-12 col-md-12">
                <h1 class="text-center fullwidth" style="margin: 12px">Order <span>Confirmation</span></h1>
            </div>
            <div class="col-lg-6 col-md-6 mycart-column">
                <div class="my-cart-items address-summary gold-color-bg">
                    <h4>Address Summary</h4>
                    <div class="my-cart-items-sub">
                    </div>
                    <p>Order ID : <strong><?php echo $OrderID; ?></strong><br>
                        Transaction Id : <strong><?php echo $OrderID; ?></strong><br>
                        Date : <strong><?php echo $TransactionDate; ?></strong><br>
                        Transaction Status : <strong><?= $TransactionStatus ?></strong>
                    </p>
                    <div class="print-btn"><a href="javascript:void(0);" class="button no-print print-link">Print</a> <a href="products.php" class="button">Continue Shopping</a></div>

                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header("Location: index.php");
    exit;
}
?>
<?php include 'includes/footer.php'; ?>
