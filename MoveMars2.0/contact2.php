<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mars Move</title>
	<link rel="stylesheet" type="text/css" href="../css/MoveMars.css">
</head>
<body>

<?php
$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];

$mail_to = 'msosef@yahoo.com';
$subject = 'Message from a site visitor '.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

/*if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'contact_page.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to gordon@template-help.com');
		window.location = 'contact_page.html';
	</script>
<?php
}*/
?>

<form action="contact.php" method="post">
	Your name<br>
	<input type="text" name="cf_name"><br>
	Your e-mail<br>
	<input type="text" name="cf_email"><br>
	Message<br>
	<textarea name="cf_message"><br>
    <input type="submit" value="Send">
    <input type="reset" value="Clear">
</form>

</body>
</html>
