<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/main.css">
</head>
<body class="min-h-screen flex justify-center items-center">

    <?php
        session_start();
        include('../database.php');

        if (isset($_SESSION['username'])) {
            header('Location: home.php');
        }

        // Validate fields
        $error_message = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $error_message['username'] = 'Username is required';
            }
            if (empty($_POST['password'])) {
                $error_message['password'] = 'Password is required';
            }
            if (empty($_POST['confirm_password'])) {
                $error_message['confirm_password'] = 'Confirm password is required';
            }
            if (
                !empty($_POST['password']) &&
                !empty($_POST['confirm_password']) &&
                $_POST['password'] != $_POST['confirm_password']
            ) {
                $error_message['confirm_password'] = 'Password does not match';
            }
        }

        // If every field is satisfied, store the username and password to the 'users' table
        $has_errors = count($error_message) > 0;
        if (!$has_errors) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            if (!empty($username) && !empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                try {
                    $result = mysqli_query(
                        $connection,
                        "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')"
                    );
                    
                    // redirect the to the signin page
                    header('Location: signin.php');
                } catch(Exception $error) {
                    mysqli_error($connection);
                }
            }
        }
    ?>

    <form
        action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
        method="post"
        class="p-[25px] rounded-[10px] border-[1px] border-[#EAEAEA] min-w-[359px]"
    >
        <div class="flex flex-col gap-[10px]">
            <div>
                <label
                    for="username"
                    class="block mb-[10px]"
                >Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="block w-full bg-[#E9E9E9] h-[40px] rounded-[10px] px-[10px] outline-none"
                    autofocus
                >
                <?php if (isset($error_message['username'])) { ?>
                    <span class="text-red-500 text-[14px]"><?= $error_message['username'] ?></span>
                <?php } ?>
            </div>
            <div>
                <label
                    for="password"
                    class="block mb-[10px]"
                >Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="block w-full bg-[#E9E9E9] h-[40px] rounded-[10px] px-[10px] outline-none"
                >
                <?php if (isset($error_message['password'])) { ?>
                    <span class="text-red-500 text-[14px]"><?= $error_message['password'] ?></span>
                <?php } ?>
            </div>
            <div>
                <label
                    for="confirm_password"
                    class="block mb-[10px]"
                >Confirm password</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    class="block w-full bg-[#E9E9E9] h-[40px] rounded-[10px] px-[10px] outline-none"
                >
                <?php if (isset($error_message['confirm_password'])) { ?>
                    <span class="text-red-500 text-[14px]"><?= $error_message['confirm_password'] ?></span>
                <?php } ?>
            </div>
        </div>
        <div class="mt-[40px]">
            <input
                type="submit"
                name="signin"
                value="Sign Up"
                class="block w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
            >
            <p class="text-center mt-[10px]">
                Already have an account? <a href="signin.php" class="text-[#6D96FF]">Sign in</a>
            </p>
        </div>
    </form>

</body>
</html>