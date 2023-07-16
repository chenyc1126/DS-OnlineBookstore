<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_users'])){
   $update_id = $_POST['update_id'];
   $update_name = $_POST['update_name'];
   $update_email = $_POST['update_email'];
   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email='$update_email' WHERE id = $user_id") or die('updatedie');
   $message[] = '資料更新';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>顧客資料</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>顧客資料</h3>
   <p> <a href="home.php"><b>首頁</b></a> <b> / 顧客資料</b> </p>
</div>

<section class="shopping-cart">
   <h1 class="title">個人資料</h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('123d');
         if(mysqli_num_rows($select_users) > 0){
            while($fetch_users = mysqli_fetch_assoc($select_users))
            {            
      ?>
      <div class="box">
         <div class="name"><b>顧客姓名 ：<?php echo $fetch_users['name']; ?></b></div>
         <div class="name"><b>信箱：<?php echo $fetch_users['email']; ?></b></div>
      </div>
      <?php
         }
      }
      ?>
   </div>
   
   

   <div class="box-container">
   <div class="box">
      <h1 style="font-size:3em;"><b>更新資料</h1></b>
      <?php
      
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');       
   
      ?>
      <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
         <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="更新姓名">
         <input type="text" name="update_email" value="<?php echo $fetch_update['eemail']; ?>" class="box" required placeholder="mail">
         <input type="submit" value="更新" name="update_users" class="btn">
      </form>
   </div>
   </div>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>