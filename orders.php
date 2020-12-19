<?php include 'includes/products_header.php';
    include 'connection.php';

if(isset($_SESSION['userdata'])){
    $orders_query="SELECT * FROM activecare_products RIGHT JOIN activecare_orders on activecare_products.id=activecare_orders.prodid WHERE customerid=".$_SESSION['userdata']['id'];
    $result=mysqli_query($conn,$orders_query);
}

?>

<div class="banner-area" id="home-link">&nbsp;</div>
	

<div class="mid-area">
	<div class="container">
		<h5 class="mb-0">Account</h5>
		<p>User's Name</p>
		
		<div class="row">
			
			<div class="col-12 col-sm-12 col-md-9">
  <?php 
                    while($row = mysqli_fetch_assoc($result)) {   
                        ?>                           
				<div class="order-wrap">
					<div class="row">
						<div class="col-9 col-sm-9 col-md-10">
							<div class="order-details">
								<div class="line-a"><?php echo $row['title'];?></div>
								<div class="line-b">KWD <?php echo $row['price'];?></div>
								<div class="line-c"><span class="deliverd">Purchased</span> (<?php echo date("M ,d  Y",strtotime($row['paymentdate'])); ?>)</div>
							</div>
						</div>
                                            <div class="col-3 col-sm-3 col-md-2"><a href="pdf-flipbook/index.php?book_name=<?php echo $row['thumimage2']?>"  target="_blank"><img src="uploads/products/<?php echo $row['thumimage1'];?>" class="img-fluid"></a></div>
					</div>
				</div>
                    <?php } ?>
			</div>
			
			<div class="col-12 col-sm-12 col-md-3 mb-4 mb-sm-4 mb-md-0">
				<ul class="account-menu list-unstyled">
					<li><a href="profile.php">الملف الشخصي</a></li>
					<li><a href="orders.php" class="active">طلباتي</a></li>
					<hr>
					<li><a href="#">تسجيل الخروج</a></li>
				</ul>
			</div>
		</div>


		
		
		
		
		
	</div>	
</div>



<?php include 'includes/footer.php';?>