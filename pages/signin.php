<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/main.css">
</head>
<body class="min-h-screen flex justify-center items-center">

    <?php
        $error_message = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $error_message['username'] = 'Username is required';
            }
            if (empty($_POST['password'])) {
                $error_message['password'] = 'Password is required';
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
        </div>
        <div class="mt-[40px]">
            <input
                type="submit"
                name="signin"
                value="Sign In"
                class="block w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
            >
            <p class="text-center mt-[10px]">
                Don't have an account? <a href="signup.php" class="text-[#6D96FF]">Sign up</a>
            </p>
        </div>
    </form>

</body>
</html>