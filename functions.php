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