<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajboy Ian Abordo</title>
</head>
<body>
    <?php include('database.php') ?>
    <?php include('auth.php') ?>
    <?php if ($connection) mysqli_close($connection) ?>
</body>
</html>