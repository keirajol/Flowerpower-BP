<?php
require_once('Database.Class.php');
require_once('Layouts.Class.php');

class RegisterController extends Database
{
    private string $table;
    private Layouts $layouts;

    public function __construct(string $table)
    {
        parent::__construct();
        $this->table = $table;

        $this->layouts = new Layouts();
        $this->layouts->getCSS();
    }

    private function isUsernameEmpty(string $username)
    {
        if(strlen(trim($username)) == 0)
        {
            throw new Exception('Please give up a username');
        }
    }

    private function isPasswordEmpty(string $password)
    {
        if(strlen(trim($password)) == 0)
        {
            throw new Exception('Please give up a username');
        }
    }

    private function isPasswordRepeated(string $password, string $repeatedPassword)
    {
        if($password != $repeatedPassword)
        {
            throw new Exception('Passwords must match');
        }
    }

    private function userExists(string $username)
    {
        $statement = $this->connection->prepare("select username from $this->table where username = :username");
        $statement->execute([':username' => $username]);
        if($statement->fetch())
        {
            throw new Exception("$username already exists");
        }
    }

    private function emailExists(string $email)
    {
        $statement = $this->connection->prepare("select email from $this->table where email = :email");
        $statement->execute([':email' => $email]);
        if($statement->fetch())
        {
            throw new Exception("$email already exists");
        }
    }

    public function register(string $username, string $firstName, string $lastName, string $password, string $repeatedPassword, string $email)
    {
        $this->isUsernameEmpty($username);
        $this->isPasswordEmpty($password);
        $this->isPasswordRepeated($password, $repeatedPassword);
        $this->userExists($username);
        $this->emailExists($email);

        $statement = $this->connection->prepare("insert into $this->table (username, first_name, last_name, password, email) values (:username, :first_name, :last_name, :password, :email)");
        $statement->execute([
            ':username' => trim($username),
            ':first_name' => trim($firstName),
            ':last_name' => trim($lastName),
            ':password' => password_hash(trim($password), PASSWORD_DEFAULT),
            ':email' => trim($email)
            ]);
    }
}