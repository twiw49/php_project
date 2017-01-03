<?php  
	define("TITLE", "Contact Us | Franklin's Fine Dining");
	include('includes/header.php');
?>

	<div id="contact">
		<h1>Get in touch with us!</h1>
		<?php  
			function has_header_injection($str) {
				return preg_match( "/[\r\n]/", $str );
			}

			if (isset($_POST['contact_submit'])) {
				$name = trim($_POST['name']);
				$email = trim($_POST['email']);
				$msg = $_POST['message'];

				if (has_header_injection($name) || has_header_injection($email)) {
					die();
				}

				if (!$name || !$email || !$msg) {
					echo '<h2 class="error">All fields required.</h2><a href="contact.php" class="button">Go back and try again</a>';
				}

				$to	= "twiw49@gmail.com";
			
				// Create a subject
				$subject = "$name sent a message via your contact form";
				
				// Construct the message
				$message = "";
				$message .= "Name: $name\r\n";
				$message .= "Email: $email\r\n\r\n";
				$message .= "Message:\r\n$msg";
				
				// If the subscribe checkbox was checked
				if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe' ) {
				
					// Add a new line to the $message
					$message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
					
				}
			
				$message = wordwrap($message, 72); // Keep the message neat n' tidy
			
				// Set the mail headers into a variable
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: " . $name . " <" . $email . ">\r\n";
				$headers .= "X-Priority: 1\r\n";
				$headers .= "X-MSMail-Priority: High\r\n\r\n";

				mail($to, $subject, $message, $headers);
		?>

	
		<!-- Show success message after email has sent -->
		<h2>Thanks for contacting Franklin's!</h2>
		<p>Please allow 24 hours for a response.</p>
		<p><a href="/final" class="button">&laquo; Go to Home Page</a></p>
		
		<?php
			} else {
		?>

		<form method="post" action="" id="contact-form">
			<label for="name">Your name</label>
			<input type="text" id="name" name="name">
			
			<label for="email">Your email</label>
			<input type="email" id="email" name="email">
			
			<label for="message">and your message</label>
			<textarea id="message" name="message"></textarea><br>
			
			<input type="checkbox" id="subscribe" value="Subscribe" name="subscribe"> <label for="subscribe">Subscribe to newsletter</label><br>
			
			<input type="submit" class="button" name="contact_submit" value="Send Message">
		</form>
		
		<?php
			}
		?>
		<hr>
	</div><!-- contact -->	
<?php include('includes/footer.php'); ?>