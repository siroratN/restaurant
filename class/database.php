<?php
class DB
{
    private $db;

    public function __construct()
    {
        $this->db = new SQLite3('../db/res.db');
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }

    public function escapeString($string)
    {
        return $this->db->escapeString($string);
    }
}
?>

