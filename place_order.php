<?php

include 'connection.php';
//$payment_type = $_POST['payment_type'];
$payment_type = 'cod';
$userid = $_SESSION['userdata']['id'];
$order_id = "active_care_" . uniqid();
//$_SESSION['cart_product_ids']=[];

$cart_query = "SELECT * FROM activecare_products RIGHT JOIN activecare_cart on activecare_products.id=activecare_cart.prodid WHERE userid=" . $_SESSION['userdata']['id'];
$cart_records = mysqli_query($conn, $cart_query);

while ($record = mysqli_fetch_assoc($cart_records)) {
        $query="INSERT INTO activecare_orders (`orderid`,`customerid`,`prodid`,`prodname`,`product_price`,`status`,`paystatus`,`paymentdate`,`payment_type`)
VALUES ('$order_id', '$userid', '".$record['prodid']."','".$record['title']."','".$record['price']."','2','2',date('Y-m-d H:i:s'),'0')";
    $result = mysqli_query($conn, $query);
if ( $result == true) {
    $sql = "DELETE FROM activecare_cart WHERE userid=$userid";

mysqli_query($conn, $sql);
        
} else {
  echo "Error: " . $result . "<br>" . $conn->error;exit;
}
}




