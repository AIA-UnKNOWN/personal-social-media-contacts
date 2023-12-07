<?php

session_start();

if (isset($_SESSION['username'])) {
    header('Location: pages/home.php');
} else {
    header('Location: pages/signin.php');
}