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
                <!-- <span>Username error</span> -->
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
                <!-- <span>Username error</span> -->
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
                <!-- <span>Username error</span> -->
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