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

    public function updateOrderStatus($order_id, $status = 'cooked')
    {
        $update_query = "UPDATE orders SET order_status = :status WHERE order_id = :order_id";
        $stmt = $this->db->prepare($update_query);
        $stmt->bindValue(':status', $status, SQLITE3_TEXT);
        $stmt->bindValue(':order_id', $order_id, SQLITE3_INTEGER);
        
        return $stmt->execute() !== false;
    }
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $db = new DB();
    $orderManager = new OrderManager($db);

    if ($orderManager->updateOrderStatus($order_id)) {
        echo "<script>window.location.href = './order.php';</script>";
        exit;
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
