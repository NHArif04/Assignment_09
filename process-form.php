<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$subject = test_input($_POST["subject"]);
	$message = test_input($_POST["message"]);

	// send email
	$to = "youremail@example.com";
	$headers = "From: $email" . "\r\n" .
	"Reply-To: $email" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$message_body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
	mail($to, $subject, $message_body, $headers);

	// redirect to thank you page
	header("Location: thank-you.html");
	exit();
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
