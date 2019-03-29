<?php 
 $servername = "localhost";
$username = "root";
$password = "";
$database = 'mytest';
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}  
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}   
   
   // The Installation URL   like [https://wwww.example.com
    $url= 'http://localhost';
	// The main path (if installed at root type ' ' else type '/foldername' )
	$path= '/1/n';
	
    // Full path url
	$fullpath=$url.$path;
  
?>