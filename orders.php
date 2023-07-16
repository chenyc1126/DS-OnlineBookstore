<?php 

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
$orders_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM orders WHERE id = '$delete_id'") or die('query failed');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>訂單管理</h3>
   <p> <a href="home.php">首頁</a> / 訂單 </p>
</div>

<section class="placed-orders">

   <h1 class="title">購買的訂單</h1>

   <div class="box-container">

      <?php


// ...

        
         $orders_query = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($orders_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($orders_query)){
      ?>
      <div class="box">
         <p> 日期 <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> 書名 <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> 電話 <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> 地址 <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> 付款方式 <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> 折扣代碼 <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> 運送方式 <span><?php echo $fetch_orders['shipping_method']; ?></span> </p>
         <p> 你的訂單<span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> 總金額 <span>$<?php echo $fetch_orders['discounted_price']; ?></span> </p>
         <p> 付款狀態 <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         <a href="orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('確認刪除訂單?');" class="delete-btn">刪除</a>
         </div>
     



      <?php
       }
      }else{
         echo '<p class="empty">還沒有訂購任何書籍唷!快點加入購物車吧!</p>';
      }
      ?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>