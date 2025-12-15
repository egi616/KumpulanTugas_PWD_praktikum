<?php
require_once 'Connection.php';

class User extends Connection {

    public function login($username, $password) {
        session_start();

        $username = $this->conn->real_escape_string($username);
        $password = md5($password);

        $query = "SELECT * FROM users 
                  WHERE username='$username' 
                  AND password='$password'";
        
        $result = $this->conn->query($query);

        if ($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            $_SESSION['username'] = $data['username'];
            $_SESSION['level']    = $data['level'];

            // Redirect berdasarkan level
            if ($data['level'] == 0) {
                header("Location: halamanA.php");
            } else {
                header("Location: halamanB.php");
            }
        } else {
            return "Username atau Password salah!";
        }
    }
}
