<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/LoginController.Class.php');
    $loginController = new LoginController('customers');
    session_start();

    require_once('Classes/Layouts.Class.php');
    $layouts = new Layouts();
    ?>
</head>
<body>
    <?php
    $layouts->getHeader();
    $layouts->getContentContainerTop()
    ?>
    
        <form action="loginCustomer.php" method="post">
            <input name="username" type="text" placeholder="Username" />
            <input name="password" type="password" placeholder="Password" />
            <input name="email" type="email" placeholder="E-mail" />
            <input name="login" type="submit" value="Login" />
        </form>
    
    <?php
    $layouts->getContentContainerBottom();
    ?>
</body>
</html>

<?php
if(isset($_POST['login']))
{
    try
    {
        if($loginController->login($_POST['username'], $_POST['password'], $_POST['email']))
        {
            $_SESSION['customer'] = $_POST['username'];
            unset($_SESSION['employee']);
            header('Location: homepage.php');
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>