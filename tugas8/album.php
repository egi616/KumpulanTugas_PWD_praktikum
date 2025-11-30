<?php
require_once 'database.php';

class Album {

    public function __construct() {
        $this->db = new Database();
    }

    public function tampilData() {
        $table = 'tb_album';
        return $this->db->select($table);
    }
}
