<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	$errorMSG = "";

	// NAME
	if (empty($_POST["name"])) {
		$errorMSG = "Name is required ";
	} else {
		$name = $_POST["name"];
	}

	// EMAIL
	if (empty($_POST["email"])) {
		$errorMSG .= "Email is required ";
	} else {
		$email = $_POST["email"];
	}

	// MESSAGE
	if (empty($_POST["message"])) {
		$errorMSG .= "Message is required ";
	} else {
		$message = $_POST["message"];
	}


	$EmailTo = "rhiannon.kaulitzke@gmail.com";
	$Subject = "New message received from Portfolio Website";

	// prepare email body text
	$Body = "";
	$Body .= "Name: ";
	$Body .= $name;
	$Body .= "\n";
	$Body .= "Email: ";
	$Body .= $email;
	$Body .= "\n";
	$Body .= "Message: ";
	$Body .= $message;
	$Body .= "\n";

	// send email
	$success = @mail($EmailTo, $Subject, $Body, "From:".$email);

	// redirect to success page
	if ($success && $errorMSG == ""){
	   echo "success";
	}else{
		if($errorMSG == ""){
			echo "Something went wrong :(";
		} else {
			echo $errorMSG;
		}
	}

?>