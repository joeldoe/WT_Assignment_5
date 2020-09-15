<?php

// Importing databaseClass.php file
require "databaseClass.php";

// Checking if the request if legit or not
$request = $_GET['req'] ?? null;

if($request)
{
	// Creating an object
	try
	{
		$registration = new Workshop;
	}
	catch(Exception $e)
	{
		echo "Error occurred in database connection:";
		echo json_encode([$e->getMessage()]);
		return;
	}

	// Checking the type of request
	switch($request)
	{
		case 'create':  $date = $_GET['timestamp'];
						$name = $_GET['name'];
						$email = $_GET['email'];
						$phone = $_GET['phone'];
						$age = $_GET['age'];
						$workshop = $_GET['workshop'];
						$slot = $_GET['slot'];
						echo $registration->create_table();
						echo $registration->insert_row($date,$name,$email,$phone,$age,$workshop,$slot);
						break;

		case 'insert':  $date = $_GET['timestamp'];
						$name = $_GET['name'];
						$email = $_GET['email'];
						$phone = $_GET['phone'];
						$age = $_GET['age'];
						$workshop = $_GET['workshop'];
						$slot = $_GET['slot'];
						echo $registration->insert_row($date,$name,$email,$phone,$age,$workshop,$slot);
						break;

		case 'read': 	echo $registration->read_table();
						break;

		default: echo json_encode(['Invalid request']);
				 break;
	}
}

?>