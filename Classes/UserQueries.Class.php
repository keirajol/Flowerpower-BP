<?php
require_once('Database.Class.php');

class UserQueries extends Database
{
    private string $table;

    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function queryProfilePic(string $username)
    {
        $statement = $this->connection->prepare("select * from $this->table where username = :username");
        $statement->execute([
            ':username' => $username
            ]);

        while($row = $statement->fetch())
        {
            echo $row['profile_pic'];
        }
    }
}