<?php
abstract class Database
{
    private string $host = 'localhost';
    private string $dbname = 'flowerpower';
    private string $username = 'root';
    private string $password = '';

    protected PDO $connection;

    public function __construct()
    {
        try
        {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
}