<?php
$sent = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$name    = htmlspecialchars($_POST['name'] ?? '');
	$email   = htmlspecialchars($_POST['email'] ?? '');
	$subject = htmlspecialchars($_POST['subject'] ?? '');
	$message = htmlspecialchars($_POST['message'] ?? '');

	$to = "aman.jain@example.com"; // 🔴 change this
	$mail_subject = "New Contact Form Message";

	$body = "
	New Contact Form Submission

	Name: $name
	Email: $email
	Subject: $subject

	Message:
	$message
	";

	$headers = "From: $email";

	mail($to, $mail_subject, $body, $headers);

	$sent = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $sent ? "Thank You" : "Contact"; ?></title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: #f5f5f5;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.box {
			background: #fff;
			padding: 30px;
			text-align: center;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			max-width: 400px;
			width: 100%;
		}
		.btn {
			display: inline-block;
			margin-top: 20px;
			padding: 10px 20px;
			background: #007bff;
			color: #fff;
			text-decoration: none;
			border-radius: 5px;
			border: none;
			cursor: pointer;
		}
		.btn:hover {
			background: #0056b3;
		}
		input, textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

<div class="box">

<?php if ($sent): ?>

	<h2>Thank You! 🙏</h2>
	<p>Your message has been sent successfully.<br>We’ll get back to you soon.</p>
	<a href="javascript:history.back()" class="btn">Go Back</a>

<?php else: ?>

	<h2>Contact Us</h2>
	<form method="POST">
		<input type="text" name="name" placeholder="Name*" required>
		<input type="email" name="email" placeholder="Email*" required>
		<input type="text" name="subject" placeholder="Subject">
		<textarea name="message" rows="5" placeholder="Message*" required></textarea>
		<button type="submit" class="btn">Submit</button>
	</form>

<?php endif; ?>

</div>

</body>
</html>
