<?php include_once "header.php"?>
<h1>Contact us</h1>
<p>We are here to answer any questions you may have about the Mars Move fitness program. Just send us a message <br> in the form below.</p>

    <header class="body">
    </header>

<?php
    $name = $_POST['name'];
    $email = $_POST['message'];
    $message = $_POST['message'];
    $from = 'From: MarsMove_contact';
    $to = 'msosef@yahoo.com';
    $subject = 'Hello';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    if ($_POST['submit']) {
        if (mail ($to, $subject, $body, $from)) {
            echo '<p>Your message has been sent!</p>';
        } else {
            echo '<p>Something went wrong, go back and try again!</p>';
        }
    }
?>

    <section class="body">
        <form method="post" action="contact.php">
            <label>Name</label>
            <input name="name" placeholder="Type Here">

            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here">

            <label>Message</label>
            <textarea name="message" placeholder="Type Here"></textarea>

            <input id="submit" name="submit" type="submit" value="Submit">
        </form>
    </section>

    <footer class="body">
    </footer>

<?php include_once "footer.php"?>