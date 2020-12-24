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
<link rel="mask-icon" href="images/fevicon/safari-pinned-tab.svg" color="#5bbad5">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">	
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">	
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/ubislider.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
	

	
</head>
<?php
include 'includes/products_header.php';
include 'connection.php';
$id = $_REQUEST['id'];

$data = "SELECT * FROM activecare_products WHERE id=" . $id;
$result = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($result);
?>
<body>

	
<div class="banner-area" id="home-link">&nbsp;</div>
	

<div class="mid-area">
	<div class="container">
		<div class="row">
			 <div class="col-12 col-sm-12 col-md-6">
                <h4 class="mb-5"><?php echo $row['title']; ?></h4>				
                <h5 class="mb-5 text-danger"><?php echo $row['price']; ?></h5>

                <p class="mb-5"><?php echo $row['content']; ?></p>

                <div class="row justify-content-end">
                    <div class="col-auto"><button class="btn btn-dark btn-lg btn-block"  role="button" id="buy_it_now_btn">??? ??? ?????</button></div>
                    <div class="col-auto"><a class="btn btn-danger btn-lg btn-block disabled"  role="button" id="shoping_bag_btn" readonly>???? ????</a></div>
                </div>
            </div>
			 <div class="col-12 col-sm-12 col-md-6">
				<div class="ubislider-image-container" data-ubislider="#slider4" id="imageSlider4"></div>
				<div id="slider4" class="ubislider">
					<a class="arrow prev"></a>
					<a class="arrow next"></a>
					<ul id="gal1" class="ubislider-inner">
						<li><a><img class="product-v-img" src="uploads/products/<?php echo $row['thumimage1']; ?>"></a></li>
						<!--<li><a><img class="product-v-img" src="uploads/products/<?php echo $row['thumimage1']; ?>"></a></li>-->
					</ul>
				</div>
			</div>
			
		</div>
	</div>	
</div>

	

	

	

	
<?php include 'includes/footer.php'; 
?>
  <!--  Product gallery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/elevatezoom/3.0.8/jqueryElevateZoom.js"></script>	
<script src="js/ubislider.min.js?v=1.0.0.1"></script>
<script>
	$('#slider4').ubislider({
		arrowsToggle: true,
		type: 'ecommerce',
		hideArrows: true,
		autoSlideOnLastClick: true,
		modalOnClick: false,
		onTopImageChange: function(){
			$('#imageSlider4 img').elevateZoom();
		}
	}); 
</script>

<!--  Product gallery -->	


<script>
    
    $('#buy_it_now_btn').click(function(){
//        alert();
        
       $.ajax({
            type:'POST',
            url:"insert_shopping_bag.php",
            data:{id:<?php echo $id;?>},
            success:function(response){
       window.location.replace('shopping-bag.php');
            },
            
        });
        
    });
    

</script>	
</body>
</html>