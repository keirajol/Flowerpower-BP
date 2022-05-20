<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <form href="login.php">
        <input name="username" type="text" placeholder="Username" />
        <input name="password" type="password" placeholder="password" />
        <input name="login" type="submit" value="Login" />
    </form>
</body>
</html>

<?php
try
{
    if(isset($_POST['login']))
    {
        $user = $_POST['username'];
        if($loginController->login($user, $_POST['password']))
        {
            $_SESSION['customer'] = $user;
        }
    }
    //echo basename($_SERVER['PHP_SELF']);
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>