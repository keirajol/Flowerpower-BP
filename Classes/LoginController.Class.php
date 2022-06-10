<?php
require_once('Database.Class.php');
require_once('Layouts.Class.php');

class LoginController extends Database
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
            throw new Exception('Please give up a password');
        }
    }

    private function isEmailEmpty(string $username)
    {
        if(strlen(trim($username)) == 0)
        {
            throw new Exception('Please give up a valid email adress');
        }
    }

    private function checkPassword(string $username, string $password, string $email) : bool
    {
        $statement = $this->connection->Prepare("select password from $this->table where username like :username and email like :email");
        $statement->execute([
              ':username' => $username,
              ':email' => $email
            ]);
        $result = $statement->fetch();
        return $result != null && password_verify($password,$result['password']);
    }

    public function login($username, $password, $email) : bool
    {
        $this->isUsernameEmpty($username);
        $this->isPasswordEmpty($password);
        $this->isEmailEmpty($email);
        return $this->checkPassword($username, $password, $email);
    }
}