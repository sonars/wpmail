<?php
@session_start();
$validationErrors   = [];
if ( isset( $_POST['form_submit'] ) && $_SERVER['REQUEST_METHOD'] === 'POST') {

	$check = intval($_SESSION['first']) + intval($_SESSION['second']);


	require_once '../vendor/phpmailer/PHPMailerAutoload.php';
	require_once 'config.php';

	//server side validations
	if ( empty( $_POST['first_name'] ) ) {
		$validationErrors['first_name'] = "Please enter First Name";
	}
	if (empty( $_POST['last_name'] ) ) {
		$validationErrors['last_name'] = "Please enter Last Name";
	}
	if ( empty( $_POST['email'] ) ) {
		$validationErrors['email'] = "Please enter Email Address";
	} else if ( ! empty( $_POST['email'] ) ) {
		if ( ! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
			$validationErrors['email'] = "Oops! Invalid Email Address";
		}
	}
	if (empty( $_POST['contact_number'] ) ) {
		$validationErrors['contact_number'] = "Please enter Contact Number";
	} else if (! empty( $_POST['contact_number'] ) ) {

		if ( ! filter_var( intval( $_POST['contact_number'] ), FILTER_VALIDATE_INT ) ) {
			$validationErrors['contact_number'] = "Invalid contact number. Only numbers are allowed.";
		}
	}
	if(empty($_POST['captcha'])){
		$validationErrors['captcha'] = 'Captcha Required';
	}else if( $check !== intval($_POST['captcha']) ) {
		$validationErrors['captcha'] = 'Invalid Captcha';
	}


	/**
	 * one or more fields are invalid.
	 * redirect back to form page
	 */
	if(count($validationErrors)) {

		$_SESSION['field_validations'] = $validationErrors;
		header('Location: '.$_POST['_action']);
		exit;
	}



	// initiaize PHP mailer
	$mail = new PHPMailer();

	$mail->SMTPDebug = 0;
	$mail->isSMTP();

	// setup phpmailer
	$mail->SMTPAuth = true;
	$mail->Username = $MAIL_CONFIG['username'];
	$mail->Password = $MAIL_CONFIG['password'];
	$mail->Host     = $MAIL_CONFIG['host'];
	if ( $MAIL_CONFIG['protocol'] ) {
		$mail->SMTPSecure = $MAIL_CONFIG['protocol'];
	}
	$mail->Port = $MAIL_CONFIG['port'];
	$mail->isHTML( true );
	$mail->SMTPOptions = [
		'ssl' => [
			'verify_peer'       => false,
			'verify_peer_name'  => false,
			'allow_self_signed' => true,
		],
	];


	// initilize mail process
	$mail->setFrom( $_POST['email'], $_POST['first_name'] . '' . $_POST['last_name'] );

	$toMails = explode(',',$MAIL_CONFIG['set_to']);
	foreach ($toMails as $to) {
		$mail->addAddress($to);
	}
//	$mail->setFrom( $MAIL_CONFIG['set_to_1'], $MAIL_CONFIG['set_to_name_1'] );
//	$mail->addAddress($MAIL_CONFIG['set_to_1'], $MAIL_CONFIG['set_to_name_1'] );
//	$mail->addCC($MAIL_CONFIG['set_to_2'], $MAIL_CONFIG['set_to_name_2'] );
//	$mail->addAddress( $_POST['email'], $_POST['first_name'] . '' . $_POST['last_name'] );



	$mail->Subject = "Contact mail!!";
	$mail->Body    = "
		Dear {$_POST['first_name'] } {$_POST['last_name']}, <br /> <br>
		<table style=\"width:100 %;\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\">
			<tr>
				<th align=\"left\">Name</th>
				<td align=\"left\">{$_POST['first_name']} {$_POST['last_name']}</td>
			</tr>
			<tr>
				<th align=\"left\">Email Address</th>
				<td align=\"left\">{$_POST['email']} </td>
			</tr>
			<tr>
				<th align=\"left\">Contact Number</th>
				<td align=\"left\">{$_POST['contact_number']}</td>
			</tr>
			<tr>
				<th align=\"left\">Comments</th>
				<td align=\"left\">{$_POST['comments']} </td>
			</tr>
		
		</table>
			<br>
			Regards, <br>
			Admin
	";

	if ( ! $mail->send() ) {
		$_SESSION['error'] = $mail->ErrorInfo;
		//$_SESSION['error'] = $mail->ErrorInfo;
		header('Location: '.$_POST['_action']);

	} else {
		$_SESSION['success'] = $MAIL_CONFIG['success_message'];
		header('Location: '.$_POST['_action']);
	}
}