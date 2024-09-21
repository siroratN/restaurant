<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cancel Booking</title>
</head>

<body class="bg-gray-100">

    <!-- Container -->
    <div class="flex justify-center items-center min-h-screen">
        <!-- Cancel Card -->
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
            <h2 class="text-3xl font-bold mb-6 text-red-600">Booking Canceled</h2>

            <!-- Warning about deposit -->
            <div class="text-gray-800 mb-6">
                <p>การจองของคุณถูกยกเลิกเรียบร้อยแล้ว</p>
                <p class="font-semibold mt-4">หมายเหตุ: การยกเลิกครั้งนี้อาจทำให้คุณเสียเงินมัดจำตามนโยบายของร้าน</p>
            </div>

            <!-- Back to Homepage Button -->
            <div class="flex justify-center mt-6">
                <a href="login_register.php"
                   class="btn btn-primary w-full py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition duration-300">
                   กลับไปหน้าหลัก
                </a>
            </div>
        </div>
    </div>

</body>

</html>
