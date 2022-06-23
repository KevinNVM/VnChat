<?php 

const db_host = 'localhost';
const db_username = 'root';
const db_password = '';
const db_name = 'chat-app-2';

$db = mysqli_connect(db_host, db_username, db_password, db_name) or die('Database Connection Failed');