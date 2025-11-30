<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_album');

class Database {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
    }

    function select($table, $where = null){
        $sql = "SELECT * FROM $table";

        if($where != null){
            $sql .= " WHERE ";
            $row = "";
            foreach($where as $key => $value){
                $row .= "$key='$value' AND ";
            }
            $sql .= substr($row, 0, -5); // hapus " AND "
        }

        $result = $this->connection->query($sql)
            or die("SQL Error: " . $this->connection->error);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
