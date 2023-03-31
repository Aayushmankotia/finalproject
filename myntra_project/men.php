<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="men.css">
    <link rel="stylesheet" href="myntra.css">
    <title>men</title>
  </head>
  <body>
 
      <!-- navigation section start -->
      <?php 
    // navigationbar file is include here for navigation bar 
    @include 'navigationbar.php';
    include 'configer.php';
    
     ?>


 
  

    <div class="main_container">

    <?php
   $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE p_category = 'MEN' ") or die('query failed');

   if(mysqli_num_rows($select_products) > 0){
     
      while($fetch_products = mysqli_fetch_assoc($select_products)){
        
   ?>
      <section class="container_boxes box1">
        <form action="" method="POST" class="">
        <img src="uploads/<?php echo $fetch_products['avatar']; ?>" alt="" class="productimage">
          <div class="price">
      
            <h3><?php echo $fetch_products['p_name']; ?></h3>
            <b>₹: <?php echo $fetch_products['p_price']; ?></b>
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['p_id']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $fetch_products['p_name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $fetch_products['p_price']; ?>">
          <input type="hidden" name="product_image" value="<?php echo $fetch_products['avatar']; ?>">
          <input type="number" name="product_quantity" value="1" min="0" class="qty, btn">
          <input type="submit" value="add to cart" name="add_to_cart" class="btn">
          </div>  
        </form>
        
      </section>
      

      <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
    </div>

  </div>

      




    <!-- footer section  -->
    <footer>
      <div class="flex_foot">
        <div class="shoping">
          <!-- shoping catagories  -->
          <h3>ONLINE SHOPPING</h3>

          <ul>
            <li> <a class='linklocation' href=""> Men</a></li>
            <li> <a class='linklocation' href=""> Women</a></li>
            <li> <a class='linklocation' href="">Kids </a></li>

          </ul>

        </div>

        <!-- polic section  -->
        <div class="policies">
          <h3>CUSTOMER POLICES</h3>
          <ul>
            <li> <a class='linklocation' href=""> Contact Us</a></li>
            <li> <a class='linklocation' href=""> FAQ</a></li>
            <li> <a class='linklocation' href="">Terms Of Use </a></li>
            <li> <a class='linklocation' href=""> Track Orders</a></li>
            <li> <a class='linklocation' href=""> Shipping</a></li>
            <li> <a class='linklocation' href="">Cancellation</a></li>
            <li> <a class='linklocation' href=""> Privacy policy</a></li>
            <li> <a class='linklocation' href="">Grievance Officer </a></li>
          </ul>
        </div>

        <!-- keep in touch section  -->
        <div class="footer_top">
          <h3>KEEP IN TOUCH</h3>

          <!-- font-awesome icons are used  -->
          <div class="col-auto social-icons item2">
            <a href="https://www.youtube.com/" target="_blank">
              <i class="fa fa-youtube-play" style="font-size:36px"></i>
            </a>
            <a href="https://www.twitter.com/" target="_blank">
              <i class="fa fa-twitter" style="font-size:36px"></i>
            </a>
            <a href="https://www.whatsapp.com/" target="_blank">
              <i class="fa fa-whatsapp" style="font-size:36px"></i>
            </a>
            <a href="https://www.instagram.com/aayush_mankotia__/"
              target="_blank">
              <i class="fa fa-instagram" style="font-size:36px"></i>
            </a>

          </div>
        </div>

        <!-- section for policies  -->
        <div class="policies">
          <h3>USEFUL LINKS</h3>

          <ul>
            <li><a class='linklocation' href="">Blog</a></li>
            <li><a class='linklocation' href="">Careers</a></li>
            <li><a class='linklocation' href="">Site Map</a></li>
            <li><a class='linklocation' href="">Corporate Information</a></li>
            <li><a class='linklocation' href="">Whitehat</a></li>

          </ul>


        </div>

      </div>
      <hr>
      <!-- section for popular searches  -->
      <div class="popular_searches">
        <h3>POPULAR SEARCHES</h3>
        <a class='linklocation' href="">Makeup | </a>
        <a class='linklocation' href=""> Dresses For Girls |</a>
        <a class='linklocation' href="">T-Shirts |</a>
        <a class='linklocation' href="">Sandals | </a>
        <a class='linklocation' href="">Headphones |</a>
        <a class='linklocation' href="">Blazers For Men | </a>
        <a class='linklocation' href="">Handbags |</a>
        <a class='linklocation' href="">Bags |</a>
        <a class='linklocation' href="">Sport Shoes | </a>
        <a class='linklocation' href="">Reebok Shoes |</a>
        <a class='linklocation' href="">Tops |</a>
        <a class='linklocation' href="">Kurtis | </a>
        <a class='linklocation' href=""> Nike | </a>
        <a class='linklocation' href="">Smart Watches |</a>
        <a class='linklocation' href=""> Gowns | </a>
        <a class='linklocation' href="">Punjabi Suits | </a>
        <a class='linklocation' href=""> Saree | </a>
        <a class='linklocation' href=""> Dresses | </a>
        <a class='linklocation' href="">Lehenga |</a>
        <a class='linklocation' href="">Suit | </a>
        <a class='linklocation' href="">Shoes | </a>
        <a class='linklocation' href=""> Designers Sarees |</a>
        <div class="copywrite">

          <!-- copyrights      -->
          <p>© 2023 www.myntra.com. All rights reserved.</p>
        </div>

      </div>
    </footer>
    <!-- footer ends  -->

  </body>
</html>