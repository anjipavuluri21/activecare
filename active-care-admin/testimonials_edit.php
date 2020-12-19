<?php 
ob_start();
require_once('auth.php');
include "header.php"; 
$id = $_REQUEST['id']; 

if(isset($_POST['submit']))
{		
	$given_by 				= $_POST['given_by'];	
	$testimonial 			= $_POST['testimonial'];	

	$login_query = "UPDATE activecare_testimonials SET `given_by`='$given_by',`testimonial`='$testimonial' WHERE id=$id";

//        print_r($login_query).exit;
        $database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($login_query);  
	$stmt1->execute();
	$res = $stmt1->rowCount();	
	$lastinsertid = $dbCon1->lastInsertId();
	
			
		
	if($res == 1 ){
		header("location:testimonials.php?msg=success");		
	} else {		
		header("location:testimonials_edit.php?msg=fail");		
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

        <!-- page testimonial -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Testimonials</h3>
              </div>			
            </div>
			<?php
				$banner_que = "SELECT * from activecare_testimonials where id=$id";
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
                    <h2>Edit Testimonial</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_testimonial">
                    <br/>
                    <form action="" name="adv_form" id="adv_form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					
					
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Given By<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="given_by" id="name" required="required" value="<?php echo $about_res['given_by'] ?>" class="form-control" style="width: 780px;">
						</div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Content<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
                                                    <textarea type="text" name="testimonial" id="name" required="required" value="" class="form-control" style="width: 780px;"><?php echo $about_res['testimonial'] ?></textarea>
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


        <!-- /page testimonial -->
<?php include "footer.php" ?>
