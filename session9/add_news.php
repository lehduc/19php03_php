<!DOCTYPE html>
<html>
<head>
	<title>Register Form, them sua xoa</title>
	<meta charset="utf-8">
	<meta name="keywords" content="PHP,mysql">
	<meta name="description" content="this is Add_news form">
</head>
<body>
	<?php include 'connect.php';?>
	
	<?php 
		
		//khoi tao cac gia tri ban dau
		$title = '';
		$description = '';
		$avatar = '';
				
		if (isset($_POST['register'])) {
			$title = $_POST['title'];
			$description = $_POST['description'];
			$avatar = 'default.png';	
					
			
			if ($_FILES['avatar']['error'] == 0) {
				$avatar = $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/'.$avatar);
			}
			$sqlInsert = "INSERT INTO news(title, description, avatar) VALUES ('$title', '$description', '$avatar')";
			if (mysqli_query($connect, $sqlInsert) === TRUE) {
				// chuyen trang
				header('Location: list_news.php');
			}
		}
	?>
	<h1>Register form</h1>
	<form action="#" method="POST" enctype="multipart/form-data">
		<p>
			<input type="text" name="title" placeholder="title">			
		</p>
		<p>
			<textarea name="description" rows="5" cols="30"></textarea>
		</p>
		<p>
			<input type="file" name="avatar">
		</p>
		<p>
			<input type="submit" name="register" value="Add News">
		</p>
	</form>
</body>
</html>