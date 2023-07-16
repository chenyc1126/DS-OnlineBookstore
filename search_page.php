<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}




// Get the selected category from the URL parameter
if (isset($_GET['category'])) {
    $selected_category = $_GET['category'];
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = '$selected_category'") or die('query failed');
} else {
    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜尋你想要的書目</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>搜尋你想要的書目</h3>
        <p> <a href="home.php">首頁</a> / 搜尋 </p>
    </div>
    <section class="search-form">
        <form action="" method="post">
            <input type="text" name="search" placeholder="搜尋書名、作者、書本種類、實體書、電子書..." class="box">
            <input type="submit" name="submit" value="搜尋" class="btn">
        </form>
    </section>

    <div class="container">
        <section class="search-menu">
            <div class="categories">
            <b><font size="6">書本種類 </font></b><br>
            <ul>
            <b><font size="5"><a href="?category=文學小說">文學小說</a></font></b><br>
            <b><font size="5" color="blue"><a href="?category=語言學習">語言學習</a></font></b><br>
            <b><font size="5"><a href="?category=心靈成長">心靈成長</a></font></b><br>
            <b><font size="5"><a href="?category=自然科學">自然科學</a></font></b><br>
            <b><font size="5"><a href="?category=商業理財">商業理財</a></font></b><br>
            <b><font size="5"><a href="?category=教育">教育</a></font></b><br>
            <b><font size="5"><a href="?category=飲食與健康">飲食與健康</a></font></b><br>
            <b><font size="5"><a href="?category=旅遊">旅遊</a></font></b><br>
            </ul>
                  </div>
            <div class="products-container">
                <div class="box-container">
                    <?php
                    if (isset($_POST['submit'])) {
                        $search_item = $_POST['search'];
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%' OR author LIKE '%{$search_item}%' OR  type LIKE '%{$search_item}%' OR  category LIKE '%{$search_item}%' ") or die('query failed');
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                                ?>
                                <form action="" method="post" class="box">
                                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
                                    <div class="name"><?php echo $fetch_product['name']; ?></div>
                                    <div class="price">$<?php echo $fetch_product['price']; ?></div>
                                    <div class="author">作者: <?php echo $fetch_product['author']; ?></div>
                                    <div class="edition">版本: <?php echo $fetch_product['edition']; ?></div>
                                    <div class="type">閱讀類型: <?php echo $fetch_product['type']; ?></div>
                                    <div class="category">書本種類: <?php echo $fetch_product['category']; ?></div>
                                    <div class="inventory">庫存: <?php echo $fetch_product['inventory']; ?></div>
                                    
                                    
                                </form>
                        <?php
                            }
                        }
                    }
                    ?>
                    <?php
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                            ?>
                            <form action="" method="post" class="box">
                                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
                                <div class="name"><?php echo $fetch_product['name']; ?></div>
                                <div class="price">$<?php echo $fetch_product['price']; ?></div>
                                <div class="author">作者: <?php echo $fetch_product['author']; ?></div>
                                <div class="edition">版本: <?php echo $fetch_product['edition']; ?></div>
                                <div class="type">閱讀類型: <?php echo $fetch_product['type']; ?></div>
                                <div class="category">書本種類: <?php echo $fetch_product['category']; ?></div>
                                <div class="inventory">庫存: <?php echo $fetch_product['inventory']; ?></div>
                                
                                
                            </form>
                    <?php
                        }
                    } else {
                        echo '<p class="empty">沒有搜尋結果!</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <?php include 'footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>