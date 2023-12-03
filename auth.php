<?php

session_start();

if (
    isset($_SESSION['username']) &&
    isset($_SESSION['password'])
) {
    header('Location: pages/signin.php');
} else {
    header('Location: pages/signup.php');
}