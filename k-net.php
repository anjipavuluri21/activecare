<?php
include 'connection.php';
//$id = $_REQUEST['$lastid'];
 if (isset($_SESSION['userdata'])) {
    $cust_name = $_SESSION['userdata']['username'];
    $cust_mobile = $_SESSION['userdata']['mobile'];
    $cust_email = $_SESSION['userdata']['email'];
    $orderid = "active_care_" . uniqid();
    $currencycode = "KWD";
   
        $cart_query = "SELECT * FROM activecare_products RIGHT JOIN activecare_cart on activecare_products.id=activecare_cart.prodid WHERE userid=" . $_SESSION['userdata']['id'];
        $result = mysqli_query($conn, $cart_query);
//        print_r(mysqli_fetch_assoc($result));exit;
        if (!mysqli_query($conn, $cart_query)) {
            echo("Error description: " . mysqli_error($conn));
            die();
        }
        
        $cart_query = "SELECT * FROM activecare_complete_purchase_order where ";
        $result = mysqli_query($conn, $cart_query);
//        print_r(mysqli_fetch_assoc($result));exit;
        if (!mysqli_query($conn, $cart_query)) {
            echo("Error description: " . mysqli_error($conn));
            die();
        }

        $stats_query = "SELECT count(*) as product_count, sum(price) as total_price FROM activecare_products RIGHT JOIN activecare_cart on activecare_products.id=activecare_cart.prodid WHERE userid=" . $_SESSION['userdata']['id'];
        $stats = mysqli_query($conn, $stats_query);
        $stats_result = mysqli_fetch_assoc($stats);

        $cart_count = $stats_result['product_count'];
        $grandtotal = $stats_result['total_price'];
        while( $row= mysqli_fetch_assoc($result)){
           
//                    print_r($row);exit;

            $insert_query="INSERT INTO activecare_orders (orderid,cartid,customerid,prodid,prodname,product_price,status) values('".$orderid."','".$row['id']."','".$_SESSION['userdata']['id']."','".$row['prodid']."','".$row['title']."','".$row['price']."','".$row['status']."')";
            $results = mysqli_query($conn, $insert_query);
           
        }
    }else{
        header("Location: index.php");exit;
    }
$curl = curl_init();
$newdatarray = array(
    'amount' => $grandtotal,
    'currency' => $currencycode,
    'threeDSecure' => true,
    'save_card' => false,
    'description' => 'Test Description',
    'statement_descriptor' => 'Sample',
    'metadata' =>
    array(
        'udf1' => 'test 1',
        'udf2' => 'test 2',
    ),
    'reference' =>
    array(
        'transaction' => $orderid,
        'order' => $orderid,
    ),
    'receipt' =>
    array(
        'email' => false,
        'sms' => true,
    ),
    'customer' =>
    array(
        'first_name' => $cust_name,
        'middle_name' => $cust_name,
        'last_name' => $cust_name,
        'email' => $cust_email,
        'phone' =>
        array(
            'country_code' => '965',
            'number' => $cust_mobile,
        ),
    ),
    'merchant' =>
    array(
        'id' => '',
    ),
    'source' =>
    array(
        'id' => 'src_kw.knet',
    ),
    'post' =>
    array(
        'url' => 'http://activecare.online/order-confirmation.php',
    ),
    'redirect' =>
    array(
        'url' => 'http://activecare.online/order-confirmation.php',
    ),
);
$jsondata = str_replace(array('[', ']'), '', htmlspecialchars(json_encode($newdatarray), ENT_NOQUOTES));

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.tap.company/v2/charges",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $jsondata,
    CURLOPT_HTTPHEADER => array(
        "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response=json_decode($response);
//print_r($response);exit;
//var_dump($response->transaction->url);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $url=$response->transaction->url;
    header("location: $url");
}




exit;


    $jsondata = str_replace(array('[', ']'), '', htmlspecialchars(json_encode($newdatarray), ENT_NOQUOTES));
//    print_r($jsondata);
//    exit;
 
