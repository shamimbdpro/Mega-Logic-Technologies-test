<?php 

   include_once('..\config.php');
   
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $name=$_POST['name'];
	    $username=$_POST['username'];
	    $email=$_POST['email'];
	    $password=$_POST['password'];
	    $confirmpass=$_POST['confirmpass'];
     
	 
	 if($name==''){
		 echo "Name is required";
	 }elseif($username==''){
		 echo "Username is required";
	 }
	 elseif($email==''){
		 echo "Email is required";
	 }
	 elseif($password==''){
		 echo "Email is required";
	 }
	 elseif($confirmpass==''){
		 echo "Email is required";
	 }
	 
	 
	 else{
		 
		$sql = "INSERT INTO user(name, username, email,password)
   VALUES ('$name', '$username', '$email','$password')";
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
		
	}
	
	 }

 }
 
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
$fp = fopen('../user.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
 
 
 
 
?>