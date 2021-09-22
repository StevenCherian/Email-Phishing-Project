<!DOCTYPE html>
<html>
<body>
	<h1 style="text-align: center;"><strong>DEMONSTRATION PURPOSES ONLY. DO NOT USE. THIS IS A SCHOOL PROJECT</strong></h1>
	<form action="spoofer.php" method="post">
		<table>
			<tbody>
				<tr>
					<td>Name</td>
					<td><input maxlength="100" name="fromname" type="text"></td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><input name="fromemail" type="email"></td>
				</tr>
				<tr>
					<td>Recipient</td>
					<td><input name="to" type="email"></td>
				</tr>
				<tr>
					<td>Subject</td>
					<td><input maxlength="50" name="subject" type="text"></td>
				</tr>
				<tr>
					<td>Message</td>
					<td>
					<textarea cols="50" maxlength="1000000" name="message" rows="7"></textarea></td>
				</tr>
				<tr>
					<td rowspan="8"><input type="submit"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>

<?php

	$fromname=$_POST['fromname'];
	$fromemail=$_POST['fromemail'];
	$email=$_POST['to'];
	$messagebox=$_POST['message'];
	$subjectbox=$_POST['subject'];

	$from	=  $fromname . ' <'.$fromemail.'> ';
	$replyto 	=  ' <> ';

	$to      = $email;
	$subject = $subjectbox;
	$message = $messagebox;

	$headers  = "From: ".$from . "\r\n";
	$headers .= "Reply-To: ".$replyto . "\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1" . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers .= "X-Priority: 1" . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";

	if (mail($to, $subject, $message, $headers)) echo '<p style="text-align: center;">Sent</p>';

	?>