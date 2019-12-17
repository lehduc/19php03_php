<?php include 'database.php';?>
<?php 
	$id = $_GET['id'];
	$sqlDelete = "DELETE FROM users WHERE id = $id";
	if (mysqli_query($connect, $sqlDelete) === TRUE) {
		// chuyen trang
		header('Location: list_users.php');
	}
?>