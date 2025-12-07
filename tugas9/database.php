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

    public function select($table, $where = null) {
        $sql = "SELECT * FROM $table";

        if ($where != null) {
            $sql .= " WHERE ";
            $row = "";
            foreach ($where as $key => $value) {
                $row .= "$key='" . $this->connection->real_escape_string($value) . "' AND ";
            }
            $sql .= substr($row, 0, -5);
        }

        $result = $this->connection->query($sql)
            or die("SQL Error: " . $this->connection->error);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($table, $data) {
        $columns = implode(",", array_keys($data));
        $values = "'" . implode("','", array_map([$this->connection, 'real_escape_string'], array_values($data))) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->connection->query($sql);
    }

    public function update($table, $data, $where) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key='" . $this->connection->real_escape_string($value) . "',";
        }
        $set = rtrim($set, ",");

        $cond = "";
        foreach ($where as $key => $value) {
            $cond .= "$key='" . $this->connection->real_escape_string($value) . "' AND ";
        }
        $cond = rtrim($cond, " AND ");

        $sql = "UPDATE $table SET $set WHERE $cond";
        return $this->connection->query($sql);
    }

    public function delete($table, $where) {
        $cond = "";
        foreach ($where as $key => $value) {
            $cond .= "$key='" . $this->connection->real_escape_string($value) . "' AND ";
        }
        $cond = rtrim($cond, " AND ");

        $sql = "DELETE FROM $table WHERE $cond";
        return $this->connection->query($sql);
    }
}
