<?php 
    include 'includes/header.php';
    include 'connection.php';
    
    $data="SELECT * from activecare_banners where status=1";
    $result=mysqli_query($conn,$data);
    
    
//    $row= mysqli_fetch_array($result);
//    print_r($row);exit;
    
    $data="SELECT * from activecare_settings where `name`='title'";
    $results=mysqli_query($conn,$data);
    $record = mysqli_fetch_array($results);
    
    $data="SELECT * from activecare_settings where `name`='title1'";
    $results=mysqli_query($conn,$data);
    $title = mysqli_fetch_array($results);
//    print_r($record);exit;

?>
<div class="banner-area" id="home-link">
	<div class="container">
		<div class="line-a" data-aos="fade-up" data-aos-duration="250"><img src="images/active-logo.png" class="img-fluid" alt=""></div>
		<div class="line-b english-text" data-aos="fade-up" data-aos-duration="500"><?php echo $record['value'];?></div>
		<div class="line-c english-text" data-aos="fade-up" data-aos-duration="750"><?php echo $title['value'];?></div>
		<div class="line-d" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                    if(isset($_SESSION['userdata'])){?>
                       <a class="btn btn-info" href="logout.php" role="button" >تسجيل الخروج</a>
";
                   <?php }else{?>
                        <a class="btn btn-info" href="#" role="button" data-toggle="modal" data-target="#login-modal">تسجيل الدخول</a>
                    <?php }
                    ?>
			
			<a class="btn btn-dark" href="products.php" role="button">كتبنا الإلكترونية</a>
		</div>
	</div>
	<div class="bxslider">
            <?php 
            while($row = mysqli_fetch_array($result)) { ?>
            <div><img src="uploads/banners/<?php echo $row['thumbimg1'];?>" alt=""></div>
<?php }?>
		
	</div>
</div>
	<?php 
            $rehabilitation_query="SELECT * FROM `activecare_homepageheader` WHERE id=1";
            $result=mysqli_query($conn,$rehabilitation_query);
            $row = mysqli_fetch_assoc($result);
//            print_r($row);exit;
        
        ?>
<div class="about-wrap" id="about-link">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-sm-12 col-md-12 col-lg-7" data-aos="fade-up" data-aos-duration="250">
				<div class="about-spine">
                                    <img src="uploads/homepage_images/<?php echo $row['image'];?>" class="img-fluid" alt="">
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-5" data-aos="fade-up" data-aos-duration="500">
				<div class="about-block main-h1">
                                    <h2><?php echo $row['title1'];?></h2>
					<h1><?php echo $row['title2'];?></h1>
                                        <p><?php echo $row['captionar'];?></p>
                                </div>
			</div>
		</div>
	</div>
</div>
	<?php 
            $rehabilitation_query="SELECT * FROM activecare_services where status=1";
            $result1=mysqli_query($conn,$rehabilitation_query);
            $result2=mysqli_query($conn,$rehabilitation_query);
            
//            print_r($row);exit;
        
        ?>
<div class="services-wrap" id="services-link">
	<div class="container">
		<div id="tab-container" class="tab-container">
			<div class="panel-container">
                            <?php 
                            while($row = mysqli_fetch_assoc($result1)){ ?>
                                <div id="services_<?php echo $row['id'];?>" class="tab-block">
					<div class="row align-items-center">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6"><img src="services/<?php echo $row['thumbimg2'];?>" class="img-fluid" alt=""></div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<h1><?php echo $row['title'];?></h1>
                                                        <p><?php echo $row['content'];?></p>	
						</div>
					</div>
				</div>
                                
                            <?php }
                            ?>
				
				
			</div>
			
			<ul class="etabs">
                            <?php 
                            while($row = mysqli_fetch_assoc($result2)){ ?>
				<li class="tab"><a href="#services_<?php echo $row['id'];?>" data-img="services/<?php echo $row['background_image'];?>">
                                        <div class="line-a"><img src="services/<?php echo $row['thumbimg1'];?>" class="img-fluid" alt=""></div>
					<div class="line-b"><?php echo $row['service_title'];?></div>
					</a>
				</li>
                                <?php }
                            ?>
			</ul>
		</div>
	</div>
</div>

	<?php 
        $data="SELECT * FROM activecare_ourteam where status=1";
        $result=mysqli_query($conn,$data);
    $row = mysqli_fetch_array($result);
//    print_r($row).exit;
     $data="SELECT * from activecare_settings where `name`='our_team_content'";
    $results=mysqli_query($conn,$data);
    $title = mysqli_fetch_assoc($results);
//    print_r($title);exit;
        ?>
