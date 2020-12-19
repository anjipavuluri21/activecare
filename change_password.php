<?php 
include 'connection.php';
        
        if (isset($_POST['update'])) {
            $fname=$_POST['fname'];
            $fullname=$_POST['sname'];
            $email=$_POST['email'];
            $mobile=$_POST['phone'];
            $password=$_POST['password'];
            $confirmpwd=$_POST['confirmpwd'];
            
            $updatequery ="UPDATE activecare_customers SET first_name='$fname',fullname='$fullname',email='$email',mobile='$mobile',password='$password',confirm_password='$confirmpwd' WHERE id=".$_SESSION['userdata']['id'];
                $result=mysqli_query($conn,$updatequery);
                
                if($result === TRUE){
                     header("location: index.php");
                } else{
                       echo "Error: " . $updatequery . "<br>" . $conn->error;

                }
        }

?>