<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

</head>
<body>
<div>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!$_SESSION['email']) {
        header('Location:index.php');
        exit();
    }
    ?>
</div
</body>
</html>
