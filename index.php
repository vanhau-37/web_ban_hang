<?php
session_start();
if(!isset($_SESSION["current_user"])){
    header("location: login.php");
    exit;
}
?>
<!--Tạo tìm kiêms-->
<?php
  include './connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="STYLE.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>Cuahangsach</title>
    
    
</head>

<body>
    <!-- <script src="logout.php"></script> -->
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>Clothing Store</a>
            <form action="" method="GET" class="search-form">
                <input type="search" name="texttimkiem" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search" name="timkiem" ></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="#cart-btn" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
                <h4>Xin chào <?= $_SESSION['current_user']?>!</h4>
            </div>

        </div>
        <!-- Tạo header cho các button Trang chủ, fearured,... -->
        <div class="header-2">
            <nav class="navbar">
                <a href="#home">Trang chủ</a> 
                <a href="#arrivals">Váy Công sở</a>
                <a href="#featured">Hàng Mới Về</a> 
                <a href="#sach">Đầm đi tiệc</a>
                <a href="#vanhoc">Hàng Thiết Kế</a>
                <a href="logout.php">Logout</a>
            </nav>
        
        </div>
    </div>
    <!-- Tạo form đăng kí -->
            <div class="login-form-container">
                <div id="close-login-btn" class="fas fa-times"></div>
                <form action="">
                    <h3>sign in</h3>
                    <span>username</span>
                    <input type="email"name="username"class="box" placeholder="enter your email" id="">
                    <span>userpassword</span>
                    <input type="password" name="password" class="box" placeholder="enter your password"id="">
                    <div class="checkbox">
                        <input type="checkbox" name="" id="remember-me">
                        <label for="remeber-me">remember</label>

                    </div>
                    <input type="submit"value="sign in "class="btn">
                    <p>forget password ?<a href="#">click here</a></p>
                    <p>don't have an account ?<a href="#">creat on</a></p>
                </form>
            </div>

    <?php
        include './connect_db.php';
       $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:5;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($data, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($data, "SELECT * FROM `product`");
       $totalRecords = $totalRecords->num_rows;
       $totalPages = ceil($totalRecords / $item_per_page);
    ?>
<!--SALE-->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Upto 75% off</h3>
                <p>Lore ipsum dolor sit amet consectetur adipisicing elit. Magnam deserunt nostrum
                    accusamus.Nam alias sit necessitatibus, aliquid ex minima at
                </p>
                <a href="#" class="btn">shop now</a>
            </div>
            <!-- Thêm hình ảnh các trang sách-->
            <div class=" books-slider">
                <div class="wraper">
                    <a href="#"><img src="image/hinh1.jpg" alt=""></a>
                    <a href="#"><img src="image/hinh2.jpg" alt=""></a>
                    <a href="#"><img src="image/hinh3.jpg" alt=""></a>
                    <a href="#"><img src="image/hinh4.jpg" alt=""></a>
                    <a href="#"><img src="image/hinh5.jpg" alt=""></a>
                    <a href="#"><img src="image/hinh6.jpg" alt=""></a>
    
                </div>

            </div>

        </div>
        
    </section>
    <section class="arrivals" id="arrivals">
    <h1 class="heading"><span>Hàng Mới </span></h1>
    <div class="row">
    <div class="clear-both"></div>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
        <div class="swiper-wrapper">
        <?php
            while ($row = mysqli_fetch_array($products)) {
                ?>
                <div class="box">
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>                    -->
                    <div class="image">
                        <a href="detail.php?id=<?= $row['id'] ?>"> <img src=".<?= $row['image'] ?>" title="<?= $row['name'] ?>" />
                    </div>
                    <div class="content">
                        <h2><strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br/></h2>
                       <div class="price"><p><span><?= number_format($row['price'], 0, ",", ".") ?>đ</span></p></div>
                    </div>
                    <button class="btn"><a href="cart.php">Mua Ngay</a></button> 
                </div>
            <?php } ?>

        
        </div>
    </div>
</section>
    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-plane"></i>
            <div class="content">
                <h3>
                    free shipping
                </h3>
                <p>order over $100</p>

            </div>

        </div>
        <div class="icons">
            <i class="fas fa-clock"></i>
            <div class="content">
                <h3>
                   secure payment
                </h3>
                <p>Secure payment</p>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>
                   returns
                </h3>
                <p>10 days returns</p>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>
                    24/7 support
                </h3>
                <p>call us anytime</p>
            </div>
        </div>
    </section>
    <!--GIO HANG-->
    <!--Sách bán chạy-->
   <!--New Arrivals -->

 
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   
    <script src="script.js"></script>

</body>
</html>
