<?php

if(!$_POST) {
    $error = "The service is currently unavailable. Please try again later.";
    header("Location: error.php?m=$error");
    die();
}

require_once('includes/database.php');

//user inputs 
$firstname = $conn->real_escape_string(trim($_POST['firstname']));
$lastname = $conn->real_escape_string(trim($_POST['lastname']));
$username = $conn->real_escape_string(trim($_POST['username']));
$password = $conn->real_escape_string(trim($_POST['password']));

//user role
$role = 2;  

//insert statement
$sql = "INSERT INTO users VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role')";

//execute
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Insertion failed: $error = $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();

//start session 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create session vars. user will be rigistered after. 
$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = 2;
$_SESSION['login_status'] = 3;  

//redirect the user to the loginform.php page
header("Location: loginform.php");