<div class="team-wrap jarallax" id="team-link">
	<div class="container main-h1">
		<h1><?php echo $row['title'];?></h1>
                <p><?php echo $title['value'];?></p>
		
		

		<div class="teamowl owl-carousel owl-theme mb-3">
                    <?php 
                       
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <div class="item">
				<div class="team-block">
                                    <div class="team-img"><img src="uploads/ourteam/<?php echo $row['thumbimg1'];?>" class="img-fluid" alt=""></div>
					<div class="team-desc">
						<div class="line-a"><?php echo $row['name'];?></div>
						<div class="line-b">&nbsp;</div>
					</div>
				</div>
			</div>
                    
                    <?php }

                    ?>
			
		</div>
		<center><a class="btn btn-info" href="javascript:void(0)" role="button" data-toggle="modal" data-target="#joinus-modal">Join us</a></center>
	</div>
</div>
	
<!-- HOME PROGRAM MODAL -->
<div class="hp-modal-wrap">
<div class="modal fade" id="hp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content modal-section">
			<div class="modal-header">
				<h5 class="modal-title">إتمام طلب الكتاب الالكتروني</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="hp-modal-body">
                                    <form method="post" id="program_form">
					<div class="form-group">
						<label for="kit-f-name">الاسم الأول</label>
                                                <input type="text" name="fname" class="form-control" id="kit-f-name" placeholder="الاسم الأول">
					</div>
					
					<div class="form-group">
						<label for="kit-l-name">اسم العائلة</label>
                                                <input type="text" name="sname" class="form-control" id="kit-l-name" placeholder="اسم العائلة">
					</div>
					
					<div class="form-group">
						<label for="kit-email">البريد الإلكتروني</label>
                                                <input type="email" name="email" class="form-control" id="kit-email" placeholder="البريد الإلكتروني">
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="kit-cc">الرقم الدولي</label>
                                                        <input type="tel" name="mobile" class="form-control" id="kit-phone2" placeholder="الرقم الدولي">
						</div>
						<div class="form-group col-md-8">
							<label for="kit-phone2">رقم الهاتف</label>
                                                        <input type="tel" name="mobile2" class="form-control" id="kit-cc" placeholder="رقم الهاتف">
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="kit-quantity">نوع البرنامج</label>
                                                        <select id="kit-quantity" name="program_type" class="form-control">
								<option selected>نوع البرنامج</option>
								<option>البرنامج اليومي</option>
								<option>برنامج الأطفال</option>	
							</select>
						</div>
						
						<div class="form-group col-md-6">
							<label for="kit-quantity-4">العدد</label>
                                                        <select id="kit-quantity-4" name="program_no" class="form-control">
								<option selected>الرجاء التحديد العدد</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							
						</div>
						
					</div>
					
					
                                        <button type="submit" name="submit" id="programbutton" class="btn btn-info">إتمام عملية الشراء</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>	
<!-- HOME PROGRAM MODAL -->
	
<!-- ACTIVE GROUP MODAL -->
<div class="hp-modal-wrap">
<div class="modal fade" id="actgroup-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content modal-section">
			<div class="modal-header">
				<h5 class="modal-title">إتمام طلب شراء مجموعة آكتف</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="hp-modal-body">
                                    <form method="post" id="active_form">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="kit-f-name2">الاسم الأول</label>
                                                        <input type="text" name="fname" class="form-control" id="kit-f-name2" placeholder="الاسم الأول">
						</div>
						
						<div class="form-group col-md-6">
							<label for="kit-l-name2">اسم العائلة</label>
                                                        <input type="text" name="sname" class="form-control" id="kit-l-name2" placeholder="اسم العائلة">
						</div>
					</div>
						
					<div class="form-group">
						<label for="kit-email2">البريد الإلكتروني</label>
                                                <input type="email" name="email" class="form-control" id="kit-email2" placeholder="البريد الإلكتروني">
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="kit-ccc">الرقم الدولي</label>
                                                        <input type="tel" name="mobile" class="form-control" id="kit-ccc" placeholder="الرقم الدولي">
						</div>
						<div class="form-group col-md-8">
							<label for="kit-cccc">رقم الهاتف</label>
                                                        <input type="tel" name="mobile2" class="form-control" id="kit-cccc" placeholder="رقم الهاتف">
						</div>
					</div>
						
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="kit-quantity-2">نوع المجموعة</label>
                                                        <select id="kit-quantity-2" name="group_type" class="form-control">
								<option selected>نوع المجموعة</option>
								<option>اليومية  10KD</option>
								<option>الرياضية 12KD</option>
								<option>الأطفال 30KD</option>
								<option>كبار السن 40KD</option>	
							</select>
							
						</div>
						<div class="form-group col-md-6">
							<label for="kit-quantity-3">العدد</label>
                                                        <select id="kit-quantity-3"  name="group_no" class="form-control">
								<option selected>الرجاء التحديد العدد</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							
						</div>
						
					</div>
					<div class="form-group">
						<label for="kit-address">العنوان</label>
                                                <input type="text" class="form-control" name="title" id="kit-address" placeholder="العنوان">
					</div>
						
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="kit-city">المنطقة</label>
                                                        <input type="text" class="form-control" name="region" id="kit-city" placeholder="المنطقة">
						</div>
						<div class="form-group col-md-6">
							<label for="kit-country">الدولة</label>
                                                        <select class="form-control" name="country" id="kit-country" name="country">
								<option value="Afganistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antigua & Barbuda">Antigua & Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bonaire">Bonaire</option>
								<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Channel Islands">Channel Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Island">Cocos Island</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote DIvoire">Cote DIvoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curaco">Curacao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Ter">French Southern Ter</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Great Britain">Great Britain</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="Indonesia">Indonesia</option>
								<option value="India">India</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea North">Korea North</option>
								<option value="Korea Sout">Korea South</option>
								<option value="Kuwait" selected>Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>

								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malawi">Malawi</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Midway Islands">Midway Islands</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Nambia">Nambia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherland Antilles">Netherland Antilles</option>
								<option value="Netherlands">Netherlands (Holland, Europe)</option>
								<option value="Nevis">Nevis</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau Island">Palau Island</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Phillipines">Philippines</option>
								<option value="Pitcairn Island">Pitcairn Island</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of Montenegro">Republic of Montenegro</option>
								<option value="Republic of Serbia">Republic of Serbia</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="St Barthelemy">St Barthelemy</option>
								<option value="St Eustatius">St Eustatius</option>
								<option value="St Helena">St Helena</option>
								<option value="St Kitts-Nevis">St Kitts-Nevis</option>
								<option value="St Lucia">St Lucia</option>
								<option value="St Maarten">St Maarten</option>
								<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
								<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
								<option value="Saipan">Saipan</option>
								<option value="Samoa">Samoa</option>
								<option value="Samoa American">Samoa American</option>

								<option value="San Marino">San Marino</option>
								<option value="Sao Tome & Principe">Sao Tome & Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Tahiti">Tahiti</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad & Tobago">Trinidad & Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks & Caicos Is">Turks & Caicos Is</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Erimates">United Arab Emirates</option>
								<option value="United States of America">United States of America</option>
								<option value="Uraguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City State">Vatican City State</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								<option value="Wake Island">Wake Island</option>
								<option value="Wallis & Futana Is">Wallis & Futana Is</option>
								<option value="Yemen">Yemen</option>
								<option value="Zaire">Zaire</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
							</select>
						</div>
					</div>
					
                                        <button type="submit" name="submit" id="activebutton"  class="btn btn-info">إتمام عملية الشراء</button>
						
						
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>	
<!-- ACTIVE GROUP MODAL -->
	
