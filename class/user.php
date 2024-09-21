<?php
// classes/User.php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($email, $password) {
        $email = $this->db->escapeString($email);
        $password = $this->db->escapeString($password);
        // echo $password;
        // if ($email == "gangnam@gmail.com" && $password == "gangnammanager") {
        //     // header("Location: manage/home-manager.php");
        //     exit;
        // } elseif ($email == "chef@gmail.com" && $password == "chef123") {
        //     // header("Location: chefroom.php");
        //     exit;
        // } elseif ($email == "reciep@gmail.com" && $password == "reciep123") {
        //     // header("Location: reciep/booking.php");
        //     exit;
        // }

        $sql = "SELECT * FROM customers WHERE email = '$email'";
        $result = $this->db->query($sql);
        $user = $this->db->fetchArray($result);

        if ($user['password'] == $password) {
            session_start();
            $_SESSION['cus_id'] = $user['cus_id'];
            header('Location: ../src/datetime.php');
            exit;
        } else {
            echo "Invalid email or password.";
            
        }
    }

    public function register($firstName, $lastName, $email, $phone, $username, $password) {
        $firstName = $this->db->escapeString(string: $firstName);
        $lastName = $this->db->escapeString(string: $lastName);
        $email = $this->db->escapeString(string: $email);
        $phone = $this->db->escapeString(string: $phone);
        $username = $this->db->escapeString(string: $username);
        $password = $this->db->escapeString(string: $password);

        $sql = "INSERT INTO customers (first_name, last_name, email, phone, username, password) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$username', '$password')";
        return $this->db->query($sql);
    }
}
