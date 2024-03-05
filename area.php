<!DOCTYPE html>
<?php
session_start();
var_dump($_SESSION);?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>benvenuto nella tua area <?php echo$_SESSION["login"]["nome"]  ?></h2>
    </div>
</body>
</html>
