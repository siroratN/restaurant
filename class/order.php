<?php
require_once 'database.php';

class Order
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getOrdersByStatus($bookingId, $status)
    {
        $escapedBookingId = $this->db->escapeString($bookingId);
        $escapedStatus = $this->db->escapeString($status);
        $query = "
            SELECT * 
            FROM orders
            JOIN booking ON orders.booking_id = booking.booking_id
            JOIN table_booking ON table_booking.booking_id = booking.booking_id
            WHERE booking.booking_id = $escapedBookingId
            AND orders.order_status = '$escapedStatus'
        ";
        return $this->db->query($query);
    }
}
?>
