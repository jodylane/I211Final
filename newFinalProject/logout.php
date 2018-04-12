<?php
//start session 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset vars
$_SESSION = array();

//delete cookie
setcookie(session_name(), "", time() - 3600);

//destroy the session
session_destroy();


$page_title = "Indianapolis Library Logout";

include ('includes/header.php');
?>
<div class="wrapper">
<h2>Logout</h2>
<p>Thank you. You are now logged out.</p>
</div>
    <?php
include ('includes/footer.php');
