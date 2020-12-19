<?php 
ob_start();
require_once('auth.php');
include "header.php"; 

if(isset($_POST['submit']))
{		
	$title 				= $_POST['title'];
	$content 			= $_POST['content'];
	$thumbimg2 			= $_FILES['thumbimg2']['name'];
	$service_title 			= $_POST['service_title'];
        $thumbimg1			= $_FILES['thumbimg1']['name'];
        $image                          = $_FILES['background_image']['name'];
        $color_code                     = $_POST['color_code'];;
        
	$query = "INSERT INTO activecare_services (`title`,`content`,`service_title`,`color_code`) VALUES ('$title','$content','$service_title','$color_code')"; 
        $database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($query);  
	$stmt1->execute();
	$res = $stmt1->rowCount();	
	$lastinsertid = $dbCon1->lastInsertId();
       if($thumbimg1!="")
	{			
		$name1 = pathinfo($_FILES['thumbimg1']['name'], PATHINFO_FILENAME);
		$extension1 = pathinfo($_FILES['thumbimg1']['name'], PATHINFO_EXTENSION);
		$ext = strtolower(pathinfo($_FILES['thumbimg1']['name'], PATHINFO_EXTENSION));
		$newfilename = 'active-care-services-'. round(microtime(true));
		if (($ext == "svg")) {
			$basename1 = $newfilename .'.'. $extension1;
			$blocation1 = "../uploads/services/" . $basename1;
			$target_file1 = "../uploads/services/" . $basename1;
			if (move_uploaded_file($_FILES['thumbimg1']['tmp_name'], $target_file1)) {	
				$login_query = "UPDATE activecare_services SET thumbimg1='$target_file1' WHERE id=$lastinsertid";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($login_query);  
				$stmt1->execute();
				$res11 = $stmt1->rowCount();
//                                print_r($stmt1);exit;
			}
		}
	} 
        if($thumbimg2!="")
	{			
		$name1 = pathinfo($_FILES['thumbimg2']['name'], PATHINFO_FILENAME);
		$extension1 = pathinfo($_FILES['thumbimg2']['name'], PATHINFO_EXTENSION);
		$ext = strtolower(pathinfo($_FILES['thumbimg2']['name'], PATHINFO_EXTENSION));
		$newfilename = 'active-care-services-'. round(microtime(true));
		if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "png") || ($ext == "svg")) {
			$basename1 = $newfilename .'.'. $extension1;
			$blocation1 = "../uploads/services/" . $basename1;
			$target_file1 = "../uploads/services/" . $basename1;
			if (move_uploaded_file($_FILES['thumbimg2']['tmp_name'], $target_file1)) {	
				$login_query = "UPDATE activecare_services SET thumbimg2='$target_file1' WHERE id=$lastinsertid";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($login_query);  
				$stmt1->execute();
				$res11 = $stmt1->rowCount();
//                                print_r($stmt1);exit;SS
			}
		}
	} 
            
	if($image!="")
	{			
		$name1 = pathinfo($_FILES['background_image']['name'], PATHINFO_FILENAME);
		$extension1 = pathinfo($_FILES['background_image']['name'], PATHINFO_EXTENSION);
		$ext = strtolower(pathinfo($_FILES['background_image']['name'], PATHINFO_EXTENSION));
		$newfilename = 'active-care-services-'. round(microtime(true));
		if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "png") || ($ext == "svg")) {
			$basename1 = $newfilename .'.'. $extension1;
			$blocation1 = "../uploads/services/" . $basename1;
			$target_file1 = "../uploads/services/" . $basename1;
			if (move_uploaded_file($_FILES['background_image']['tmp_name'], $target_file1)) {	
				$login_query = "UPDATE activecare_services SET background_image='$target_file1' WHERE id=$lastinsertid";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($login_query);  
				$stmt1->execute();
				$res11 = $stmt1->rowCount();
//                                print_r($stmt1);exit;SS
			}
		}
	}
	
	
	
		
	if($res11 == 1){
		header("location:services.php?msg=success");		
	} else {		
		header("location:services_addnew.php?msg=fail");		
	}	
}	
?>
<link rel="stylesheet" href="styles/prism.css">
<link rel="stylesheet" href="styles/chosen.css">
<link rel="stylesheet" href="cropper/cropper.min.css">
<link rel="stylesheet" href="dropzone/basic.css">
<link rel="stylesheet" href="dropzone/dropzone.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="main.css">

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Services</h3>
              </div>			
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Services</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form action="" name="adv_form" id="adv_form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="name" value="" class="form-control" style="width: 780px;">
						</div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Content
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="content" id="name" value="" class="form-control" style="width: 780px;">
						</div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="thumbimg2" id="thumbimg2" accept="image/*" class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
						 
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service Title<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="service_title" id="name" required="required" value="" class="form-control" style="width: 780px;">
						</div>
                      </div>	
				     
					 
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="thumbimg1" id="thumbimg2" accept="image/*" required class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px, svg Images only)
						 
                        </div>
                      </div>
			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Background Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="background_image" id="thumbimg2" accept="image/*" required class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
						 
                        </div>
                      </div>	
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Color Code</label>
                                <div class="col-md-9 col-sm-9 col-xs-12 ">
                                    <div class="input-group">
                                     <input type="text" name="color_code" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55" id="hexcolor"></input>

                                    <input type="color" id="colorpicker"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55" > 
                                    </div>
                                </div>
                            </div>	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>			
          </div>
        </div>

<?php include "footer.php" ?>
<script>

    $('#colorpicker').on('change', function () {
        $('#hexcolor').val(this.value);
    });
    $('#hexcolor').on('change', function () {
        $('#colorpicker').val(this.value);
    });
    $('#colorpicker').on('change', function () {
        $('#hexcolor').val(this.value);
    });
    $('#hexcolor').on('change', function () {
        $('#colorpicker').val(this.value);
    });
</script>