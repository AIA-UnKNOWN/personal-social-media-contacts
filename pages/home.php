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
        include('../database.php');

        $is_authenticated = isset($_SESSION['username']);

        // Form handler for logout
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
            logout();
        }

        // Form handler for signin
        if (!$is_authenticated && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
            header('Location: signin.php');
        }

        // Form handler for adding social media link
        $error_message = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
            $data = [
                'platform-name' => filter_input(INPUT_POST, 'platform-name', FILTER_SANITIZE_SPECIAL_CHARS),
                'link' => filter_input(INPUT_POST, 'link', FILTER_SANITIZE_SPECIAL_CHARS),
                'color' => filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS)
            ];
            $error_message = insertSocialMedia($connection, $data);
        }

        // Data for displaying social media contacts
        $socialMedias = getSocialMedias($connection);
    ?>

    <div class="min-h-screen flex flex-col">
        <div class="h-[250px] bg-[#E9E9E9] banner-container">
            <img
                src="https://scontent.fmnl8-3.fna.fbcdn.net/v/t39.30808-6/367491542_150986484705191_2823334243150771748_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=783fdb&_nc_eui2=AeE8RX4xzhJQyhI0kD0L0Q_N7-24sNPI803v7biw08jzTbZtE01eNjFX68mhul3eMF3C-zjz0rETACTZCueg5CUz&_nc_ohc=SOyOT7MWtiwAX8rRq6M&_nc_ht=scontent.fmnl8-3.fna&oh=00_AfDBQHgIJfdyCadxP65iY0ogpQRdJ4Y2OIOQy0SJmBTyeA&oe=6577FA30"
                alt="Background"
                class="object-cover w-full h-full"
            >
        </div>
        <div class="main-content-container flex-1 pb-[50px]">
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
                    <?php if ($is_authenticated) { ?>
                        <input
                            type="submit"
                            name="logout"
                            value="Logout"
                            class="block cursor-pointer w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
                        >
                    <?php } else { ?>
                        <input
                            type="submit"
                            name="signin"
                            value="Sign In"
                            class="block cursor-pointer w-full bg-[#6D96FF] text-white h-[40px] rounded-[10px] px-[10px] outline-none"
                        >
                    <?php } ?>
                </form>
            </div>
            <?php if ($is_authenticated) { ?>
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
                                <?php if (isset($error_message['platform-name'])) { ?>
                                    <span class="text-red-500 text-[14px]"><?= $error_message['platform-name'] ?></span>
                                <?php } ?>
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
                                <?php if (isset($error_message['link'])) { ?>
                                    <span class="text-red-500 text-[14px]"><?= $error_message['link'] ?></span>
                                <?php } ?>
                            </div>
                            <div>
                                <label
                                    for="color"
                                    class="block mb-[10px]"
                                >Color</label>
                                <div class="h-[40px] w-[40px]">
                                    <input
                                        type="color"
                                        name="color"
                                        value="#000"
                                        id="Color"
                                        class="block bg-[#E9E9E9] rounded-[10px] h-full w-full px-[2px] outline-none"
                                    >
                                    <?php if (isset($error_message['color'])) { ?>
                                        <span class="text-red-500 text-[14px]"><?= $error_message['color'] ?></span>
                                    <?php } ?>
                                </div>
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
            <?php } ?>
            <p class="text-center text-[32px] font-[700] mb-[35px]">Ajboy Ian Abordo | Social Media Links</p>
            <ul class="flex justify-center items-center flex-wrap gap-[20px] max-w-[950px] mx-auto">
                <?php foreach ($socialMedias as $socialMedia) { ?>
                    <li
                        class="min-w-[230px] rounded-[10px] bg-[#E9E9E9] text-white"
                        style="background-color: <?= $socialMedia['platform_color'] ?>;"
                    >
                        <a
                            href="<?= $socialMedia['link'] ?>"
                            target="_blank"
                            rel="noopener"
                            class="flex justify-center items-center min-h-[40px] w-full"
                        ><?= $socialMedia['name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    
</body>
</html>