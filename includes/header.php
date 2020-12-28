<?php
include 'connection.php';
//include 'login.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $mobile = $_POST['mobile'];
    $file = $_FILES['file'];
//print_r($file);exit;

    
                

    if ($_FILES["file"]["name"] != "") {
        $target_dir = "uploads/resumes/";
        $target_file = $target_dir . time().'_'.basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType == "pdf" || $imageFileType == "rtf") {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

                $query = "INSERT INTO activecare_newrequests(first_name,last_name,position,email,country_code,mobile,file) 
                values('$fname','$lname','$position','$email','$country_code','$mobile','$target_file')";
    $result = mysqli_query($conn, $query);
            }
        }
    }
    
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <title>ACTIVE CARE</title>
        <link rel="apple-touch-icon" sizes="180x180" href="images/fevicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/fevicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/fevicon/favicon-16x16.png">
        <link rel="manifest" href="images/fevicon/site.webmanifest">
        <link rel="mask-icon" href="images/fevicon/safari-pinned-tab.svg">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">	
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">	
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css">
        <link href="css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css">
        <link href="css/aos.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">



    </head>

    <body>

<?php
$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
define("BASE_URL", $url);
?>

        <div class="book-appoinment-button"><a href="tel:1800110"><img src="images/book-appoinment-button.svg" alt=""></a></div>

        <!-- LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">أدخل لحسابك</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body modal-body-popup">
                        <form method="post" id="login_form">
                            <div class="form-group">
                                <label for="login-email">البريد الإلكتروني</label>
                                <input type="email" name="email" required class="form-control" id="login-email" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <label for="login-password">كلمه السر</label>
                                <input type="password" name="password" class="form-control" id="login-password" placeholder="كلمه السر" required="Please Enter Password">
                            </div>
                            <div id="output">
                                
                                
                            </div>
                            <button type="submit" name="login" class="btn btn-primary" id="loginbutton">تسجيل الدخول</button>
                            <p>&nbsp;</p>
                            <hr>
                            <p>&nbsp;</p>					<p class="mb-0">لا يوجد لديك حساب؟</p>
                            <p class="mb-0"><strong><a href="#" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">أنشئ حسابك الآن</a></strong></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>	
        <!-- LOGIN -->

        <!-- SIGN UP -->
        <div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تسجيل حساب<br>والانضمام إلى مجتمعنا</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body modal-body-popup">
                        <form method="post" id="register_form">
                            <div class="form-group">
                                <label for="signup-fname" class="sr-only">الاسم الأول</label>
                                <input type="text"  name="fname" class="form-control" id="signup-fname" placeholder="الاسم الأول">
                            </div>
                            <div class="form-group">
                                <label for="signup-lname" class="sr-only">اسم العائلة</label>
                                <input type="text" name="sname" class="form-control" id="signup-lname" placeholder="اسم العائلة">
                            </div>
                            <div class="form-group">
                                <label for="signup-email" class="sr-only">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" id="signup-email" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <label for="signup-phone" class="sr-only">رقم الهاتف</label>
                                <input type="tel" name="phone" class="form-control" id="signup-phone" placeholder="رقم الهاتف">
                            </div>
                            <div class="form-group">
                                <label for="signup-password-a" class="sr-only">كلمه السر</label>
                                <input type="password" name="password" class="form-control" id="signup-password-a" placeholder="كلمه السر">
                            </div>
                            <div class="form-group">
                                <label for="signup-password-b" class="sr-only">تأكيد كلمة المرور</label>
                                <input type="password" name="confirmpwd" class="form-control" id="signup-password-b" placeholder="تأكيد كلمة المرور">
                            </div>
                            <div id="output">
                                
                                
                            </div>

                            <button type="submit" name="register" class="btn btn-primary" id="registerbutton">إنشاء حساب</button>
                            <p>&nbsp;</p>
                            <hr>
                            <p>&nbsp;</p>
                            <p class="mb-0">عميل سابق؟ <strong><a href="#" data-toggle="modal" data-target="#login-modal" data-dismiss="modal">سجل الدخول</a></strong></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>	
        <!-- SIGN UP -->


        <!-- JOIN US -->
        <div class="modal fade" id="joinus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content joinus-modal">
                    <div class="modal-header">
                        <h3 class="modal-title">Join Us</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body modal-body-popup text-left">
                        <form action="#" method="post" id="joinus_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="joinus-fname">First Name</label>
                                <input type="text" name="fname" class="form-control text-left" id="joinus-fname" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <label for="joinus-lname">Last Name</label>
                                <input type="text" name="lname" class="form-control text-left" id="joinus-lname" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="joinus-position">Position applying for</label>
                                <select class="form-control" name="position" id="joinus-position">
                                    <option>Please Select</option>
                                    <option>Admin Staff</option>
                                    <option>Physical Therapist</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="joinus-email">Email</label>
                                <input type="email" name="email" class="form-control text-left" id="joinus-email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <p class="mb-2">Contact Number</p>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="country-code" class="sr-only">Country Code</label>
                                        <input type="tel" name="country_code" class="form-control text-left" id="country-code" placeholder="Country Code">
                                    </div>
                                    <div class="form-group mx-sm-3">
                                        <label for="joinus-cn" class="sr-only">Contact Number</label>
                                        <input type="tel" name="mobile" class="form-control text-left" id="joinus-cn" placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="joinus-cv">Upload CV</label>
                                <input type="file" name="file" class="form-control-file" id="joinus-cv">
                            </div>

                            <button type="submit" name="submit" class="btn btn-info" id="joinusbutton">SUBMIT</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>	
        <!-- JOIN US -->



        <div class="header-area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php" data-scroll="home-link"><img src="images/active-care-logo.svg" class="img-fluid" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="about-link">قصتنا</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="services-link">خدماتنا</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="team-link">فريقنا</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="products-link">منتجاتنا</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="reviews-link">انجازاتنا</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!" data-scroll="contact-link">اتصل بنا</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="#">English</a></li>	-->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>















