<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // ตรวจสอบว่ามีการอัปโหลดไฟล์แล้วหรือไม่
    if (isset($_FILES['slip']) && $_FILES['slip']['error'] == 0) {
        $fileTmpPath = $_FILES['slip']['tmp_name'];  // ตำแหน่งไฟล์ชั่วคราว
        $fileName = $_FILES['slip']['name'];  // ชื่อไฟล์จริง
        $fileSize = $_FILES['slip']['size'];  // ขนาดไฟล์
        $fileType = $_FILES['slip']['type'];  // ประเภทไฟล์

        // กำหนดโฟลเดอร์ปลายทาง
        $uploadFileDir = '../uploaded_slips/';  // สร้างโฟลเดอร์เพื่อเก็บสลิปที่อัปโหลด
        $dest_path = $uploadFileDir . $fileName;  // รวมโฟลเดอร์กับชื่อไฟล์

        // ย้ายไฟล์จากตำแหน่งชั่วคราวไปยังโฟลเดอร์ปลายทาง
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            echo "ไฟล์สลิปถูกอัปโหลดสำเร็จ: $dest_path";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์สลิป.";
        }
    } else {
        echo "ไม่มีการอัปโหลดไฟล์ หรือเกิดข้อผิดพลาด.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>QR Code Payment</title>
    <script>
        function confirmCancel() {
            const userConfirmed = confirm("การยกเลิกการชำระเงินอาจทำให้คุณถูกยึดเงินมัดจำ คุณแน่ใจหรือไม่ว่าจะยกเลิก?");
            if (userConfirmed) {
                // ดำเนินการตามขั้นตอนหลังจากผู้ใช้ยืนยันการยกเลิก
                alert("การจองของคุณถูกยกเลิก");
                // Redirect หรือทำการดำเนินการยกเลิก
                window.location.href = "cancel_booking.php";  // ลิงก์หรือหน้าที่จะให้ผู้ใช้ไปเมื่อยกเลิก
            }
        }
    </script>
</head>

<style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap');

@font-face {
    font-family: myWebFont;
    src: url(MN\ DONBURI.ttf);
}

.all {
    /* background-color: #f4f4f4; */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-bottom: 70px;
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
    /* background-color: rgb(255, 255, 255, 0.1); */
    /* background-color: black; */
    color: black;
    /*พื้นหลัง*/
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

/* ... (your existing CSS code) ... */

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
    /* สร้าง pseudo-element สำหรับเส้นใต้ */
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    /* ปรับความสูงของเส้นใต้ตามต้องการ */
    background-color: black;
    transform: scaleX(0);
    /* ตั้งค่าเริ่มต้นให้เส้นใต้มีความกว้างเป็นศูนย์ */
    transform-origin: bottom right;
    transition: transform 0.5s ease;
    /* เพิ่ม transition property */
}

.nav__link:hover::after {
    transform: scaleX(1);
    /* ขยายเส้นใต้เมื่อวางเมาส์ */
    transform-origin: bottom left;
}

.header__toggle,
.header__close {
    display: none;
}

.headcon {
    margin: 30px 0px 30px 0px;
    font-family: myWebFont;
}

</style>
<body class="bg-gray-100">
<header>
        <div class="logo">
            <img src="logo.png" alt="">
            <a href="" class="header__logo">Gangnam Omakase</a>
        </div>
        <nav class="nav" id="nav-menu">
            <ion-icon name="close-outline" class="header__close" id="close-menu"></ion-icon>
            <ul class="nav__list">
                <li class="nav__item"><a href="home.php" class="nav__link">หน้าหลัก</a></li>
                <!-- <li class="nav__item"><a href="#" class="nav__link">Reservation</a></li> -->
                <li class="nav__item"><a href="history.php" class="nav__link">ประวัติการจอง</a></li>
                <li class="nav__item"><a href="logout.php" class="nav__link">ออกจากระบบ</a></li>
            </ul>
        </nav>
        <ion-icon name="menu-outline" class="header__toggle" id="toggle-menu"></ion-icon>
    </header>

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">QR Code Payment</h2>

            <div class="flex justify-center mb-6">
                <img src="../img/qr.jpg" alt="QR Code" class="w-48 h-48">
            </div>
            <p class="text-gray-700 text-center mb-4">Scan this QR code to make a payment</p>

            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-700">Order Summary</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex justify-between">
                        <span>Omakase Set</span>
                        <span>2000 บาท</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sashimi Plate</span>
                        <span>1000 บาท</span>
                    </li>
                    
                    <li class="flex justify-between font-semibold">
                        <span>Total</span>
                        <span>3000 บาท</span>
                    </li>
                </ul>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
                <div>
                    <label for="slip" class="block mb-1 text-sm font-medium text-gray-700">Upload Payment Slip</label>
                    <input type="file" id="slip" name="slip" accept="image/*" required
                        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="btn btn-primary w-full py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg font-semibold transition duration-300">
                        Confirm Payment
                    </button>
                </div>
            </form>

            <div class="flex justify-center mt-4">
                <button type="button" onclick="confirmCancel()" class="btn btn-secondary w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold transition duration-300">
                    Cancel
                </button>
            </div>
        </div>
    </div>

</body>

</html>
