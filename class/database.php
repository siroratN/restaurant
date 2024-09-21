<?php
require_once 'DatabaseInterface.php';
class Database implements DatabaseInterface{
    private $db;

    public function __construct() {
        $this->db = new SQLite3('../db/res.db');
    }

    public function query($sql) {
        return $this->db->query($sql);
    }

    public function fetchArray($result) {
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function escapeString($string) {
        return $this->db->escapeString($string);
    }
}
