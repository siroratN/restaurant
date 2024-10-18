<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'database.php';

class Reservation {
    private $db;
    private $date;
    private $time;
    private $amount;
    private $cus_id;
    private $booking_status = 'pending';

    public function __construct($db, $cus_id) {
        $this->db = $db;
        $this->cus_id = $cus_id;
    }

    public function setDetails($date, $time, $amount) {
        $this->date = $date;
        $this->time = $time;
        $this->amount = $amount;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCustomerId() {
        return $this->cus_id;
    }

    public function getBookingStatus() {
        return $this->booking_status;
    }

    public function validate() {
        return !empty($this->date) && !empty($this->time) && !empty($this->amount);
    }

    public function save() {
        $query = "INSERT INTO booking (cus_id, booking_date, booking_time, amount, booking_status) 
                VALUES (:cus_id, :booking_date, :booking_time, :amount, :booking_status)";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':cus_id', $this->getCustomerId(), SQLITE3_INTEGER);
        $stmt->bindValue(':booking_date', $this->getDate(), SQLITE3_TEXT);
        $stmt->bindValue(':booking_time', $this->getTime(), SQLITE3_TEXT);
        $stmt->bindValue(':amount', $this->getAmount(), SQLITE3_INTEGER);
        $stmt->bindValue(':booking_status', $this->getBookingStatus(), SQLITE3_TEXT);

        return $stmt->execute();
    }

    public function confirmationMessage() {
        return "Your reservation has been confirmed: Date " . $this->date . ", Time " . $this->time . ", for " . $this->amount . " people.";
    }
}
?>
