<?php
include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
   header('location:login.php');
};



if(isset($_POST['add_coupon'])){
   $coupon_id = mysqli_real_escape_string($conn, $_POST['coupon_id']);
   $amount = $_POST['amount'];
   $select_coupon_name = mysqli_query($conn, "SELECT coupon_id FROM `discount` WHERE coupon_id = '$coupon_id'") or die('query failed');
   if(mysqli_num_rows($select_coupon_name) > 0){
      $message[] = 'coupon name already added';
   }else{
      $add_coupon_query = mysqli_query($conn, "INSERT INTO `discount`(coupon_id, amount) VALUES('$coupon_id', '$amount')") or die('query failed');
   }
}



if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `discount` WHERE coupon_id = '$delete_id'") or die('query failed');
   header('location:admin_coupon.php');
}



if(isset($_POST['update_product'])){
   $update_coupon_id = $_POST['update_coupon_id'];
   $update_amount = $_POST['update_amount'];
   mysqli_query($conn, "UPDATE `discount` SET coupon_id = '$update_coupon_id', amount = '$update_amount'  WHERE coupon_id = '$update_coupon_id'") or die('query failed');
   header('location:admin_coupon.php');
}



?>



<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

   

<?php include 'admin_header.php'; ?>



<!-- product CRUD section starts  -->



<section class="add-coupons">
   <h1 class="title">折扣券總覽</h1>
   <form action="" method="post" enctype="multipart/form-data">
      <h3>新增折扣券</h3>
      <input type="text" name="coupon_id" class="box" placeholder="輸入折扣券名稱" required>
      <input type="number" min="0" name="amount" class="box" placeholder="輸入折扣(打幾折)" required>
      <input type="submit" min="0" value="新增折扣券" name="add_coupon" class="btn">
   </form>
</section>



<!-- product CRUD section ends -->



<!-- show products  -->



<section class="show-coupons">
   <div class="box-container">
      <?php
         $select_coupons = mysqli_query($conn, "SELECT * FROM `discount`") or die('query failed');
         if(mysqli_num_rows($select_coupons) > 0){
            while($fetch_coupons = mysqli_fetch_assoc($select_coupons))
            {
      ?>
      <div class="box">
         <div class="name">折扣券名稱:<?php echo $fetch_coupons['coupon_id']; ?></div>
         <div class="price">折扣(打幾折):<?php echo $fetch_coupons['amount']; ?></div>
         <a href="admin_coupon.php?delete=<?php echo $fetch_coupons['coupon_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">刪除</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">尚未新增任何折扣券</p>';
      }
      ?>
   </div>
</section>
<section class="edit-coupon-form">
   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `discount` WHERE coupon_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-coupon-form").style.display = "none";</script>';
      }
   ?>
</section>

<!-- custom admin js file link  -->

<script src="js/admin_script.js"></script>

</body>

</html>