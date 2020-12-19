<?php 
ob_start();
require_once('auth.php');
include "header.php"; 

if(isset($_POST['submit']))
{		
	$title 				= $_POST['title'];	
	$content 			= $_POST['content'];
        $thumbimg1			= $_FILES['thumbimg1']['name'];
	
	$login_query = "INSERT INTO activecare_banners (`title`,`content`,`thumbimg1`) VALUES ('$title', '$content', '$thumbimg1')"; 
//        print_r($login_query).exit;
        $database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($login_query);  
	$stmt1->execute();
	$res = $stmt1->rowCount();	
	$lastinsertid = $dbCon1->lastInsertId();
	if($thumbimg1!="")
	{			
		$name1 = pathinfo($_FILES['thumbimg1']['name'], PATHINFO_FILENAME);
		$extension1 = pathinfo($_FILES['thumbimg1']['name'], PATHINFO_EXTENSION);
		$ext = strtolower(pathinfo($_FILES['thumbimg1']['name'], PATHINFO_EXTENSION));
		$newfilename = 'active-care-banners-'. round(microtime(true));
		if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "png")) {
			$basename1 = $newfilename .'.'. $extension1;
			$blocation1 = "../uploads/banners/" . $basename1;
			$target_file1 = "../uploads/banners/" . $basename1;
			if (move_uploaded_file($_FILES['thumbimg1']['tmp_name'], $target_file1)) {	
				$login_query = "UPDATE activecare_banners SET thumbimg1='$basename1' WHERE id=$lastinsertid";
				$database1 = new Database();
				$dbCon1 = $database1->getConnection();
				$stmt1 = $dbCon1->prepare($login_query);  
				$stmt1->execute();
				$res11 = $stmt1->rowCount();	
			}
		}
	}
	if($_POST['thumbimg1'][0] != "")
	{			
		foreach ($_POST['thumbimg1'] as $key => $productimages) {
			if($key != count($_POST['thumbimg1'])-1) {
				$img_location .= $productimages.",";
			}
			else {
				$img_location .= $productimages;
			}
		}
	}	
	if($img_location != "") {
		$img = $img_location;
	} else {
		$img = "";
	}
		
	if($img_location!="")
	{		
		$login_query = "UPDATE activecare_banners SET thumbimg1='$img' WHERE id=$lastinsertid";
		$database1 = new Database();
		$dbCon1 = $database1->getConnection();
		$stmt1 = $dbCon1->prepare($login_query);  
		$stmt1->execute();
		$res11 = $stmt1->rowCount();		
	} 
	
	 
	
	for($p=0;$p<$countprods;$p++){				
		//Check Rename
		$name1 = pathinfo($_FILES['prodimage']['name'][$p], PATHINFO_FILENAME);
		$extension1 = strtolower(pathinfo($_FILES['prodimage']['name'][$p], PATHINFO_EXTENSION));
				
		if($name1!=""){						
			if (($extension1 == "jpg") || ($extension1 == "jpeg") || ($extension1 == "png")) {								
				$newfilename1 = 'active-care-homepage_banners-'.$p.rand(). round(microtime(true));			
				$basename1 = $newfilename1 . '.' . $extension1;
				$blocation1 = "../uploads/banners/" . $basename1;
				$target_file1 = "../uploads/banners/" . $basename1;	
				
				if (move_uploaded_file($_FILES['prodimage']['tmp_name'][$p], $target_file1)) { 						
					$login_query = "INSERT INTO activecare_prodimages (`prodid`,`image`) VALUES ('$lastinsertid','$blocation1')";
					$database1 = new Database();
					$dbCon1 = $database1->getConnection();
					$stmt1 = $dbCon1->prepare($login_query);  
					$stmt1->execute();
					$res12 = $stmt1->rowCount();					
				}
			}	
		}		
	}
			
		
	if($res == 1 || $res1 == 1|| $res11 == 1|| $res12 == 1){
		header("location:banners.php?msg=success");		
	} else {		
		header("location:banners_addnew.php?msg=fail");		
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
                <h3>Add Banners</h3>
              </div>			
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Banners</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form action="" name="adv_form" id="adv_form" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					
					
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Banner Title<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="name" required="required" value="" class="form-control" style="width: 780px;">
						</div>
                      </div>	
				     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Banner Content<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="content" id="namear" required="required" value="" class="form-control" style="width: 780px;">
						</div>
                     </div>
					 
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Thumbnail Image 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="thumbimg1" id="thumbimg2" accept="image/*" required class="form-control" style="padding: 0px; border-width: 0px;">
						  <br>(Resolution: 466 X 621px)
						 
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
$(document).ready(function(){
    $('#menu').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "catajax.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {               
                $("#menucat").html(response);
            },
        });
    }); 
});
$(document).ready(function(){
    $('#menucat').on("change",function () {
        var categoryId = $('#menucat').find('option:selected').val();		
        var menuType = $('#menu').find('option:selected').val();		
        $.ajax({
            url: "subcatajax.php",
            type: "POST",
            data: "menuType="+menuType+"&categoryId="+categoryId,
            success: function (response) {
               // console.log(response);
                $("#submenu").html(response);
            },
        });
    }); 
});
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="cropper/cropper.min.js"></script>
<script src="dropzone/dropzone.js"></script>
<!--<script src="dropzone/dropzone2.js"></script>-->
<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="js/prism.js" type="text/javascript"></script>
<script src="js/init.js" type="text/javascript"></script>
<script>
$(document).ready(function() {		 
	$('.removeimg').on('click', function () {
		var nam = $(this).attr('id');
		$.ajax({
				type:"POST",
				url:"removeProductimg.php",
				data:"product_id="+nam,
				success:function(data)
				{
					$("#prodimg").html(data);
				}
		});
	});
});

