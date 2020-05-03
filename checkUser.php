<?php  
 session_start();
//save userid post to session
 $_SESSION['user_id'] = $_POST['user_id'];
 require('config.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
$query1 = "SELECT tokenCount FROM `users` WHERE username='$username' and password='$password'";

	
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$row = mysqli_fetch_assoc($result);
$tokenCount = mysqli_query($connection, $query1) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1 && $_SESSION['user_id'] === 'admin' || $_SESSION['user_id'] === 'admin1' || $_SESSION['user_id'] === 'admin2'){
	header("Location: home.php");
	die;

}
	else if ($count == 1 &&  $_SESSION['user_id'] !== 'admin' && $row['tokenCount'] > 0){
	header("Location: gamePage.php");
	die;

}else if ($count == 1 &&  $_SESSION['user_id'] !== 'admin' && $row['tokenCount'] <= 0){
	header("Location: sorry.php");
	die;
}
	else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
header("Location: index.php");
}
}
?>