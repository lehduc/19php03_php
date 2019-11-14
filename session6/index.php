<!DOCTYPE html>
<html>
<head>
	<title>Register Form, them sua xoa</title>
	<meta charset="utf-8">
	<meta name="keywords" content="PHP,mysql">
	<meta name="description" content="this is register form">
</head>
<body>
	<?php include 'connectdb.php';?>
	
	<?php 
		$errTitle = '';
		$errDescription = '';
		$errAvatar = '';
		//khoi tao cac gia tri ban dau
		$title = '';
		$description = '';
		$avatar = '';
		//khoi tao bien kiem tra gia tri validate
		$checkValidate = true;
		if (isset($_POST['register'])) {
			$title = $_POST['title'];
			$description = $_POST['description'];
			$avatar = 'default.png';	
			if ($title == '') {
					$checkValidate = false;
					$errTitle = 'please input title';
				}	
			if ($description == '') {
					$checkValidate = false;
					$errDescription = 'please input description';
				}	
			if ($avatar == '') {
				$checkValidate = false;
				$arrAvatar = 'please input avatar';
			}		
			
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
			<span class="error"><?php echo "$errTitle"; ?></span>
		</p>
		<p>
			<input type="text" name="description" placeholder="description">
			<span class="error"><?php echo "$errDescription"; ?></span>
		</p>
		<p>
			<input type="file" name="avatar">
			<span class="error"><?php echo "$errAvatar"; ?></span>
		</p>
		<p>
			<input type="submit" name="register" value="Register">
		</p>
	</form>
</body>
</html>