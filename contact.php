<?php include_once "header.php"?>

    <header class="body">
        <h1>Contact us</h1>
        <p>We are here to answer any questions you may have about
            the Mars Move fitness program. Just send us a message
            <br> in the form below.</p>
    </header>

<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$from = 'From: MarsMove';
$to = 'msosef@yahoo.com';
$subject = 'Contact_MarsMove';
$human = $_POST['human'];

$body = "From: $name\n E-Mail: $email\n Message:\n $message";

if ($_POST['submit'] && $human == '4') {
    if (mail ($to, $subject, $body, $from)) {
        echo '<p>Your message has been sent!</p>';
    } else {
        echo '<p>Something went wrong, go back and try again!</p>';
    }
} else if ($_POST['submit'] && $human != '4') {
    echo '<p>You answered the anti-spam question incorrectly!</p>';
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

            <label>*What is 2+2? (Anti-spam)</label>
            <input name="human" placeholder="Type Here">

            <input id="submit" name="submit" type="submit" value="Submit">

        </form>
    </section>

<?php include_once "footer.php"?>