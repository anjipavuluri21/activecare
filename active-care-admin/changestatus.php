<?php
include 'connectionpdo.php';

$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$status = $_POST['status'];

if($id!='' && $type=='country'){	
	$banner_que = "UPDATE code8_countries SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();



} else if($id!='' && $type=='product'){	
	$banner_que = "UPDATE activecare_products SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
} else if($id!='' && $type=='services'){	
	$banner_que = "UPDATE activecare_services SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
} else if($id!='' && $type=='ourteam'){	
	$banner_que = "UPDATE activecare_ourteam SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
        
}
else if($id!='' && $type=='testimonials'){	
	$banner_que = "UPDATE activecare_testimonials SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
        
}
else if($id!='' && $type=='banners'){	
	$banner_que = "UPDATE activecare_banners SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
        
}
else if($id!='' && $type=='purchase_order'){	
	$banner_que = "UPDATE activecare_complete_purchase_order SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
        
}
else if($id!='' && $type=='join_us'){	
	$banner_que = "UPDATE activecare_newrequests SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
        
}
else if($id!='' && $type=='customer'){	
	$banner_que = "UPDATE activecare_customers SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
}  else if($id!='' && $type=='shipstatus'){	
	$banner_que = "UPDATE code8_deliverystatus SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
}  
else if($id!='' && $type=='e_books'){	
	$banner_que = "UPDATE activecare_e_book_request SET status=$status WHERE id='".$id."'";
	$database1 = new Database();
	$dbCon1 = $database1->getConnection();
	$stmt1 = $dbCon1->prepare($banner_que);  
	$stmt1->execute();	
	$res = $stmt1->rowCount();
}  
if($res){
	echo "done";	
}
?>