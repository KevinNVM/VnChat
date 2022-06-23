<?php 
session_start();

if (!isset($_SESSION['login']) && !isset($_POST['uid'])) {
    header("Location: ../utils/force_logout.php");
} else {
    if (!isset($_POST['sender']) && !isset($_POST['receiver'])) {
    header("Location: ../utils/force_logout.php");
} else {
    if(!isset($_POST['message'])) {
            header("Location: ../utils/force_logout.php");
        } else {


            include '../utils/functions.php';
            insChat($_POST);
        }
    }
}