<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Chi tiết sản phẩm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="detail.css" >
    </head>
    <body>
        <?php
        include './connect_db.php';
        $result = mysqli_query($data, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);
       

        ?>
        <div class="container">
            <div class="pname"><h2>Chi tiết sản phẩm</h2></div><br>
            <div class="flex-box"> <div class="left">
                <div class="big-img">
                    <img src=".<?= $product['image'] ?>" style="width: 27rem; height: 20rem;" >
                </div>
            </div>
        </div>  

    <div  class="right">
    <div class="pname"><h2><?=$product['name']?></h2></div><br>
    <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </div>
    <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br/>
    <div class="size">
             <p>Size</p>
             <div class="psize active">S</div>
             <div class="psize">M</div>
             <div class="psize">L</div>
           </div>
           <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
            <input type="text" value="1" name="quantity[<?=$product['id']?>]" size="2" /><br/>
            <p></p>   
            <input type="submit" value="Mua sản phẩm" />
                    </form>
                    <?php if(!empty($product['images'])){ ?>
                    <div id="gallery">
                        <ul>
                            <?php foreach($product['images'] as $img) { ?>
                                <li><img src="<?=$img['path']?>" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <div class="clear-both"></div>
                <?=$product['content']?>
            </div>
        </div>
    </body>
</html>