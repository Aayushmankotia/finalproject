
<?php

@include 'configer.php';

session_start();

$user_id = $_SESSION['user_id'];



if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="flower/css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>new collections</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime reiciendis, modi placeat sit cumque molestiae.</p>
      <a href="about.php" class="btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

 

   <div class="box-container">
   <?php
   $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE p_category = 'MEN' ") or die('query failed');

   if(mysqli_num_rows($select_products) > 0){
     
      while($fetch_products = mysqli_fetch_assoc($select_products)){
        
   ?>
        
          <div> 
         <form action="" method="POST" class="">
         <a href="view_page.php?pid=<?php echo $fetch_products['p_id']; ?>" class="fas fa-eye"></a>
         <div class="price">$<?php echo $fetch_products['p_price']; ?>/-</div>
         <img src="uploads/<?php echo $fetch_products['avatar']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['p_name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['p_id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['p_name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['p_price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['avatar']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </form>
      </span>

      <!-- <form action="" method="POST" class="box">
         <a href="view_page.php?pid=15" class="fas fa-eye"></a>
         <div class="price">$15/-</div>
         <img src="uploaded_img/cottage rose.jpg" alt="" class="image">
         <div class="name">cottage rose</div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="15">
         <input type="hidden" name="product_name" value="cottage rose">
         <input type="hidden" name="product_price" value="15">
         <input type="hidden" name="product_image" value="cottage rose.jpg">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form> -->
         
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
</div>
<?php if($count % 4 == 0){
            echo "this isme ". "<br>";
         }
         
         ?>



   </div>

   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia aliquam quis saepe? Quia, libero.</p>
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>




<?php @include 'footer.php'; ?>

<style>
   .box-container{
       display: grid;
    grid-template-columns: repeat(4,auto);
    gap: 1.5rem;
    align-items: flex-start;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center;
}
      
   
   .image{

    width:300px;
    height:400px;
    border:solid red 2px;
   }
   .products{
    
    width:100vw;
    border:solid red 2px;
    overflow:none;
   }
   /* .dashboard .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
   gap:1.5rem;
   align-items: flex-start;
   max-width: 1200px;
   margin: 0 auto;
}
.dashboard .box-container .box{
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   padding:2rem;
   border-radius: .5rem;
}

.dashboard .box-container .box h3{
   font-size: 4.5rem;
   color:var(--black);
}

.dashboard .box-container .box p{
   padding:1.5rem;
   border-radius: .5rem;
   background-color: var(--light-bg);
   color:var(--light-color);
   border:var(--border);
   margin-top: 2rem;
   font-size: 2rem;
} */


</style>

</body>
</html>