<?php

include 'connection.php';
$productid = $_POST['id'];
//$_SESSION['cart_product_ids']=[];
if (isset($_SESSION['userdata'])) {
    $userid = $_SESSION['userdata']['id'];




    $query = "INSERT INTO activecare_cart(prodid,userid,status) 
                values('$productid','$userid',1)";
    $result = mysqli_query($conn, $query);
    if ($result == TRUE) {
        echo true;
        exit;
    } else {
        echo false;
    }
}else{
    exit;
   if (!isset($_SESSION['items'])) {
  $_SESSION['items'] = array();
}

// Add items based on item ID
$_SESSION['items'][$productid] = array('productid' => $productid);

    $_SESSION['cart_products']=$productid;
    echo true;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

