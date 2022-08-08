<?php

class Post
{
    // Databse stuff
    private $db;
    private $table = 'stores';

    // Post Properties
    public $id;
    public $Store_Area;
    public $Items_Available;
    public $Daily_Customer_Count;
    public $Store_Sales;




    // Constructor with DB
    public function  __construct($db)
    {
        $this->db = $db;
    }




    public function read()
    {

        $query = 'SELECT * FROM ' . $this->table . ' LIMIT 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
