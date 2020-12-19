<?php

include 'connection.php';
    $response=[];
 if ($_POST['email']!=''){
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $mobile2 = $_POST['mobile2'];
    $program_type = $_POST['program_type'];
    $program_no = $_POST['program_no'];


    $loginquery = "INSERT INTO activecare_e_book_request(first_name,surname,email,mobile,interenational_number,program_type,program_no) 
                values('$fname','$sname','$email','$mobile2','$mobile','$program_type','$program_no')";
    $result = mysqli_query($conn, $loginquery);

    if ($result === TRUE) {
                    $response = ['code'=>200];

    } 
    else {
        $response = ['code'=>203];
    }
}
else{
     $response = ['code'=>204];
    
}

echo json_encode($response);
?>