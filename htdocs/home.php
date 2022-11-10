<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
 if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $stock_quantity= $_POST['stock_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart!';
    }
    elseif($product_quantity>$stock_quantity){
        $message[]='Input amount for item is higher than the stock quantity!';
    }
    else{
       $cartItem=mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart!';
       
        
    }
 }
 if(isset($_POST['no_item'])){
     $message[] ='No items remaming please choose other item';
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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Hand Picked Book to your door.</h3>
      <p><b>“A reader lives a thousand lives before he dies. The man who never reads -lives only one.”</b></p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <?php 
      $item_qty=$fetch_products['quantity'];
      ?>
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs<?php echo $fetch_products['price']; ?></div>
      <div class="quantity"><h2><?php echo $fetch_products['quantity']; ?> items remaining</h2></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type ="hidden" name="stock_quantity" value="<?php echo $fetch_products['quantity']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <?php
      if($item_qty<1){
          ?>
      <input type="submit" value="No items" name="no_item" class="btn">
      <?php }
      else
      { ?>
           <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      <?php }?>
     </form>
      <?php
         }  
      }
      else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Hot products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY sold DESC LIMIT 6" ) or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <?php $item_qty=$fetch_products['quantity']; ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs<?php echo $fetch_products['price']; ?></div>
      <div class="quantity"><h2><?php echo $fetch_products['quantity']; ?> items remaining</h2></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <?php
      if($item_qty<1){
          ?>
      <input type="submit" value="No items" name="no_item" class="btn">
      <?php }
      else
      { ?>
           <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      <?php }?>
     </form>
      <?php
         }  
      }
      else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop2.php" class="option-btn">load more</a>
   </div>

</section>

<!--<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>-->

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>For any questions and issues, please contact us with. Our support staff are always there to help you with your issues.</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>
<?php 
include 'footer.php'; 
?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>