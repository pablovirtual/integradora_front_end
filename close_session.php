/**
 * This script is used to handle user logout by destroying the current session.
 * 
 * Steps:
 * 1. Start the session.
 * 2. Destroy the session to log out the user.
 * 3. Redirect the user to the login page.
 * 
 */
<?php
    session_start();
    session_destroy();
    header("location: login.php");

?>