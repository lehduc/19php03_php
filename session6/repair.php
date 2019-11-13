<!DOCTYPE html>
<html>
<head>
	<title>Repair news</title>
	<meta charset="utf-8">
</head>
<body>
<?php include 'connectdb.php' ?>
<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM news WHERE id = $id";
	$result = mysqli_query($connect, $sql);
	$editNews = $result->fetch_assoc();
	$errTitle = $errDes = $errAvatar = '';
	$title = $editNews['title'];
	$description = $editNews['description'];
	$avatar = $editNews['avatar'];
	$checkRepair = true;
	if (isset($_POST['repair'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    if ($title == '') {
      $errTitle = 'Please input title';
      $checkRepair = false;
    }
    if ($description == '') {
      $errDes = 'Please input description';
      $checkRepair = false;
    }
    //kiem tra title hien huu
    if (checkExistTitle($title, $connect)) {
      $errTitle = 'Product title exist';
      $checkRepair = false;
    }
    if ($_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] > 102400) {
      $errAvatar = 'Please select a photo less than 100kb';
      $checkRepair = false;
    }
    if ($checkRepair) {
      // check and upoad image
      if ($_FILES['avatar']['error'] == 0) {
        $oldAvatar = $avatar;
        $avatar = uniqid().'_'.$_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/'.$avatar);
        // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
        if ($oldAvatar != 'default.jpg') {
          unlink("uploads/products/".$oldAvatar);  
        }
      }
      // end image upload
      $sql = "UPDATE news SET title = '$title', description = '$description', avatar = '$avatar' WHERE id = $id";
      if (mysqli_query($connect, $sql) === TRUE) {
        header("Location: list_product.php");
      } else {
          echo "Add product fail";
        }
    }
  }  
?>
<h1>Repair News</h1>
<form>
	<p>
		<input type="text" name="title" placeholder="repair title">
		<span class="error"><?php echo "$errTitle" ?></span>
	</p>
	<p>
		<input type="text" name="description" placeholder="description title">
		<span class="err"><?php echo "$errDes" ?></span>
	</p>
	<p>
		<input type="file" name="avatar">
		<span class="err"><?php echo "$errAvatar" ?></span>
	</p>
	<p>
		<input type="submit" name="repair" value="Repair">
	</p>
</form>
</body>
</html>