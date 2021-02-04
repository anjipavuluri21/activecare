
<?php
include 'includes/products_header.php';
include 'includes/login_modal.php';
include 'connection.php';
$id = $_REQUEST['id'];
if($id==''){
        header("Location: index.php");

}

$data = "SELECT * FROM activecare_products WHERE id=" . $id;
$result = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($result);
?>
<body>

	
<div class="banner-area" id="home-link">&nbsp;</div>
<a class="btn btn-info" href="#" role="button" data-toggle="modal" id="login_anchor" data-target="#login-modal" style="display:none">تسجيل الدخول</a>


<div class="mid-area mid-area-bg">
	<div class="container">
		<div class="row">
			 <div class="col-12 col-sm-12 col-md-6">
                <h4 class="mb-5"><?php echo $row['title']; ?></h4>				
                <h5 class="mb-5 text-danger"><?php echo number_format($row['price'],3); ?></h5>

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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
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
   var delay = 1000; 
     var userid="<?php echo isset($_SESSION['userdata']['id'])?$_SESSION['userdata']['id']:"";?>";
    $('#buy_it_now_btn').click(function(){
        if(userid==''){
        $('#login-modal').modal('toggle');
        }else{
             $.ajax({
            type:'POST',
            url:"insert_shopping_bag.php",
            data:{id:<?php echo $id;?>},
            success:function(response){
       window.location.replace('shopping-bag.php');
            },
            
        });
        }
  });
    

</script>	
</body>
</html>