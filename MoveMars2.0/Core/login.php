<?php include_once "includes/header.php"?>

<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'database/dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $username. "' and password = '" . md5($password) . "'");
    echo "success";
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_username'] = $row['username'];
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>

    <!DOCTYPE html>
    <html>
    <head   >
        <title>PHP Login Script</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" >
        <link rel="stylesheet" href="MoveMars.css" type="text/css" />
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                    <fieldset>
                        <legend>Login</legend>

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username" placeholder="Enter username" required class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                        </div>

                        <div class="form-group">
                            <input id="submit" name="submit" type="submit" value="Login">
                        </div>
                    </fieldset>
                </form>
                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                New User? <a href="register.php">Sign Up Here</a>
            </div>
        </div>
    </div>

    </body>
    </html>

<?php include_once "includes/footer.php"?>
