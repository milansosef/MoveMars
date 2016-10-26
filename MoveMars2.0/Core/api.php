<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 24-10-2016
 * Time: 16:30
 */

session_start();

include_once 'database/dbconnect.php';

//check if form is submitted
if (isset($_POST['aantal_sprongen'])) {
    if (!$error) {
        $query = "INSERT INTO fitness (program, waarde , gebruikers_id) VALUES(".$_POST['program'].", "._POST['aantal_sprongen'].", 1)";
        if(mysqli_query($conn, $query)) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";

        } else {
            $errormsg = mysqli_error($conn) . " Error in registering...Please try again later!";
        }
    } else {
        $errormsg = "Error!";
    }
}
?>
