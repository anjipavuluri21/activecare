<?php 
ob_start();
require_once('auth.php');
include "header.php"; 

if(isset($_POST['submit']))
{		
	$given_by 				= $_POST['given_by'];	
	$testimonial 			= $_POST['testimonial'];	


	$login_query = "INSERT INTO activecare_testimonials (`given_by`,`testimonial`) VALUES ('$given_by', '$testimonial')"; 
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
		header("location:testimonials_addnew.php?msg=fail");		
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

        <!-- page testimonial -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-given_by">
              <div class="given_by_left">
                <h3>Add Testimonial</h3>
              </div>			
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_given_by">
                    <h2>Add Testimonial</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_testimonial">
                    <br/>
                    <form action="" name="adv_form" id="adv_form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					
					
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Given By
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="given_by" id="name" value="" class="form-control" style="width: 780px;">
						</div>
                      </div>	
				     
			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Testimonial
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
                                                    <textarea type="text" name="testimonial" id="name" value="" class="form-control" style="width: 780px;"></textarea>
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
