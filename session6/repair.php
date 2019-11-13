<!DOCTYPE html>
<html>
<head>
	<title>Repair news</title>
	<meta charset="utf-8">
	<meta name="description" content="this is repair news">
	<meta name="keywords" content="PHP, mysql">
</head>
<body>
<?php 
    include 'connectdb.php';
    include 'functions.php';
    // lay thong tin trong bang news can edit ra
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $editNews = $result->fetch_assoc();
    //
    $errTitle = $errDes = $errAvatar = '';
    $title = $editNews['title'];
    $description = $editNews['description'];
    $avatar = $editNews['avatar'];
    $checkAdd = true;
    if (isset($_POST['repair'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      if ($title == '') {
        $errTitle = 'Please input title';
        $checkAdd = false;
      }
      if ($description == '') {
        $errDes = 'Please input description';
        $checkAdd = false;
      }
      if (checkExistTitle($title, $connect)) {
        $errTitle = 'news title exist';
        $checkAdd  = false;
      }
      if ($_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] > 102400) {
        $errAvatar = 'Please select a photo less than 100kb';
        $checkAdd = false;
      }
      //
      if ($checkAdd) {
        // check and upoad avatar
        if ($_FILES['avatar']['error'] == 0) {
          $oldAvatar = $avatar;
          $avatar = uniqid().'_'.$_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/'.$avatar);
          // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
          if ($oldAvatar != 'default.jpg') {
            unlink("uploads/".$oldAvatar);  
          }
        }
        // end avatar upload
        $sql = "UPDATE news SET title = '$title', description = '$description', avatar = '$avatar' WHERE id = $id";
        if (mysqli_query($connect, $sql) === TRUE) {
          header("Location: list_product.php");
        } else {
          echo "Repair News fail";
        }
      }
    }
    ?>
<h1>Repair News</h1>
<form>
	<p>
		<input type="text" name="title" value="<?php echo $title ?>">
		<span class="error"><?php echo "$errTitle" ?></span>
	</p>
	<p>
		<input type="text" name="description" value="<?php echo $description ?>">
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