<?php
$servername = "localhost";
$username = "root";
$password = "12071995a";
$dbname = "test_index";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$data = '';

for($i = 1; $i < 10; $i++){
	$data .= "('a', 1, '2', '3', 'ss'),";
}
$a = rtrim($data, ',');
$sql = "INSERT INTO product (name, cat_id, partner_id, region_id, description) VALUES {$a}";
$msc = microtime(true);
if ($conn->query($sql) === TRUE) {
	$msc = microtime(true)-$msc;
    echo "New record created successfully";
	echo "Thoi gian thuc hien: ";
	echo $msc . ' s'."<br/>"; // in seconds
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
