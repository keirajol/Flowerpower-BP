<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/RegisterController.Class.php');
    $registerController = new RegisterController('customers');

    require_once('Classes/Layouts.Class.php');
    $layouts = new Layouts();
    ?>
</head>
<body>
    <?php
    $layouts->getHeader;
    ?>
</body>
</html>
