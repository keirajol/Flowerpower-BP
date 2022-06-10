<?php
require_once('Database.Class.php');

class Layouts extends Database
{
    private array $styleSheets = [
        'header',
        'footrt',
        'homepage'
        ];

    public function getCSS()
    {
        foreach($this->styleSheets as $styleSheet)
        {
            echo "<link href=CSS/'$styleSheet.css' rel='stylesheet'/>";
        }
    }

    public function getHeader()
    {
        echo "
        <nav class='navbar header'>
            <img alt=''LOGO'/>
            <a>Home<a/>
            <a>Contact<a/>
            <div class='dropdown'>
                <button class='dropbtn'>Dropdown</button>
                <div class='dropdown-content'>
                    <a href='loginCustomer.php'>Login</a>
                    <a href='registerCustomer.php'>Register</a>
                </div>
            </div>
        <nav/>
        ";
    }
}