<?php 
ob_start();
require_once('auth.php');
include "header.php"; 
$id = $_REQUEST['id'];
if(isset($_POST['submit']))
{		
	$title 				= $_POST['title'];
	$content 			= $_POST['content'];
	$thumbimg2 			= $_FILES['thumbimg2']['name'];
	$service_title 			= $_POST['service_title'];
        $thumbimg1			= $_FILES['thumbimg1']['name'];
        $image                          = $_FILES['background_image']['name'];
        $color_code                     = $_POST['color_code'];

	$query = "UPDATE `activecare_services` SET `title`='$title',`content`='$content',`service_title`='$service_title',`color_code`='$color_code' WHERE id=.$id";
//        print_r($query);exit;
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
		if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "png") || ($ext == "svg")) {
			$basename1 = $newfilename .'.'. $extension1;
			$blocation1 = "../uploads/services/" . $basename1;
			$target_file1 = "../uploads/services/" . $basename1;
			if (move_uploaded_file($_FILES['thumbimg1']['tmp_name'], $target_file1)) {	
				$login_query = "UPDATE activecare_services SET thumbimg1='$target_file1' WHERE id=$id";
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
				$login_query = "UPDATE activecare_services SET thumbimg2='$target_file1' WHERE id=$id";
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
				$login_query = "UPDATE activecare_services SET background_image='$target_file1' WHERE id=$id";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($login_query);  
				$stmt1->execute();
				$res11 = $stmt1->rowCount();
//                                print_r($stmt1);exit;SS
			}
		}
	}
	
	
	
		
	if($res1 == 1 || $res == 1){
		header("location:services.php?msg=success");		
	} else {		
		header("location:services_edit.php?msg=fail");		
	}	
}	
?>
<style>
.img-wrap {
    position: relative;
    display: inline-block;
    border: 1px red solid;
    font-size: 0;
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #FFF;
    padding: 5px 2px 2px;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    opacity: .2;
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
}
.img-wrap:hover .close {
    opacity: 1;
}
</style>

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
                <h3>Edit Services</h3>
              </div>			
            </div>
			<?php
				$banner_que = "SELECT * from activecare_services where id=$id";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($banner_que);  
				$stmt1->execute();	
				$about_res = $stmt1->fetch(PDO::FETCH_ASSOC);
//				$catid = $about_res['catid'];
			?>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Services</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form action="" name="adv_form" id="adv_form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="name" value="<?php echo $about_res['title'] ;?>" class="form-control" style="width: 780px;">
						</div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Content
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="content" id="name" value="<?php echo $about_res['content'] ;?>" class="form-control" style="width: 780px;">
						</div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="thumbimg2" id="thumbimg2" accept="image/*" class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
                                                  <div class="control-group">					
							<div class="controls">
								<div align="left"><br/>
								<?php if($about_res['thumbimg2']!=""){ ?>
                                                                    <img src="<?php echo $about_res['thumbimg2'] ?>" width="250px" height="150px"/>
								<?php } ?>		
								</div>	
							</div>
						 </div>	
						 
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Service Title
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="service_title" id="name" value="<?php echo $about_res['service_title'] ?>" class="form-control" style="width: 780px;">
						</div>
                      </div>	
				     
					 
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="thumbimg1" id="thumbimg2" accept="image/*" class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
                                                  <div class="control-group">					
							<div class="controls">
								<div align="left"><br/>
								<?php if($about_res['thumbimg1']!=""){ ?>
                                                                    <img src="<?php echo $about_res['thumbimg1'] ?>" width="250px" height="150px"/>
								<?php } ?>		
								</div>	
							</div>
						 </div>	
						 
                        </div>
                      </div>
			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Background Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="background_image" id="thumbimg2" accept="image/*" class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
                                                  <div class="control-group">					
							<div class="controls">
								<div align="left"><br/>
								<?php if($about_res['background_image']!=""){ ?>
                                                                    <img src="<?php echo $about_res['background_image'] ?>" width="250px" height="150px"/>
								<?php } ?>		
								</div>	
							</div>
						 </div>	
						 
                        </div>
                      </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Color Code</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="input-group">
                                        <input type="text" name="color_code" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo $about_res['color_code'] ?>" id="hexcolor"></input>

                                    <input type="color" id="colorpicker" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55" > 
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
<script>
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