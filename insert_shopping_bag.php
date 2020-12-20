<?php

include 'connection.php';
$productid = $_POST['id'];


if (isset($_SESSION['userdata'])){
    $userid = $_SESSION['userdata']['id'];
    $guestid = 0;

    
}else{
    $userid = 0; //guest user
    $guestid = session_id();

}
    
$query = "INSERT INTO activecare_cart(prodid,userid,status,guest_id) 
                values('$productid','$userid',1,'$guestid')";
    $result = mysqli_query($conn, $query);
    if ($result == TRUE) {
        $_SESSION['guest_id'] = $guestid;
        echo true;
        exit;
    } else {
        echo false;
    }


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

