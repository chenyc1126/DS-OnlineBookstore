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
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p><b> 我要 <a href="login.php">登入</a> | <a href="register.php">註冊</a>  </b></p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><b> 交大書局</b></a>

         <nav class="navbar">
            <a href="home.php"><b>首頁</b></a>
            <a href="about.php"><b>關於我們</b></a>
            <a href="search_page.php"><b>商品總覽</b></a>
            <a href="contact.php"><b>聯絡我們</b></a>
            <a href="orders.php"><b>訂單管理</b></a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>使用者： <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="edit.php" class="white-btn">edit</a>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>