<?php
class DB
{
    private $db;

    public function __construct()
    {
        $this->db = new SQLite3('../db/res.db'); // กำหนดเส้นทางไปยังฐานข้อมูล res.db
        $this->db->busyTimeout(500000); // ตั้งเวลา timeout
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }

    public function escapeString($string)
    {
        return $this->db->escapeString($string);
    }

    public function lastErrorMsg()
    {
        return $this->db->lastErrorMsg();
    }

    public function close()
    {
        $this->db->close();
    }

    public function prepare($sql)
    {
        return $this->db->prepare($sql);
    }
}
?>
