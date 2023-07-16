<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

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
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>關於我們</h3>
   <p> <a href="home.php">首頁</a> / 關於我們 </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>交大書局</h3>
         <p>國立陽明交通大學（以下簡稱本校），由臺灣頂尖的生醫大學及電資工程大學合而為一，於110年2月正式揭牌，完成合校程序。遠見雜誌於111年評比本校為「未來十年最具潛力的大學」。</p>
         <p>目前有9個校區分布於5個縣市，21個學院，學生人數約2萬人，研究生佔58.5%。</p>
         <a href="contact.php" class="btn">聯絡我們</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">顧客反饋</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.jpg" alt="">
         <p>好棒很棒超級棒</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">合作作家</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/author1-1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/author1-2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/author1-3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/author1-4.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/AUTHOR1-7.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="https://instagram.com/dobdobar_0720?igshid=MjEwN2IyYWYwYw==" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

      <div class="box">
         <img src="images/author1-6.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>嗨嗨嗨嗨</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>