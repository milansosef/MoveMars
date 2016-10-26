<?php include_once "includes/header.php"?>
<?php
session_start();

include_once 'database/dbconnect.php';

//set validation error flag as false
$error = false;

print_r($_POST);

//check if form is submitted
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
        $error = true;
        $username_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        $query = "INSERT INTO gebruikers (username,email,password)
                  VALUES('" . $username . "', '" . $email . "', '" . md5($password) . "')";
        if(mysqli_query($conn, $query)) {
            header("Location: login.php");

        } else {
            $errormsg = mysqli_error($conn) . " Error in registering...Please try again later!";
        }
    } else {
        $errormsg = "Error!";
    }
}
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>User Registration Script</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" >
        <link rel="stylesheet" href="Core/css/MoveMars.css" type="text/css" />
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                    <fieldset>
                        <legend>Sign Up</legend>

                        <div class="form-group">
                            <label for="username">Userame</label>
                            <input type="text" name="username" placeholder="Username" required value="<?php if($error) echo $username; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($username_error)) echo $username_error; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" placeholder="Password" required class="form-control" />
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                            <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        </div>

                        <div class="links"
                        <div class="form-group">
                            <input id="submit" name="submit" type="submit" value="Register">
                        </div>
                    </fieldset>
                </form>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        Already Registered? <a href="login.php">Login Here</a>
                    </div>
                </div>
                <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div>
        </div>

    </div>
    </body>
    </html>

<?php include_once "includes/footer.php"?>
