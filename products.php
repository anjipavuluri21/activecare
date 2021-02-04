<?php
include 'includes/header.php';
include 'connection.php';
$data="SELECT * FROM activecare_products WHERE status=1";
$result=mysqli_query($conn,$data);
//$row= mysqli_fetch_assoc($result);
//print_r($row);exit;
?>
<div class="banner-area" id="home-link"><img src="images/banner/books.jpg" alt="" class="img-fluid"></div>

<div class="mid-area mid-area-bg">
    <div class="container">
        <h1>كتبنا الإلكترونية</h1>

        <div class="row">
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
                    $prodid=$row['id'];
                        ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                        <div class="books-block">
                        

                        <a href="products-detail.php?id=<?php echo $prodid;?>">
                            <div class="books-a"><img src="uploads/products/<?php echo $row['thumimage1'];?>" class="img-fluid"></div>
                            <div class="books-b"><?php echo $row['title'];?></div>
                            <div class="books-c"><?php echo number_format($row['price'],3)?></div>


                        </a>
                    </div>
                        
                    
                    
                </div>
             <?php } ?> 
        </div>
       

    </div>	
</div>
<?php include 'includes/footer.php'; ?>
	


