<?php include 'connectdb.php';?>
<?php 
	$id = $_GET['id'];
	$sqlDelete = "DELETE FROM news WHERE id = $id";
	if (mysqli_query($connect, $sqlDelete) === TRUE) {
		// chuyen trang
		header('Location: list_users.php');
	}
?>