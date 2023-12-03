<?php

include('functions.php');

// Database config
$database = [
    'SERVER' => 'localhost',
    'USERNAME' => 'root',
    'PASSWORD' => '',
    'DB_NAME' => 'hmsc'
];
// Creates 'users' table
$createUsersTableSql = "CREATE TABLE IF NOT EXISTS `{$database['DB_NAME']}`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `profile_picture_url` VARCHAR(500) NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB;";
// Creates 'social_media_platforms' table
$createSocialMediaPlatformsTableSql = "CREATE TABLE IF NOT EXISTS `{$database['DB_NAME']}`.`social_media_platforms` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `link` VARCHAR(500) NOT NULL , `platform_color` VARCHAR(10) NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$connection = null;
// Trying to connect to the database with the provided credentials
try {
    $connection = mysqli_connect(
        $database['SERVER'],
        $database['USERNAME'],
        $database['PASSWORD'],
        $database['DB_NAME']
    );
} catch(mysqli_sql_exception) {
    echo "Could not connect to the database. Please check your credentials";
}

if ($connection) {
    // Executes sql for creating tables
    createTableIfNotExists($connection, $createUsersTableSql);
    createTableIfNotExists($connection, $createSocialMediaPlatformsTableSql);
}