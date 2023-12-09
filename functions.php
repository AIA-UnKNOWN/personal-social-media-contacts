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

function insertSocialMedia($conn, $socialMediaData) {
    // Validation for 'platform-name', 'link', 'color
    $error_message = [];
    if (empty($socialMediaData['platform-name'])) $error_message['platform-name'] = 'Platform name is required';
    if (empty($socialMediaData['link'])) $error_message['link'] = 'Link is required';
    if (empty($socialMediaData['color'])) $error_message['color'] = 'Color is required';

    $has_errors = count($error_message) > 0;
    if (!$has_errors) {
        $sqlInsertQuery = "INSERT INTO social_media_platforms (name, link, platform_color) VALUES ('{$socialMediaData['platform-name']}', '{$socialMediaData['link']}', '{$socialMediaData['color']}')";
        try {
            mysqli_query($conn, $sqlInsertQuery);
        } catch(Exception $error) {
            echo $error;
        }
    }

    return $error_message;
}

function getSocialMedias($conn) {
    $socialMedias = [];
    try {
        $sqlSelectQuery = "SELECT * FROM social_media_platforms";
        $result = mysqli_query($conn, $sqlSelectQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($socialMedias, $row);
        }
    } catch(Exception $error) {
        echo $error;
    }

    return $socialMedias;
}