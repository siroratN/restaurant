<?php
interface DatabaseInterface {
    public function query($sql);
    public function fetchArray($result);
    public function escapeString($string);
    public function prepare($sql);
}