<div class="two-blocks" id="products-link">
	<div class="row no-gutters">
		<div class="col-12 col-sm-12 col-md-6 mb-1 mb-sm-1 mb-md-0">
			<div class="left-block">
				
				<div class="text-layer">
					<div class="line-a"><h1 class="mb-0">برامجنا المنزلية</h1></div>
					<div class="line-b">يعتبر كتاب البرامج المنزلية دليا إلرشادكم خطوة ٍ بخطوة حتى يستطيع كل واحد منكم أن يساهم في عاج نفسه بنفسه. إن هذه المساهمة من آكتف كير ستجعل عال ٍ جك أسهل من أي وقت مضى  و سيساعدك على أن تصبح معالجـً إلصابتك.</div>
				</div>
				
				<div class="btn-layer"><a class="btn btn-info" href="javascript:void(0)" role="button" data-toggle="modal" data-target="#hp-modal">اطلب الان</a></div>
				
				<div class="bxslider">
					<div><img src="images/hp-a.jpg" alt="" class="img-fluid"></div>
					<div><img src="images/hp-b.jpg" alt="" class="img-fluid"></div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-6">
			<div class="right-block">
				
				<div class="text-layer">
					<div class="line-a"><h1 class="mb-0">مجموعة آكتف</h1></div>
					<div class="line-b">إن مجموعة آكتف عبارة عن نادي صحي في جيبك! َ فهي توفر لك كل األدوات الالزمة للمتابعة مع األخصائي الخاص بك للحصول على نتائج أسـرع في عالجك.</div>
				</div>
				
				<div class="btn-layer"><a class="btn btn-info" href="javascript:void(0)" role="button" data-toggle="modal" data-target="#actgroup-modal">اطلب الان</a></div>
				
				<div class="bxslider">
					<div><img src="images/products-aa.jpeg" alt=""></div>
					<div><img src="images/products-ab.jpeg" alt=""></div>
					<div><img src="images/products-bb.jpeg" alt=""></div>
					<div><img src="images/products-ba.jpeg" alt=""></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php 
    $data="SELECT * FROM activecare_testimonials where status=1";
        $result=mysqli_query($conn,$data);
        
//        print_r($row);exit;

?>
	
<div class="reviews-wrap" id="reviews-link">
	<div class="container">
		<div class="reviews-block" data-aos="fade-up">
			<div class="bxslider-2">
                            <?php 
                            while($row = mysqli_fetch_array($result)){ ?>
                                <div class="english-text">
					<p><?php echo $row['testimonial'];?></p>
					<strong>@<?php echo $row['given_by'];?></strong>
				</div>
                            <?php }
                            
                            ?>
				
			</div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php';?>