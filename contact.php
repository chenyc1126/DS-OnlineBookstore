<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = '已經送出訊息了!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = '訊息送出成功!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>聯絡我們</h3>
   <p> <a href="home.php">首頁</a> / 聯絡我們 </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>請留下你的留言，會有專人與您聯繫!</h3>
      <input type="text" name="name" required placeholder="輸入姓名" class="box">
      <input type="email" name="email" required placeholder="輸入email" class="box">
      <input type="number" name="number" required placeholder="輸入手機號碼" class="box">
      <textarea name="message" class="box" placeholder="輸入訊息" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="送出" name="send" class="btn">
   </form>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>