<?php
include './connection.php';
// print_r($_SESSION['userdata']['username']);exit;
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
<link href="css/custom.css" rel="stylesheet" type="text/css">
	

	
</head>

<body>
	

<div class="header-area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-5 col-md-3"><a href="index.php"><img src="images/active-care-logo.svg" class="img-fluid"></a></div>
			<div class="col-7 col-md-9">
				<div class="row align-items-center justify-content-end">
                                    <?php 
                                        if(isset($_SESSION['userdata'])){ ?>
                                            <div class="col-auto">
						<div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button" id="drop-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['userdata']['username']) ;?></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop-user">
								<a class="dropdown-item" href="orders.php">طلباتي</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="profile.php">تعديل حسابي</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
							</div>
						</div>
					</div>
                                            
                                            
                                        <?php }
                                        
                                    
                                    ?>
					
					<div class="col-auto">
						<a href="shopping-bag.php"> 
							<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-bag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
							</svg>
						</a>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>