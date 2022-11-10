<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header1.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Books4U aims to provide books required to a reader in an affordable price. Our deliveries are quick and never fail to dissapoint our customers with our availability of products.</p>
         <p>The satisfaction of our customers is our main priority.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>The wide seelction of books among famous authors with the attractive price tags is the reason I always keep coming back to this site. Their service is not like any other higly recommended.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Adam Jones</h3>
      </div>

      <div class="box">
         <img src="images/author-2.jpg" alt="">
         <p>I was looking for a specific book named "The First and Last Freedom" and seeing it available here made me really happy. This site has books no other sites are sellling so its my goto for any books.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Elisa Smith</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>This bookstore has the widest number of authors along with their earliest works. This has helped me a lot with my research and my college studies. I am grateful for this site for its quick and easy availability.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Maynard James</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>My friend recommended this site to me and it was the best recommendation I ever received. I have using this bookstore for nearly 2 years and their service is top quality and cannot be compared with any other.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Amelia Murray</h3>
      </div>

      <div class="box">
         <img src="images/author-1.jpg" alt="">
         <p>I have always been a skeptic when it comes to online shopping but this bookstore site has removed all my doubts, their instant delivery and cheap rates has made me come back here time ang again. Higly recommended.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Steven Wilson</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>I had a damaged book and I reached out to the site they were quick to respond and handle the issue with delicacy I was even compensated for the mishap and they were well delivered later. I am satisfied with their service.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Kristen Holland</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">About Us</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/abhi.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/2ez4ab/" class="fab fa-facebook-f" target="_blank"></a>
            <a href="https://twitter.com/Mel85362879" class="fab fa-twitter" target="_blank"></a>
            <a href="https://www.instagram.com/abnavv/" class="fab fa-instagram" target="_blank"></a>
            <a href="https://www.linkedin.com/in/abhinav-shakya-0523821ab/" class="fab fa-linkedin" target="_blank"></a>
         </div>
         <h3>Abhinav Shakya</h3>
      </div>

      <div class="box">
         <img src="images/swasti.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/swastii.karki" class="fab fa-facebook-f" target="_blank"></a>
            
            <a href="https://www.instagram.com/imswastee/" class="fab fa-instagram" target="_blank"></a>
            
         </div>
         <h3>Swastika Karki</h3>
      </div>

      <div class="box">
         <img src="images/pradeep.png" alt="">
         <div class="share">
            <a href="https://www.facebook.com/Floydph0biaisreal" class="fab fa-facebook-f" target="_blank"></a>
  
            <a href="https://www.instagram.com/llamapradeep/" class="fab fa-instagram"target="_blank"></a>
    
         </div>
         <h3>Pradeep Lama</h3>
      </div>

      <div class="box">
         <img src="images/rachana.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/profile.php?id=100006408798113" class="fab fa-facebook-f" target="_blank"></a>
            
            
            
         </div>
         <h3>Rachana Pandeya</h3>
      </div>


   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>