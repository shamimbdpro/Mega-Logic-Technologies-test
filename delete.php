<?php 

 include_once('config.php');
 if(isset($_POST['delete'])){
	$id=$_POST['deleteid'];
	
   $delete="DELETE FROM  user WHERE id='$id'";

if (mysqli_query($conn, $delete)) {
	
	
	/* write user.joson file */
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$response = array();
$posts = array();

while($row = $result->fetch_assoc()) {
  $id=$row['id']; 
  $name=$row['name']; 
  $username=$row['username']; 
  $email=$row['email']; 
  $password=$row['password']; 
  $posts[] =[
  'id'=> $id,
  'name'=> $name,
  'username'=> $username,
  'email'=> $email,
  'password'=> $password,
   ];
}
$response['user'] = $posts;
$fp = fopen('user.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
	/* end user.json file writing */ 
	
    echo "Post deleted successfully";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
  
 }

?>