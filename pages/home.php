<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajboy Ian Abordo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/main.css">
</head>
<body>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_destroy();
        header('Location: signin.php');
    }
    ?>

    <h1>Welcome <?= $_SESSION['username'] ?>!</h1>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input class="cursor-pointer" type="submit" name="logout" value="Logout">
    </form>
    
</body>
</html>