Dropzone.autoDiscover = false;
$(document).ready(function() {         
	// transform cropper dataURI output to a Blob which Dropzone accepts
	var dataURItoBlob = function (dataURI) {
	var byteString = atob(dataURI.split(',')[1]);
	var ab = new ArrayBuffer(byteString.length);
	var ia = new Uint8Array(ab);
	for (var i = 0; i < byteString.length; i++) {
		ia[i] = byteString.charCodeAt(i);
	}
		return new Blob([ab], {type: 'image/jpeg'});
	};
	
   //  Dropzone.autoDiscover = false;
	var fileList = new Array;
	var i =0;
	var myDropzone = new Dropzone("#my-dropzone-container", {
		addRemoveLinks: true,
		acceptedFiles: "image/jpeg,image/png",
		maxFilesize: 1,
		url: "upload.php",
		init: function() {

			// Hack: Add the dropzone class to the element
			$(this.element).addClass("dropzone");
			this.on("success", function(file, serverFileName) {
				 
				fileList[i] = {"serverFileName" : file, "fileName" : file.name,"fileId" : i };
				 console.log(serverFileName);
				 
				 serverFileName= serverFileName.trim();
				  appendFilesIntoForm(serverFileName,i);
				i++;						
			});
			this.on("removedfile", function(file) {
				 
			console.log(file);
			console.log(file.name);
				 
			var rmvFile = "";
			var rmvFileId = "";
			 $("input[name='thumbimg1[]']").each(function() {
					//values.push($(this).val());
					 //alert($(this).val());
					if(file.name==$(this).val()){
						// alert('remove');
						  $(this).remove();
					}
				});			   
			});
			},		
		}
	);
	
	myDropzone.on('addedfile', function (file) {	   
		if (file.cropped) {
			return;
		}	
		var $img = $('<img>');	
		if (file.width < 800) {
			// validate width to prevent too small files to be uploaded
			return;
		}
		// cache filename to re-assign it to cropped file
		var cachedFilename = file.name;
		// remove not cropped file from dropzone (we will replace it later)
		myDropzone.removeFile(file);
	
		// dynamically create modals to allow multiple files processing
		// modal window template
		var modalTemplate =
			'<div class="modal fade" tabindex="-1" role="dialog">' +
				'<div class="modal-dialog " role="document"   >' + /*modal-lg*/
					'<div class="modal-content">' +
					'<div class="modal-header">' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<h4 class="modal-title">Crop</h4>' +
					'</div>' +
					'<div class="modal-body">' +
						'<div class="image-container"></div>' +
					'</div>' +
					'<div class="modal-footer">' +
						'<button type="button" class="btn btn-warning rotate-left"><span class="fa fa-rotate-left"></span></button>' +
						'<button type="button" class="btn btn-warning rotate-right"><span class="fa fa-rotate-right"></span></button>' +
						'<button type="button" class="btn btn-warning scale-x" data-value="-1"><span class="fa fa-arrows-h"></span></button>' +
						'<button type="button" class="btn btn-warning scale-y" data-value="-1"><span class="fa fa-arrows-v"></span></button>' +
	
						'<button type="button" class="btn btn-warning reset"><span class="fa fa-refresh"></span></button>' +
	
						'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
						'<button type="button" class="btn btn-primary crop-upload">Crop & upload</button>' +
					'</div>' +
					'</div>' +
				'</div>' +
			'</div>';
	
		var $cropperModal = $(modalTemplate);
	
		// initialize FileReader which reads uploaded file
		var reader = new FileReader();
		reader.onloadend = function () {
			// add uploaded and read image to modal
			$cropperModal.find('.image-container').html($img);
			$img.attr('src', reader.result);
		};
		// read uploaded file (triggers code above)
		reader.readAsDataURL(file);
	
		var cropper = {};
		$cropperModal
			.modal('show')
			.on("shown.bs.modal", function () {
				cropper = new Cropper($img.get(0), { 
				viewMode: 1,           
				checkOrientation:false,
				cropBoxResizable: true, 
				aspectRatio:2/2,
				strict:true,
				background:false,
				guides:false,
				//autoCropArea:0.6,
				autoCropArea: 0.8,
				rotatable:false,
				getCroppedCanvas:{fillcolor: "#FFFFFF"},			
				//using these just to stop box collapsing on itself
				minCropBoxWidth:50,
				minCropBoxHeight:50,				
				});
			})
			.on('click', '.crop-upload', function () {
				// get cropped image data
				var blob = cropper.getCroppedCanvas({ width: 400, height: 400 }).toDataURL('image/jpeg',0.9);
				// transform it to Blob object
				var newFile = dataURItoBlob(blob);
				// set 'cropped to true' (so that we don't get to that listener again)
				newFile.cropped = true;
				// assign original filename
				newFile.name = cachedFilename;
	
				// add cropped file to dropzone
				myDropzone.addFile(newFile);
				// upload cropped file with dropzone
				myDropzone.processQueue();
				$cropperModal.modal('hide');
			})
			.on('click', '.rotate-right', function () {
				cropper.rotate(90);
			})
			.on('click', '.rotate-left', function () {
				cropper.rotate(-90);
			})
			.on('click', '.reset', function () {
				cropper.reset();
			})
			.on('click', '.scale-x', function () {
				var $this = $(this);
				cropper.scaleX($this.data('value'));
				$this.data('value', -$this.data('value'));
			})
			.on('click', '.scale-y', function () {
				var $this = $(this);
				cropper.scaleY($this.data('value'));
				$this.data('value', -$this.data('value'));
			})
	});
	
	});
function appendFilesIntoForm(serverFileName,i) {
	serverFileName= serverFileName.trim();
	// console.log(serverFileName);
	$('#adv_form').append('<input type="hidden"  class="'+i+'imginsid" name="thumbimg1[]"  value="'+serverFileName+'">');
}	
		
function appendRemoveIdIntoForm(serverID) {
	serverID= serverID.trim();
	$('#adv_form').append('<input type="hidden"    name="removeRelIDarr[]"  value="'+serverID+'">');
}

</script>

<!-- /page content -->
<?php include "footer.php" ?>
<script>	
	CKEDITOR.replace('description');
	CKEDITOR.replace('descriptionar', {language:'ar'});	
	CKEDITOR.replace('sizeandfit');
	CKEDITOR.replace('sizeandfitar', {language:'ar'});	
	CKEDITOR.replace('other');
	CKEDITOR.replace('otherar', {language:'ar'});	
</script>
<script>
$LEFT_COL=$(".left_col");
$LEFT_COL.css("min-height",$(".right_col").height()+$(".left_col").height()+500);
</script>