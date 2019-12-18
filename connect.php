<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Service = $_POST['Services'];
$Message = $_POST['Message'];
$Phone = $_POST['Phone'];
$Message = $_POST['Date1'];
$Message = $_POST['Time1'];
//DateBase Connection
if(!empty($FirstName) ||!empty($LastName) || !empty($Services)||!empty($Message)||!empty($Phone)||!empty($Date1)||!empty($Time1)){
	$host="localhost";
	$dbUsername ="root";
	$dbPassword ="";
	$dbname="consultation";
}
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error();
}else{
	$SELECT= "SELECT Phone From consultations where Phone=? limit 1";
	$INSERT ="INSERT Into consultations(FirstName,LastName,Services,Message,Phone,Date1,Time1)values(?,?,?,?,?,?,?)";
	//prepare statement
	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param("s"$Phone);
	$stmt->execute();
	$stmt->bind_result($phone);
	$stmt->store_result();
	$stmt = $stmt->num_row;

	if ($rnum==0) {
		$stmt->close();

		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssssiii",$FristName,$LastName,$Services,$Message,$Phone,$Date1,$Time1);
		$stmt->execute();
		echo "sucessfully";
	}else{
		echo "This Phone Number has beed registered";
	}
	$stmt->close();
	$conn->close();
	}
}else{
	echo "All fied are required";
	die();

}
