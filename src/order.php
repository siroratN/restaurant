<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set("Asia/Bangkok");
require_once '../class/booking.php';
require_once '../class/order.php';
$currentDate = date("Y-m-d");
$booking = new Booking();
$order = new Order();
$bookingIdsResult = $booking->getBookingIdsByDate($currentDate);
$wait_result = $order->getOrdersByStatus(1, 'wait');
$cooking_result = $order->getOrdersByStatus(1, 'cooking');
$cooked_result = $order->getOrdersByStatus(1, 'cooked');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu to do</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Lato", sans-serif;
        }

        body {
            background-image: url('1.jpg');
        }

        /* menubar */
        a {
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        header {
            display: flex;
            padding: 1rem 0;
            align-items: center;
            width: 100%;
            background-color: rgb(28, 0, 84)
        }

        .logo {
            width: 50%;
            display: flex;
            align-items: center;
            padding-left: 4%;
        }

        .logo img {
            width: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .header__logo {
            color: #eeee;
            font-weight: 600;
        }

        .nav {
            width: 50%;
            padding-left: 26%;
            padding-right: 3%;
        }

        .nav__list {
            display: flex;
        }

        .nav__item {
            margin: 0 14px;
        }

        .nav__link {
            padding: 10px 0px 5px 0px;
            margin-left: 10px;
            color: #eeee;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 5px;
            position: relative;
        }

        .nav__link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #eeee;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.5s ease;
        }

        .nav__link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .header__toggle,
        .header__close {
            display: none;
        }



        /* เนื้อหา */
        .content {
            padding: 0px 20px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;

        }

        .content div {
            border-radius: 10px;
            margin: 4px 10px;
            padding: 11px;
            overflow-y: auto;
            max-height: 550px;
        }

        .menu-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-height: calc(100% - 40px);
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <!-- <img src="logo.png" alt="" /> -->
            <a href="" class="header__logo">ร้านอาหาร</a>
        </div>
        <nav class="nav" id="nav-menu">
            <ion-icon name="close-outline" class="header__close" id="close-menu"></ion-icon>
            <ul class="nav__list">
                <li class="nav__item"><i style="color: aliceblue;" class="fa-solid fa-cookie-bite"></i></li>
                <li class="nav__item">
                    <a href="chefroom.php" class="nav__link">ห้อง</a>
                </li>
                <li class="nav__item"><a href="index.php" class="nav__link">ออกจากระบบ</a></li>
            </ul>
        </nav>
        <ion-icon name="menu-outline" class="header__toggle" id="toggle-menu"></ion-icon>
    </header>

    <div style="padding: 20px 80px;">
        <p>วันที่ <?php echo $currentDate ?></p>
    </div>
    <div class="content">

        <div class="wait" style="background-color: rgba(247, 200, 196, 0.26);">
            <p style="padding: 10px 20px;">เมนูที่ต้องทำ</p>
            <?php
            while ($row = $wait_result->fetchArray(SQLITE3_ASSOC)) { ?>
                <div class="menu-card" style="background-color: #F7C7F0 ; font-size: 12px">
                    <form action="" style="display: flex; align-items: center; gap: 10px; width: 350px;" method="post">
                        <input type="checkbox" name="order_id" value="<?php echo $row['order_id'] ?>" onchange="waitingStatus(this)">
                        <label style="width: 110px;  for=""><?php echo $row['menu_name'] ?></label>
                        <!-- <p style=" width: 120px;"> <?php echo $row['course_name'] ?></p> -->
                            <p style="width: 90px;">โต๊ะที่ : <?php echo $row['table_id'] ?></p>
                    </form>
                    <p style="background-color: rgb(244, 255, 86); padding: 3px; font-size: 11px; border-radius: 10px;">Waiting</p>
                </div>
            <?php } ?>
        </div>



        <div class="cooking" style="background-color: rgba(247, 244, 196, 0.266);">
            <p style="padding: 10px 20px;">เมนูที่กำลังทำอยู่</p>
            <?php
            while ($row = $cooking_result->fetchArray(SQLITE3_ASSOC)) { ?>

                <div class="menu-card" style="background-color: #FFD608; font-size: 12px;">
                    <form action="" style="display: flex; align-items: center; gap: 10px; ">
                        <input type="checkbox" name="order_id" value="<?php echo $row['order_id'] ?>" onchange="cookingStatus(this)">
                        <label style="width: 100px;  for=""><?php echo $row['menu_name'] ?></label>
                    <!-- <p style=" width: 90px;"> <?php echo $row['course_name'] ?></p> -->
                            <p>โต๊ะที่ : <?php echo $row['table_id'] ?></p>
                    </form>
                    <p style="background-color: #F3C6E9; padding: 4px; font-size: 11px; border-radius: 10px;"><?php echo $row['order_status'] ?></p>
                </div>

            <?php } ?>
        </div>

        <div class="finish" style="background-color: #D4F6CB31;">
            <p style="padding: 10px 20px;">เมนูที่ทำเสร็จเเล้ว</p>

            <?php
            while ($row = $cooked_result->fetchArray(SQLITE3_ASSOC)) { ?>

                <div class="menu-card" style=" font-size: 12px; background-color: #A6FF8EB5;">
                    <form action="" style="display: flex; align-items: center; gap: 10px; justify-content: space-between; width: 90%">
                        <label style="width: 130px;" for=""><?php echo $row['menu_name'] ?></label>
                        <p style="width: 50px;">โต๊ะที่ : <?php echo $row['table_id'] ?></p>
                    </form>
                </div>
            <?php } ?>
        </div>

    </div>


    <script>
        const navMenu = document.getElementById('nav-menu'),
            toggleMenu = document.getElementById('toggle-menu'),
            closeMenu = document.getElementById('close-menu')

        toggleMenu.addEventListener('click', () => {
            navMenu.classList.toggle('show')
        })
        closeMenu.addEventListener('click', () => {
            navMenu.classList.remove('show')
        })

        function waitingStatus(checkbox) {
            if (checkbox.checked) {
                var order_id = checkbox.value;
                var url = "update_waiting_status.php?order_id=" + order_id;
                window.location.href = url;

            }

        }

        function cookingStatus(checkbox) {
            if (checkbox.checked) {
                var order_id = checkbox.value;
                var url = "update_cooking_status.php?order_id=" + order_id;
                window.location.href = url;
            }
        }
    </script>

</body>

</html>