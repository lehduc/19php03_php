<!DOCTYPE html>
<html>
<head>
	<title>Register form</title>
</head>
<body>
	<?php include 'database.php';?>
	<?php 
		if (isset($_POST['register'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$avatar = 'default.png';
			if ($_FILES['avatar']['error'] == 0) {
				$avatar = $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/'.$avatar);
			}
			$sqlInsert = "INSERT INTO users(username, password, avatar) VALUES ('$username', '$password', '$avatar')";
			if (mysqli_query($connect, $sqlInsert) === TRUE) {
				// chuyen trang
				header('Location: list_users.php');
			}
		}
	?>
	<h1>Register form</h1>
	<form action="#" method="POST" enctype="multipart/form-data">
		<p>
			<input type="text" name="username" placeholder="username">
		</p>
		<p>
			<input type="password" name="password" placeholder="password">
		</p>
		<p>
			<input type="file" name="avatar">
		</p>
		<p>
			<input type="submit" name="register" value="Register">
		</p>
	</form>
</body>
</html>