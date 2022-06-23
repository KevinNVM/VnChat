<?php 

session_start();

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'chat-app-2';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Functions

function getAll($table = 'messages') {
    global $db;
    $query = mysqli_query($db, "SELECT * FROM $table");
    $result = array();
    while ($data = mysqli_fetch_object($query)) {
        $result[] = $data;
    }
    
    return $result;
}