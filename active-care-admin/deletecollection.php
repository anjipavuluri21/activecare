<?php

include 'connectionpdo.php';

$id = $_POST['id'];
$type = $_REQUEST['type'];

if($type == 'contactus'){
$banner_que = "DELETE FROM code8_feedbacks WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();

} else if($type == 'product'){
$banner_que = "DELETE FROM activecare_products WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
}
else if($type == 'services'){
$banner_que = "DELETE FROM activecare_services WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
} else if($type == 'ourteam'){
$banner_que = "DELETE FROM activecare_ourteam WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
}
else if($type == 'testimonials'){
$banner_que = "DELETE FROM activecare_testimonials WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
}
else if($type == 'purchase_order'){
$banner_que = "DELETE FROM activecare_complete_purchase_order WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();

} 
else if($type == 'join_us'){
$banner_que = "DELETE FROM activecare_newrequests WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();

} 
 else if($type == 'banners'){
$banner_que = "DELETE FROM activecare_banners WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();


 }
 else if($type == 'e_books'){
$banner_que = "DELETE FROM activecare_e_book_request WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();


} else if($type == 'productimage'){
$banner_que = "DELETE FROM activecare_prodimages WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
} else if($type == 'customer'){
$banner_que = "DELETE FROM activecare_customers WHERE id='".$id."'";
$database1 = new Database();
$dbCon1 = $database1->getConnection();
$stmt1 = $dbCon1->prepare($banner_que);
$stmt1->execute();
$res = $stmt1->rowCount();
}

if($res == 1){
echo "done";
}
?>