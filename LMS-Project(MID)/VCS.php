<?php
		// Start session
		session_start();

		// Check if user is not logged in
		if (!isset($_SESSION['userid'])) {
			// Redirect to login page
			header('Location: Validate card.php');
			exit;
		}

		// Check if form is submitted
		if (isset($_POST['submit'])) {
			// Get form data
			$cardid = $_POST['cardid'];
			$duration = $_POST['duration'];

			// Validate input
			$errors = [];
			if (empty($cardid)) {
				$errors[] = "Card ID is required";
			} else {
				// Check if card has already been used
				$file = fopen('payment.txt', 'r');
				$used_cards = [];
				while ($line = fgets($file)) {
					$data = json_decode($line, true);
					$used_cards[] = $data['cardid'];
				}
				fclose($file);

				if (in_array($cardid, $used_cards)) {
					$errors[] = "Card has already been used";
				}
			}
			if (empty($duration)) {
				$errors[] = "Duration is required";
			}

			// Process payment
			if (empty($errors)) {
				// Calculate total amount
				$amount = 500;

				// Store payment data in file
				$data = [
					'cardid' => $cardid,
					'userid' => $_SESSION['userid'],
					'duration' => $duration,
					'amount' => $amount,
					'timestamp' => date('Y-m-d H:i:s')
				];
				$file = fopen('payment.txt', 'a');
				fwrite($file, json_encode($data) . "\n");
				fclose($file);

				// Redirect to success page
				header('Location: success.php');
				exit;
			}
		}
	?>