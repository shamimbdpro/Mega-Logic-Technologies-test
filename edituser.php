<?php 

 include_once('config.php');
 if(isset($_GET['id'])){
	$id=$_GET['id'];
 $sql = "SELECT * FROM user where id='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  
   echo json_encode($row); 
}

 }
 

?>