<?php
include 'connection.php';
    $responce=[];
if ($_POST['email']!='' && $_POST['password']!='') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginquery = "SELECT * from activecare_customers where email='$email' AND password='$password'";
    $result=mysqli_query($conn,$loginquery);
//    $row=mysqli_num_rows($result);
    
    if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
        $userarray=['email'=>$row['email'],
                    'id'=>$row['id'],
                    'mobile'=>$row['mobile'],
                    'username'=>$row['fullname'],
                    
                ];
            $_SESSION['userdata'] = $userarray;
             $responce = ['code'=>200];

    } else {
         $responce = ['code'=>203];
//           echo '<script type="text/javascript"> alert("invalid credntials!")</script>';
//        echo "invalid credntials!";
//                  header("location: index.php");
                
    }
}
else{
     $responce = ['code'=>204];
//    echo "Please enter valid data";
    
}
//print_r($responce);exit;S
echo json_encode($responce) ;
?>