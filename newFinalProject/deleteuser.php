<?php
$page_title = "Delete a user account";

require_once ('includes/header.php');
require_once('includes///.php');

//retrieve user id
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM users WHERE user_id=$user_id";

//execute
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "Your account has been deleted.";

$conn->close();

include ('includes/footer.php');