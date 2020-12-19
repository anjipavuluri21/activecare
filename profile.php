<?php 
include 'includes/products_header.php';
include 'connection.php';
$data="SELECT * FROM activecare_customers WHERE id=".$_SESSION['userdata']['id'];
$result=mysqli_query($conn,$data);
$row= mysqli_fetch_assoc($result);

?>

<div class="banner-area" id="home-link">&nbsp;</div>
	

<div class="mid-area">
	<div class="container">
		<h5 class="mb-0">Account</h5>
		<p>User's Name</p>
		
		<div class="row">
			<div class="col-12 col-sm-12 col-md-9">
                            <form action="change_password.php" method="post">

					<div class="form-group">
						<label for="pro-email">البريد الإلكتروني</label>
                                                <input type="email" name="email" class="form-control" id="pro-email" placeholder="البريد الإلكتروني" value="<?php echo $row['email'];?>">
					</div>
					
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="pro-con-password">تأكيد كلمة المرور الجديدة</label>
                                                                <input type="password" name="password" class="form-control" id="pro-con-password" placeholder="تأكيد كلمة المرور الجديدة" value="<?php echo $row['password'];?>">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="pro-password">كلمة سر جديدة</label>
                                                                <input type="password" name="confirmpwd" class="form-control" id="pro-password" placeholder="كلمة سر جديدة" value="<?php echo $row['password'];?>">
							</div>
						</div>
					</div>
					
					
					
					
					<p>&nbsp;</p>
					<hr>
					<p>&nbsp;</p>
					<div class="form-group">
						<label for="pro-fname">الاسم الأول</label>
                                                <input type="text" name="fname" class="form-control" id="pro-fname" placeholder="الاسم الأول" value="<?php echo $row['first_name'];?>">
					</div>
					
					<div class="form-group">
						<label for="pro-lname">اسم العائلة</label>
                                                <input type="text" name="sname" class="form-control" id="pro-lname" placeholder="اسم العائلة" value="<?php echo $row['fullname'];?>">
					</div>
					
					<div class="form-group">
						<label for="pro-Phone">رقم الهاتف</label>
                                                <input type="tel" name="phone" class="form-control" id="pro-Phone" placeholder="رقم الهاتف" value="<?php echo $row['mobile'];?>">
					</div>
					
                                        <button type="submit"  name="update" class="btn btn-primary">حفظ</button> 
				</form>
				
				
				
			</div>
			
			<div class="col-12 col-sm-12 col-md-3 mb-4 mb-sm-4 mb-md-0">
				<ul class="account-menu list-unstyled">
					<li><a href="profile.php" class="active">الملف الشخصي</a></li>
					<li><a href="orders.php">طلباتي</a></li>
					<hr>
					<li><a href="#">تسجيل الخروج</a></li>
				</ul>
			</div>
		</div>


		
		
		
		
		
	</div>	
</div>

<?php include 'includes/footer.php';?>
