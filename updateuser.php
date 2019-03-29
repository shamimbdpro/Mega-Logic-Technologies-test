<?php 

 include_once('config.php');

   if(isset($_POST['update'])){
   $id=$_POST['id'];
  $name=$_POST['name'];
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $update = "UPDATE  user SET name='$name',username='$username',email='$email',password='$password' WHERE id='$id' ";
if (mysqli_query($conn, $update)) {
	
/* write user.json file  */
	
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

/* end write user.json file */
	
  $msg1='Data Updated Sucessfully';
  header('Location:userlist.php');
  
} else {
	echo "Error updating record: " . mysqli_error($conn);
}
 
	 
   }

?>