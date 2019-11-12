<!DOCTYPE html>
<html>
<head>
	<title>san pham</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="text/css" href="img/tuoitho.jpg">
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="depscription" content="This is register form">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
	// thong tin ket noi database
	$server = 'localhost'; //$server = '127.0.0.1'
	$username = 'root'; // username default
	$password = ''; // password default
	$database = '19php03_infosp'; // ket noi den database nay
	
	// thuc hien ket noi database
	$connect = mysqli_connect($server, $username, $password, $database);

	// kiem tra ket noi database
	if ($connect === FALSE) {
		echo "Connect fail ".mysqli_connect_error();
	}
	//-------------------------------------------------------
	//khoi tao cac bien loi
	$errNameproduct = '';
	$errPrice = '';
	$errAvatar = '';
	//khoi tao cac gia tri ban dau
	$nameProduct = '';
	$price = '';
	$avatar = '';
	//khoi tao bien kiem tra gia tri validate
	$checkValidate = true;
	//-----------------------------------------------------------
	if (isset($_POST['register'])) {
		// du lieu dung de chen vao bang product
		$nameProduct = $_POST['nameproduct'];
		$price = $_POST['price'];
		$avatar = $_FILES['avatar'];
		//lay gia tri ten anh 
		$avatarName = $avatar['name'];
		//validate loi de trong (co ban)
		if ($nameProduct == '') {
				$checkValidate = false;
				$errNameproduct = 'please input name of product';
			}
		if ($price == '') {
				$checkValidate = false;
				$errPrice = 'please input price';
			}
		//khoi tao anh mac định
		$avatarName = 'default.png';
		//var_dump($avatar);
		//xu li su kien upload avatar
		if ($avatar['error'] == 0) {
				//gan ten cho avatar upload len
				$avatarName = $avatar['name'];
				//upload file vao thu muc(tmp_name la bien tam)
				move_uploaded_file($avatar['tmp_name'], 'uploads/'.$avatarName);
			}
		// ket thuc xu li su kien up load avatar

		//---------------------------------------------------------
		//in ra thong tin san pham
		if ($checkValidate) {
			echo "<h2>Thông tin sản phẩm</h2>";
			echo "Name of Product: $nameProduct <br>";
			echo "Price: $price <br>";
			echo "<img src='uploads/$avatarName'> <br>";
		}
		//ket thuc su kien in ra thong tin san pham
		//---------------------------------------------------------	
		// cau lenh insert du lieu
		$sql = "INSERT INTO product1 (name, price, avatar) VALUES ('$nameProduct', '$price', '$avatarName')";
		// thuc thi cau lenh 
		mysqli_query($connect, $sql);	
	}		
	?>
	<h1>Information Product</h1>
	<div class="register-form">
		<form action="#" name="registeFrorm" enctype="multipart/form-data" method="POST">
			<div class="form-control">
				<div class="label">Tên Sản Phẩm</div>
				<div class="input">
					<input type="text" name="nameproduct" id="nameproduct" value="<?php echo $nameProduct?>">
					<span class="error"><?php echo "$errNameproduct"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Giá</div>
				<div class="input">
					<input type="text" name="price" id="price" value="<?php echo $price?>">
					<span class="error"><?php echo "$errPrice"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Avatar</div>
				<div class="input">
					<input type="file" name="avatar" id="avatar">
					<span class="error"><?php echo "$errAvatar"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="input">					
					<input type="submit" name="register" value="Reigster">
				</div>
			</div>
		</form>
	</div>
</body>
</html>