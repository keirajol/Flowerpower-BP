<html>
<head>
    <title>Home</title>
    <?php
    require_once('Classes/Layouts.Class.php');
    $layouts = new Layouts();

    require_once('Classes/UserQueries.Class.php');

    session_start();

    if(!empty($_SESSION['customer']))
    {
        $userQuery = new UserQueries('customers');
    }

    if(!empty($_SESSION['employee']))
    {
        $userQuery = new UserQueries('employees');
    }
    ?>
</head>
<body>
    <?php
    $layouts->getHeader();
    $layouts->getContentContainerTop()
    ?>

    <img src="<?php 
              if(!empty($_SESSION['customer']))
              {
                  $userQuery->queryProfilePic($_SESSION['customer']);
              }

              if(!empty($_SESSION['employee']))
              {
                  $userQuery->queryProfilePic($_SESSION['employee']);
              }
              ?>"/>

    <?php
    $layouts->getContentContainerBottom();
    ?>
</body>
</html>