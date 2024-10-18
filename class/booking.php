<?php
require_once 'database.php';

class Booking
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getBookingIdsByDate($date)
    {
        $escapedDate = $this->db->escapeString($date);
        $query = "SELECT booking_id FROM booking WHERE booking_date = '$escapedDate'";
        return $this->db->query($query);
    }
}
?>
