<?php
include 'includes/products_header.php';
include 'connection.php';
$id = $_REQUEST['id'];

$data = "SELECT * FROM activecare_products WHERE id=" . $id;
$result = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($result);
?>
<div class="banner-area" id="home-link">&nbsp;</div>


<div class="mid-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <h4 class="mb-5"><?php echo $row['title']; ?></h4>				
                <h5 class="mb-5 text-danger"><?php echo $row['price']; ?></h5>

                <p class="mb-5"><?php echo $row['content']; ?></p>

                <div class="row justify-content-end">
                    <div class="col-auto"><button class="btn btn-dark btn-lg btn-block"  role="button" id="buy_it_now_btn">أضف إلى السلة</button></div>
                    <div class="col-auto"><a class="btn btn-danger btn-lg btn-block disabled"  role="button" id="shoping_bag_btn" readonly>اشتر الآن</a></div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="ubislider-image-container" data-ubislider="#slider4" id="imageSlider4"></div>
                <div id="slider4" class="ubislider">
                    <a class="arrow prev"></a>
                    <a class="arrow next"></a>
                    <ul id="gal1" class="ubislider-inner">
                        <li><a><img class="product-v-img" src="uploads/products/<?php echo $row['thumimage1']; ?>"></a></li>
                        <!--<li><a><img class="product-v-img" src="images/products/b.jpg"></a></li>-->
                    </ul>
                </div>
            </div>

        </div>
    </div>	
</div>


<?php include 'includes/footer.php'; 
?>
<script>
    
    $('#buy_it_now_btn').click(function(){
//        alert();
        
       $.ajax({
            type:'POST',
            url:"insert_shopping_bag.php",
            data:{id:<?php echo $id;?>},
            success:function(response){
       window.location.replace('shopping-bag.php');
            },
            
        });
        
    });
    

</script>