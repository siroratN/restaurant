<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Booking Confirmation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap');

        body {
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Lato", sans-serif;
        }

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
            color: black;
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
            color: black;
            font-weight: 600;
        }

        .nav {
            width: 50%;
            padding-left: 20%;
            padding-right: 0%;
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
            color: black;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 5px;
            position: relative;
        }

        .nav__link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: black;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.5s ease;
        }

        .nav__link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #45a049;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #34C83E;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #F45348;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #da190b;
            transform: scale(1.05);
        }

        .all {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        hr {
            width: 100%;
            border: none;
            border-top: 2px solid #000000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        span,
        h5,
        strong {
            font-family: "Noto Sans Thai", sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="">
            <a href="" class="header__logo">Gangnam Omakase</a>
        </div>
        <nav class="nav" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#" class="nav__link">หน้าหลัก</a></li>
                <li class="nav__item"><a href="history.php" class="nav__link">ประวัติการจอง</a></li>
                <li class="nav__item"><a href="logout.php" class="nav__link">ออกจากระบบ</a></li>
            </ul>
        </nav>
    </header>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 py-8">
        <div class="max-w-md bg-white shadow-lg hover:shadow-xl transition duration-300 p-8 rounded-lg">
            <!-- Header -->
            <h5 class="mb-6 text-3xl font-bold text-gray-900 text-center">Booking Confirmation</h5>

            <!-- Booking Details -->
            <ul class="text-lg text-gray-800 space-y-4">
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="font-semibold">Booking ID</span>
                    <span>12</span>
                </li>
                <li class="flex justify-between items-center">
                    <span class="font-semibold">ชื่อ</span>
                    <span>sirorat nambun</span>
                </li>
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="font-semibold">เลขที่นั่ง</span>
                    <span>โต๊ะที่ 1</span>
                </li>
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="font-semibold">วันที่</span>
                    <span>12/12/2024</span>
                </li>
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="font-semibold">เวลา</span>
                    <span>12:00</span>
                </li>
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="font-semibold">ราคา</span>
                    <span>1200 บาท</span>
                </li>
            </ul>

            <!-- Ordered Items -->
            <h6 class="mt-6 text-xl font-semibold text-gray-900">รายการอาหารที่สั่ง</h6>
            <ul class="text-gray-700 space-y-3 mt-3">
                <li class="flex justify-between items-center">
                    <span>Omakase Set</span>
                    <span>1</span>
                    <span class="font-semibold">2000 บาท</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Sashimi Plate</span>
                    <span>2</span>
                    <span class="font-semibold">500 บาท</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Sashimi Plate</span>
                    <span>2</span>
                    <span class="font-semibold">500 บาท</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Sashimi Plate</span>
                    <span>2</span>
                    <span class="font-semibold">500 บาท</span>
                </li>
                <!-- Repeat for more items -->
            </ul>

            <!-- Buttons -->
            <form action="" method="post" class="mt-8">
                <div class="flex justify-between">
                    <button name="cancel" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition duration-300">ยกเลิก</button>
                    <button name="sub" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>