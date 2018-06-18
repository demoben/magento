<?php
$servername = "localhost";
$username = "root";
$password = "12071995a";
$dbname = "test_index";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

for ($i=1; $i <= 100000 ; $i++) { 
	$sql = "INSERT INTO product (name, cat_id, partner_id, region_id, description)
	VALUES (CONCAT('Product-', ".$i."), ROUND((RAND() * (100-1))+1), ROUND((RAND() * (100-1))+1), ROUND((RAND() * (100-1))+1), MD5(ROUND((RAND() * (3000-1))+1)))";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>