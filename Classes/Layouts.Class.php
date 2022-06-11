<?php
class Layouts
{
    private string $relationship = 'rel="stylesheet"';

    private array $styleSheets = [
        'header',
        'footer',
        'homepage'
        ];

    private function hyperReference(string $path) : string
    {
        $href = 'href=' . "CSS/$path.css";
        return $href;
    }

    public function __construct()
    {
        foreach($this->styleSheets as $styleSheet)
        {
            echo "<link $this->relationship " . $this->hyperReference($styleSheet) . '/>';
        }
    }

    private function logOff()
    {
        if(isset($_POST['log-off']))
        {
            unset($_SESSION['employee']);
            unset($_SESSION['customer']);
        }
        return "<form method='post' action='#'>
                    <input name='log-off' type='submit' value='Log Out' />
                </form>";
    }

    private function getloginState(string $logoutForm)
    {
        if(empty($_SESSION['customer']) && empty($_SESSION['employee']))
        {
            return "<a href='loginCustomer.php' id='login-empty'>Inloggen</a><a href='registerCustomer.php' id='login-empty'>Registreren</a>";
        }

        if(!empty($_SESSION['customer']))
        {
            return "<p id='logged-in'>"
                        . $_SESSION['customer'] . '<br/>' .
                        $logoutForm .
                    "</p>";
        }

        if(!empty($_SESSION['employee']))
        {
            return "<p id='logged-in'>"
                        . $_SESSION['employee'] . '<br/>' .
                        $logoutForm .
                    "</p>";
        }
    }

    public function getHeader(string $addition = '')
    {
        echo "
        <div class='navbar'>
            <img src='../images/FlowerPower.png' alt='logo' class='logo' />
            <h1>FlowerPower</h1>"
            . $this->getloginState($this->logOff()) .
        "</div>";
    }

    public function getContentContainerTop()
    {
        echo "
            <div class='inhoud-incl-menu'>
                <div class='menu'>
                    <button type='button' class='button-menu'>Boeket</button>
                    <button type='button' class='button-menu'>Lossebloemen</button>
                    <button type='button' class='button-menu'>Contact</button>
                </div>
                <div class='content-box'>
            ";
    }

    public function getContentContainerBottom()
    {
        echo "
                </div>
            </div>
            ";
    }
}