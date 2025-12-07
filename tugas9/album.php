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
    $result = $this->db->select("tb_album", ["id_album" => $id]); 
    return $result[0];
    }

    public function updateAlbum($id, $data) {
        return $this->db->update("tb_album", $data, ["id_album" => $id]);
    }

    public function deleteAlbum($id) {
        return $this->db->delete("tb_album", ["id_album" => $id]);
    }
}

