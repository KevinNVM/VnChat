<?php 
session_start();

// set status
include 'utils/db.php';
$query = mysqli_query($db,  "SELECT * FROM users WHERE unique_id = {$_SESSION['login']} ");
$assoc = mysqli_fetch_assoc($query);

if ($assoc['status'] !== 'Offline') {
    $sql = "UPDATE `users` SET `status` = 'Offline' WHERE `users`.`user_id` = {$assoc['user_id']}";
} else {
    $sql = "UPDATE `users` SET `status` = 'Offline' WHERE `users`.`user_id` = {$assoc['user_id']}";
}
mysqli_query($db, $sql);

session_destroy();

$_COOKIE = [];

header("Location: login.php");