<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lublei.</title>
    <?php
        wp_head();
    ?>

</head>
<body>
    <nav>
         <ul class="menu">
            <li class="menu_logo"><a href="http://lublei.loc/" class="logo"><img src="<?php echo bloginfo('template_url'); ?>\assets\icons\Logo.jpg " class='Logo_img' alt="logo"></a></li>
                <div class="main_nav">
                    <li class="menu_item"><a href="http://lublei.loc/catalog/" class="menu_link">Каталог</a></li>
                    <li class="menu_item"><a href="#" class="menu_link">Контакты и адрес</a></li>
                    <li class="menu_item"><a href="http://lublei.loc/cart/" class="menu_link">Корзина</a></li>
                    <div class="cart cart box_1">   <?php Lublei_woocommerce_cart_link();?> </div>
                    <li class="menu_item"><a href="https://www.instagram.com/lublei04/" class="menu_link"><img src="<?php echo bloginfo('template_url'); ?>\assets\icons\Instagram.jpg"  alt="inst"></a></li>
                </div>
                <div class="hamburger">
                        <span></span>
                        <span class="distance"></span>
                </div>
            </ul>

    </nav>