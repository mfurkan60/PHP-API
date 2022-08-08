<?php
class Database
{
    // DB Params
    private $host = 'localhost';
    private $db_name = 'apiblog';
    private $username = 'root';
    private $password = '';
    private $db;

    // DB dbect
    public function connect()
    {
        $this->db = null;

        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->db;
    }
}
