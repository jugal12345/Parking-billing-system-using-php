<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE parks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
type VARCHAR(30) NOT NULL,
reg_no VARCHAR(50) NOT NULL,
in_date VARCHAR(20) NOT NULL,
in_time VARCHAR(20) NOT NULL,
out_date VARCHAR(20) NOT NULL,
out_time VARCHAR(20) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table parks created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
