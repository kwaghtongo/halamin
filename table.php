<?php include 'conn.php'; ?>
 
<?php
 
// create a variable
$FirstName=$POST['Firstname'];
$LastName=$POST['Lastname'];
$Service=$POST['Service'];
$Phone=$POST['Phone'];
$Date1=$POST['Date1'];
$Time1=$POST['Time1'];
$Messege=$POST['Messege'];
//Execute the query
 
 
mysqli_query($connect,"INSERT INTO consultations (FirstName,LastName,Service,Messege,Phone, Date1, Time1)
		        VALUES ('$FirstName','$LastName','$Service','$Phone','$Date1','$Time1','$Messege')");
				
	if(mysqli_affected_rows($connect) > 0){
	echo "<p>Detail Add</p>";
	echo "<a href="index.html">Go Back</a>";
} else {
	echo "Detail NOT Added<br />";
	echo mysqli_error ($connect);
}
 