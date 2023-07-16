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

   <div class="flex">

      <a href="admin_page.php" class="logo"><b>管理<span>後台</span></b></a>

      <nav class="navbar">
         <a href="admin_page.php"><b>首頁</b></a>
         <a href="admin_products.php"><b>產品總覽</b></a>
         <a href="admin_orders.php"><b>訂單管理</b></a>
         <a href="admin_users.php"><b>使用者</b></a>
         <a href="admin_contacts.php"><b>訊息一覽</b></a>
         <a href="admin_coupon.php"><b>折扣券總覽</b></a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>