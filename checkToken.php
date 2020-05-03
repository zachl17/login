<?php  
 session_start();
//saves id and token post to session
 $_SESSION['id'] = $_POST['id'];
 $_SESSION['tokenCount'] = $_POST['tokenCount'];

 require('config.php');

if (isset($_POST['id']) and $_POST['tokenCount']){
	
// Assigning POST values to variables.
$id = $_POST['id'];
$tokenCount = $_POST['tokenCount'];

// CHECK FOR THE RECORD FROM TABLE
	$query = "SELECT * FROM `users` WHERE id='$id'";
	$query1 = "UPDATE users SET tokenCount='$tokenCount' WHERE id='$id'";
 
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
	
	$count = mysqli_num_rows($result);

if ($count == 1){

	header("Location: home.php");
	die;

}else{
echo "<script type='text/javascript'>alert('Users data could not be retrieved from the database.')</script>";
}
}
?>