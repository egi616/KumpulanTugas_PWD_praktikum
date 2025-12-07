<?php
require_once 'database.php';

class Album {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function tampilData() {
        return $this->db->select("tb_album");
    }

    public function tambahAlbum($data) {
        return $this->db->insert("tb_album", $data);
    }

    public function getAlbumById($id) {
    // PENTING: Menggunakan id_album untuk SELECT
    $result = $this->db->select("tb_album", ["id_album" => $id]); 
    return $result[0];
    }

    public function updateAlbum($id, $data) {
        // PENTING: Menggunakan id_album untuk UPDATE
        return $this->db->update("tb_album", $data, ["id_album" => $id]);
    }

    public function deleteAlbum($id) {
        // PENTING: Menggunakan id_album untuk DELETE
        return $this->db->delete("tb_album", ["id_album" => $id]);
    }
}
