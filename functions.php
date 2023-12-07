<?php

function createTableIfNotExists($conn, $sqlQuery) {
    if (!$conn) {
        return null;
    }

    try {
        mysqli_query($conn, $sqlQuery);
    } catch(Exception $error) {
        echo mysqli_error($conn);
    }
}

function logout() {
    session_destroy();
    header('Location: signin.php');
}