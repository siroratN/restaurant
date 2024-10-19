<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
include_once '../class/database.php';

class OrderManager
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function updateOrderStatus($order_id, $status = 'cooking')
    {
        // เตรียมคำสั่ง SQL โดยใช้ค่าที่เป็นตัวแปรเพื่อป้องกัน SQL Injection
        $update_query = "UPDATE orders SET order_status = :status WHERE order_id = :order_id";
        $stmt = $this->db->query("UPDATE orders SET order_status = '" . $this->db->escapeString($status) . "' WHERE order_id = '" . $this->db->escapeString($order_id) . "'");

        return $stmt;
    }
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];


    $db = new DB();
    $orderManager = new OrderManager($db);

    // เรียกใช้เมธอด updateOrderStatus เพื่ออัปเดตสถานะของคำสั่ง
    if ($orderManager->updateOrderStatus($order_id)) {
        echo "<script>window.location.href = 'http://localhost/isad/src/order.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะของคำสั่ง: " . $db->lastErrorMsg();
    }

    $db->close();
} else {
    echo "ไม่มีการส่งค่า order_id";
}

?>

</body>

</html>
