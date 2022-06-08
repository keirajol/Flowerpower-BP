<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/RegisterController.Class.php');

    $registerController = new RegisterController('customers');
    ?>
</head>
<body>
    <a href="loginCustomer.php">login</a>
    <a href="registerCustomer.php">register</a>
    <h1>
        <?php
        if($_SESSION['customer'] != null)
        {
            echo $_SESSION['customer'];
        }

        if($_SESSION['employee'] != null)
        {
            echo $_SESSION['employee'];
        }
        ?>
    </h1>
</body>
</html>
