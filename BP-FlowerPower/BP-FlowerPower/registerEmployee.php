<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/RegisterController.Class.php');

    $registerController = new RegisterController(basename($_SERVER['PHP_SELF']));
    ?>
</head>
<body>
    <form href="login.php">
        <input name="username" type="text" placeholder="Username" />
        <input name="fname" type="text" placeholder="First Name" />
        <input name="lname" type="text" placeholder="Last Name" />
        <input name="password" type="password" placeholder="Password" />
        <input name="repeatpassword" type="password" placeholder="Repeat Password" />
        <input name="email" type="email" placeholder="E-mail" />
        <input name="register" type="submit" value="Register" />
    </form>
</body>
</html>

<?php
try
{
    if(isset($_POST['register']))
    {
        $registerController->register($_POST['username'], $_POST['fname'], $_POST['lname'], $_POST['password'], $_POST['repeatpassword'], $_POST['email']);
        header('Location: login.php');
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>