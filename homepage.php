<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/Layouts.Class.php');
    $layouts = new Layouts();

    session_start();
    ?>
</head>
<body>
    <?php
    $layouts->getHeader();
    $layouts->getContentContainerTop()
    ?>
        <img src="../images/28d088c891d9e99b75d3ba761e8cd69b.jpg" alt="boeket" class="boeket" />
    <?php
    $layouts->getContentContainerBottom();
    ?>
</body>
</html>
