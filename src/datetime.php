<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Reservations</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Buhid&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap');

    @font-face {
        font-family: myWebFont;
        src: url(MN\ DONBURI.ttf);
    }

    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Noto Sans Thai", sans-serif;
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
        color: #eeee;
        font-weight: 600;
    }

    .nav {
        width: 50%;
        padding-left: 20%;
        padding-right: 3%;
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
        color: #eeee;
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
        background-color: #eeee;
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

    body {
        min-height: 100vh;
        background: url(https://images.unsplash.com/photo-1571866735550-7b1ae3bdb144?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat;
        background-size: cover;
        background-position: center;
        color: white;
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 40px;
        height: 70vh;
    }

    .date {
        width: 500px;
        height: 60px;
        padding: 8px;
        border: 1px solid black;
        border-radius: 14px;
    }

    .btn-primary {
        width: 200px;
        padding: 8px 16px;
        border-radius: 9px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        transition: transform 0.2s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }
</style>

<body>
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
    <div class="content">
    <br><br><br>
    <h1 class="text-6xl">เลือกวันและเวลาจอง</h1>
    <form action="" method="POST" class="form">
        <div>
            <label for="date" class="">วันที่ - Required</label><br>
            <input type="date" id="date" class="date" name="date" style="color:black;" required>
        </div>
        <div>
            <label for="time" class="">เวลา - Required</label><br>
            <select id="time" name="time" class="date" style="color:black;" required>
                <option value="12:00-13:00">12:00-13:00</option>
                <option value="13:00-14:00">13:00-14:00</option>
                <option value="14:00-15:00">14:00-15:00</option>
                <option value="15:00-16:00">15:00-16:00</option>
                <option value="16:00-17:00">16:00-17:00</option>
            </select>
        </div>
        <div>
            <label for="amount" class="">จำนวนคน - Required</label><br>
            <select id="amount" name="amount" class="date" style="color:black;" required>
                <option value="1">1 คน</option>
                <option value="2">2 คน</option>
                <option value="3">3 คน</option>
                <option value="4">4 คน</option>
                <option value="5">5 คน</option>
                <option value="6">6 คน</option>
                <option value="7">7 คน</option>
                <option value="8">8 คน</option>
            </select>
        </div>
        <button name="sub" class="btn-primary">ยืนยัน</button>
    </form>
</div>
</body>
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("date").setAttribute("min", today);
</script>

</html>