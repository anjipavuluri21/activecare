<?php

include 'connection.php';
$response=[];
if ($_POST['email']!=''){
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $mobile2 = $_POST['mobile2'];
    $group_type = $_POST['group_type'];
    $group_no = $_POST['group_no'];
    $title = $_POST['title'];
    $country = $_POST['country'];
    $region = $_POST['region'];
   
    
$outputString = preg_replace('/[^0-9]/', '', $group_type);  

    $loginquery = "INSERT INTO activecare_complete_purchase_order(first_name,family_name,email,mobile,interenational_number,group_type,group_number,price,title,country,region) 
                values('$fname','$sname','$email','$mobile2','$mobile','$group_type','$group_no','$outputString','$title','$country','$region')";

    $result = mysqli_query($conn, $loginquery);
//    $lastid = mysqli_insert_id($conn);
//    print_r($lastid);exit;
    if ($result === TRUE) {
        $response = ['code'=>200];
//        header("location: index.php");
    } else {
        $response = ['code'=>203];
//        echo "Error: " . $loginquery . "<br>" . $conn->error;
    }
}
else{
    $response = ['code'=>204];
}
echo json_encode($response);
?>