<?php
$page_title = "User Login";
require_once('includes/header.php');
?>
<div class="wrapper">
<h2>Login or Register for the Indianapolis Library.</h2>

<?php
$message = "Please enter your username and password to login.";

//check the login status
$login_status = '';

if (isset($_SESSION['login_status']))
    $login_status = $_SESSION['login_status'];

//login attempt succeeded
if ($login_status == 1) {
    echo "<p>You are logged in as " . $_SESSION['login'] . ".</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include ('includes/footer.php');
    exit();
}

//login attempt failed
if($login_status == 2) {
    $message = "Username or password invalid. Please try again.";
}

//the user registered
if ($login_status == 3) {
    echo "<p>Thank you for registering with us. Your account has been created.</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include ('includes/footer.php');
    exit();
}

?>
<div class="login-container">
    <div class="login">
        <form method='post' action='login.php'>
            <table>
                <tr>
                    <td colspan="2"><?php echo $message; ?></br><br></td>
                </tr>
                <tr>    
                    <td style="width: 80px">User name: </td>
                    <td><input type='text' name='username' required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type='password' name='password' required></td>
                </tr>
                <tr>
                    <td colspan='2' style='padding: 10px 0 0 85px'>
                        <input type='submit' value='  Login  '>
                        <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = '////.php'" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <br><br><br><br>
    <!-- display the registration form -->
    <div class="registration">
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td colspan="2" align="left">Please create an account.<br><br></td>
                </tr>
                <tr>
                    <td style="width: 85px">First Name: </td>
                    <td><input name="firstname" type="text" required></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input name="lastname" type="text" required></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input name="username" type="text" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input name="password" type="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" style='padding: 10px 0 0 80px' class="bookstore-button">
                        <input type="submit" value="Register" />
                        <input type="button" value="Cancel" onclick="window.location.href = '///.php'" />                    
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
</div>

<?php
include ('includes/footer.php');
