<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <form href="login.php">
        <input name="username" type="text" placeholder="Username" />
        <input name="password" type="password" placeholder="password" />
        <input name="username" type="text" placeholder="Username" />
        <input name="repeatpassword" type="password" placeholder="repeat password" />
        <input name="register" type="submit" value="Register" />
    </form>
</body>
</html>

<?php
try
{
    if(isset($_POST['register']))
    {
        $registerController->register($_POST['username'], $_POST['password'], $_POST['repeatpassword']);
        header('Location: login.php');
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>