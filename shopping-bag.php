<?php 
    include 'includes/products_header.php';
    include 'connection.php';

if (isset($_SESSION['userdata'])){
    $userid = $_SESSION['userdata']['id'];
    $guestid=0;
    
}else{
    $userid=0;
    $guestid = session_id();
}

    $cart_query="SELECT * FROM activecare_products RIGHT JOIN activecare_cart on activecare_products.id=activecare_cart.prodid WHERE userid='".$userid."' and guest_id='".$guestid."'";
    $result=mysqli_query($conn,$cart_query);

    $stats_query="SELECT count(*) as product_count, sum(price) as total_price FROM activecare_products RIGHT JOIN activecare_cart on activecare_products.id=activecare_cart.prodid WHERE userid='".$userid."' and guest_id='".$guestid."'";
     $stats=mysqli_query($conn,$stats_query);
$stats_result= mysqli_fetch_assoc($stats);

$cart_count=$stats_result['product_count'];
$cart_total=$stats_result['total_price'];


?>

<div class="banner-area" id="home-link">&nbsp;</div>
	<div class="mid-area">
	<div class="container">
		<h5>سلة التسوق</h5>
		
		<div class="row justify-content-between">
			<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4 mb-sm-4 mb-md-0">
				
				<?php 
                    while($row = mysqli_fetch_assoc($result)) {     ?> 
				<div class="shopping-bag-wrap">
					<div class="row align-items-center">
						<div class="col-8 col-sm-8 col-md-10">
							<div class="shopping-bag-block">
								<p><strong><?php echo $row['title'];?></strong></p>
								<p>KWD <?php echo $row['price'];?></p>
							</div>
						</div>
                                            <div class="col-4 col-sm-4 col-md-2"><img src="uploads/products/<?php echo $row['thumimage1'];?>" class="img-fluid"></div>
					</div>
				</div>
                            <?php }
                    ?>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 col-lg-3">
				<div class="shopping-bag-right">
					<div class="row justify-content-between">
						<div class="col-auto"><strong>طلباتي</strong></div>
						<div class="col-auto"><span class="bag-right-items"><?php echo $cart_count; ?> Items</span></div>
					</div>
					<hr>
					<center><small>You Pay</small><br><strong>KWD <?php echo $cart_total;?></strong></center>
					<hr>
					<a class="btn btn-dark btn-block btn-lg"  role="button" id="pay_with_cod_btn">مواصلة عملية الشراء  ( COD ) </a>
				</div>
			</div>
		</div>
		
		
		
	</div>	
</div>



<?php include 'includes/footer.php';?>
<script>
     var delay = 2000; 
     var userid="<?php echo isset($_SESSION['userdata']['id'])?$_SESSION['userdata']['id']:"";?>";
    $('#pay_with_cod_btn').click(function(){
//        alert();
        if(userid==''){
            alert('Please login before placing the order');
            var url = 'index.php'
            setTimeout(function(){ window.location = url; }, delay);
            return false;

        }
       $.ajax({
            type:'POST',
            url:"place_order.php",
            async: true,
            data:{"payment_type":"COD"},
            success:function(response){
//                console.log(response);
            alert('Order placed Sucessfully');
           
        var url = 'orders.php';
        setTimeout(function(){ window.location = url; }, delay);
//       window.location.replace('orders.php');
            },
            
        });
        
    });
    

</script>