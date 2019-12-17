<!DOCTYPE html>
<html>
<head>
	<title>Edit form</title>
		<style type="text/css">
		img {
			width: 150px;
		}
	</style>
</head>
<body>
	<?php include 'connect.php';?>
	<?php 
		// get old user to edit
		$idEdit = $_GET['id'];
		
		$sqlEdit = "SELECT * FROM news WHERE id = $idEdit";
		$dataEdit = mysqli_query($connect, $sqlEdit);
		$edit = $dataEdit->fetch_assoc();
	  // end get old
		if (isset($_POST['edit'])) {
			$title = $_POST['title'];
			$description = $_POST['description'];
			$avatar = $edit['avatar'];
			if ($_FILES['avatar']['error'] == 0) {
				$avatar = $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/'.$avatar);
			}
			$sqlEditData = "UPDATE news SET title = '$title',description = '$description', avatar = '$avatar' WHERE id = $idEdit";
			if (mysqli_query($connect, $sqlEditData) === TRUE) {
				// chuyen trang
				header('Location: list_news.php');
			}
		}
	?>
	<h1>Edit form</h1>
	<form action="#" method="POST" enctype="multipart/form-data">
		<p>
			<input type="text" name="title" placeholder="title" value="<?php echo $edit['title']?>">
		</p>
		<p>
			<input type="text" name="description" placeholder="description" value="<?php echo $edit['description']?>">
		</p>
		<p>
			<input type="file" name="avatar">
			<img src="uploads/<?php echo $edit['avatar']?>">
		</p>
		<p>
			<input type="submit" name="edit" value="Edit">
		</p>
	</form>
</body>
</html>