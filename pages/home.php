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
    include('../functions.php');

    if (empty($_SESSION['username'])) {
        header('Location: signin.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
        logout();
    }
    ?>

    <div class="min-h-screen pb-[50px]">
        <div class="min-h-[200px] bg-[#E9E9E9]"></div>
        <div class="h-[200px] w-[200px] rounded-full mx-auto -mt-[100px] overflow-hidden shadow-lg">
            <img
                src="https://avatars.githubusercontent.com/u/63773715?s=400&u=08ff2e23aff8f7d9d331732d3f393a4036a74cfd&v=4"
                alt="Ajboy Ian Abordo picture"
            />
        </div>
        <div class="flex justify-center mt-[65px] mb-[53px]">
            <form
                action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                method="post"
                class="w-[200px]"
            >
                <input
                    type="submit"
                    name="logout"
                    value="Logout"
                    class="block cursor-pointer w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
                >
            </form>
        </div>
        <div class="flex justify-center mt-[65px] mb-[53px]">
            <form
                action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                method="post"
                class="p-[25px] rounded-[10px] border-[1px] border-[#EAEAEA] w-[500px]"
            >
                <div class="flex flex-col gap-[10px]">
                    <div>
                        <label
                            for="platform-name"
                            class="block mb-[10px]"
                        >Platform Name</label>
                        <input
                            type="text"
                            name="platform-name"
                            id="platform-name"
                            class="block w-full bg-[#E9E9E9] h-[40px] rounded-[10px] px-[10px] outline-none"
                            autofocus
                        >
                    </div>
                    <div>
                        <label
                            for="link"
                            class="block mb-[10px]"
                        >Link</label>
                        <input
                            type="text"
                            name="link"
                            id="link"
                            class="block w-full bg-[#E9E9E9] h-[40px] rounded-[10px] px-[10px] outline-none"
                        >
                    </div>
                </div>
                <div class="mt-[40px]">
                    <input
                        type="submit"
                        name="add"
                        value="Add"
                        class="block w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
                    >
                </div>
            </form>
        </div>
        <p class="text-center text-[32px] font-[700] mb-[35px]">Ajboy Ian Abordo | Social Media Links</p>
        <ul class="flex justify-center items-center flex-wrap gap-[20px] max-w-[950px] mx-auto">
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <li class="min-w-[230px] rounded-[10px] bg-[#E9E9E9]">
                    <a
                        href="platform/<?= $i ?>"
                        target="_blank"
                        rel="noopener"
                        class="flex justify-center items-center min-h-[40px] w-full"
                    >Platform <?= $i ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    
</body>
</html>