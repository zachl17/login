<?php
session_start();
$username = $_SESSION['user_id'];

include "config.php";

$query1 = "SELECT `groupId` FROM `users` WHERE username='$username'";

$result1 = mysqli_query($connection, $query1);
$groupId = mysqli_fetch_assoc($result1);
$string_groupId = implode(',', $groupId);

    $sql = "SELECT * FROM `users`
	WHERE NOT username='admin'
	AND NOT username='admin1'
	AND NOT username='admin2'
	AND groupId='$string_groupId';";

	$result = mysqli_query($connection,$sql);

?>

<!doctype html>
<html>

<head>
	<title>Admin Page</title>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

<body id="body_bg">
	<div class="row">
		<div class="col-md-6">
	<h1>Home Page</h1>
		</div>
				<div class="col-md-6">
	<a href='logout.php'>Click here to log out</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>User</th>
					<th>Current Token Count</th>
					<th>New Total Amount of Tokens</th>
					<th></th>
				</tr>
				<?php
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
				<tr>
					<td>
						<?php echo $row["username"]; ?>
					</td>
					<td>
						<?php echo $row["tokenCount"];?>
					</td>
					 <td>

                    <form method="post" action="checkToken.php">
				<input type="text" name="tokenCount" id="tokenCount">		
                        <input type="hidden" name="id" value="<?php echo
     $row["id"]; ?>">
						
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>

</body>

</html>




