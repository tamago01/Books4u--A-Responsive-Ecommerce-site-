<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://www.facebook.com/2ez4ab/" class="fab fa-facebook-f"target="_blank"></a>
            <a href="https://twitter.com/Mel85362879" class="fab fa-twitter" target="_blank"></a>
            <a href="https://www.instagram.com/llamapradeep/" class="fab fa-instagram" target="_blank"></a>
            <a href="https://www.linkedin.com/in/abhinav-shakya-0523821ab/" class="fab fa-linkedin" target="_blank"></a>
         </div>
         <p><a href="login.php">Login</a> | <a href="register.php">Register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="index.php" class="logo">BOOKS4U</a>

         <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about1.php">About</a>
            <a href="shop1.php">Shop</a>
            <a href="contact1.php">Contact</a>
            <a href="orders.php">Orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page1.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></a>
           </div>
            <?php
                $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_rows_number = mysqli_num_rows($select_cart_number);
            ?>
             <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a> -->
         </div>
      </div>
   </div>

</header>