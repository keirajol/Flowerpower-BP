<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <form action="#" method="post">
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
            $_SESSION['employee'] = $user;
            unset($_SESSION['customer']);
        }
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>