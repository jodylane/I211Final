<?php
$page_title = "Users details";

require_once ('includes/header.php');
require_once('includes////.php');

//user id
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM users WHERE user_id=" . $user_id;

$query = $conn->query($sql);

$row = $query->fetch_assoc();


//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}
//display results
?>

<h2>User Details</h2>

<table class="userdetails">
    <tr>
        <th>User ID</th>
        <td><?php echo $row['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $row['username'] ?> </td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?php echo $row['firstname'] ?> </td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?php echo $row['lastname'] ?> </td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo $row['role'] ?> </td>
    </tr>
</table>
<p>

<form action="deleteuser.php" onsubmit="return confirm('Are you sure you want to delete the user?')">
    <input type="button" onclick="window.location.href = 'edituser.php?id=<?php echo $row['id'] ?>'" value="Edit">&nbsp;&nbsp;
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'listusers.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
</form>


</p>

<?php

$query->close();

$conn->close();

require_once ('includes/footer.php');
