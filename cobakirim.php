<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tilangonline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM datatilang ORDER BY tgl_tilang ASC";
$result = $conn->query($sql);
$check = mysqli_fetch_array($res);

if(isset($check)){
echo 'success';
}else{
echo 'failure';
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$pesan = "Nomor Tilang Anda : ".$row['id'];
    }
} else {
    echo "0 results";
}
$conn->close();

$nohp = $_POST['nohp'];
	
// proses kirim sms via HTTP API
include 'apifunction.php';
$response = sendsms($nohp, $pesan);
				
?> 