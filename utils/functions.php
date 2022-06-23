<?php 
include 'db.php';

// Databse

function getAll($table = 'messages') {
    global $db;
    $query = mysqli_query($db, "SELECT * FROM $table");
    $result = [];
    while ($data = mysqli_fetch_assoc($query)) {
        $result[] = $data;
    }

    return $result;
}

function query($query) {
    global $db;
    $query = mysqli_query($db, $query);
    $result = [];
    while ($data = mysqli_fetch_assoc($query)) {
        $result[] = $data;
    }

    return $result;
}

function insertData($data) {
    global $db;
    $fullname = htmlspecialchars($data['fname'].' '.$data['lname']);
    $username = htmlspecialchars($data['username']);
    $uid = mt_rand(0, 1000000);
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    // echo '<pre>' . var_export($uid, true) . '</pre>'; die;


    $sql = "INSERT INTO `users` (`user_id`, `unique_id`, `fullname`, `username`, `email`, `password`, `img`, `status`) VALUES (NULL, '$uid', '$fullname', '$username', '$email', '$password', 'default.jpg', 'Offline')";
    mysqli_query($db, $sql);

    return mysqli_affected_rows($db);
}

function addContact($uid, $rawContact) {
    global $db;
    $contact = query("SELECT user_id FROM users WHERE unique_id = $rawContact ")[0] or die;
    $r_uid = query("SELECT user_id FROM users WHERE unique_id = $uid ")[0] or die;
    
    $sql = "INSERT INTO `contacts` (`id`, `user_uid`, `contact_id`) VALUES (NULL, '$uid', '{$contact['user_id']}') ";
    $sql2 = "INSERT INTO `contacts` (`id`, `user_uid`, `contact_id`) VALUES (NULL, '{$rawContact}', '{$r_uid['user_id']}' )";
    mysqli_query($db, $sql);
    mysqli_query($db, $sql2);

    return mysqli_affected_rows($db);
} 

function insChat($data) {
    global $db;
    $sender = $data['sender'];
    $receiver = $data['receiver'];
    $msg = $data['message'];

    $query = "INSERT INTO `messages` (`msg_id`, `receiver_msg_id`, `sender_msg_id`, `msg`, `created_at`) VALUES (NULL, '$receiver', '$sender', '$msg', current_timestamp()) ";
    $sql = mysqli_real_escape_string($db , $query);
    // echo '<pre>' . var_export($sql, true) . '</pre>'; die;

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}