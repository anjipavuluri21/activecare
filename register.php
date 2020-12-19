<?php 
    include 'connection.php';
        $response=[];
        if ($_POST['email']!='') {
            $fname=$_POST['fname'];
            $fullname=$_POST['sname'];
            $email=$_POST['email'];
            $mobile=$_POST['phone'];
            $password=$_POST['password'];
            
            $loginquery ="INSERT INTO activecare_customers(first_name,fullname,email,mobile,password) 
                values('$fname','$fullname','$email','$mobile','$password')";
                $result=mysqli_query($conn,$loginquery);
                
                if($result == TRUE){
//                     header("location: index.php");
                    $response = ['code'=>200];
                } else{
                    $response = ['code'=>203];
//                       echo "Error: " . $loginquery . "<br>" . $conn->error;
                }
        }
        else{
            $response = ['code'=>204];
        }
echo json_encode($response) ;

exit;
?>