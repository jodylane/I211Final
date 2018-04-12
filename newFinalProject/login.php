<?php

require_once('includes////.php');

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//login status.
$_SESSION['login_status'] = 2;

$username = $passcode = "";

if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate 
$sql = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";


$query = @$conn->query($sql);


if ($query->num_rows) {
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];

    //update the login status
    $_SESSION['login_status'] = 1;
}

$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");
