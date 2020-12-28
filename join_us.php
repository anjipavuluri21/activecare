<?php

include 'connection.php';
$response = [];
if ($_POST['email'] != '') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $mobile = $_POST['mobile'];
    $file = $_FILES['cv_file']['name'];


    $loginquery = "INSERT INTO activecare_newrequests(first_name,last_name,position,email,country_code,mobile,file) 
                values('$fname','$lname','$position','$email','$country_code','$mobile','$file')";
    $result = mysqli_query($conn, $loginquery);
    $lastinsertid = mysqli_insert_id($conn);
//                print_r($lastinsertid);exit;

    if ($file != "") {
        $name1 = pathinfo($_FILES['cv_file']['name'], PATHINFO_FILENAME);
        $extension1 = pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION);
        $ext = strtolower(pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION));
        $newfilename = $name1."_" . round(microtime(true));
        if (($ext == "txt") || ($ext == "pdf") || ($ext == "docx")) {
            $basename1 = $newfilename . '.' . $extension1;
            $blocation1 = "uploads/resumes/" . $basename1;
            $target_file1 = "uploads/resumes/" . $basename1;
            if (move_uploaded_file($_FILES['cv_file']['tmp_name'], $target_file1)) {

                $login_query = "UPDATE activecare_newrequests SET file='$basename1' WHERE id=$lastinsertid";
                $results = mysqli_query($conn, $login_query);
//                print_r($results);exit;            }
            }
        }else{
            echo "File type not allowed";
        }
        //$target_file1;exit;
        if ($result === TRUE) {
            $response = ['code' => 200];
//        header("location: index.php");
        } else {
            $response = ['code' => 203];
            echo "Error: " . $loginquery . "<br>" . $conn->error;
        }
    }
} else {
    $response = ['code' => 204];
}
echo json_encode($response);
?>