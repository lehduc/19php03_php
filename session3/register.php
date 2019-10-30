<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register form</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/icon_24h.ico">
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="description" content="This is register form">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
	// code php o day
	//Tao mang key value cho gender va city
	$arrGender = array('male' => 'Male', 'female' => 'Female');
	$arrCity = array('dn' => 'Da Nang', 'qn' => 'Quang Nam');
	// Khoi tao cac bien loi
	$errFullName = '';
	$errEmail = '';
	$errGender = '';
	$errBirthday = '';
	$errCity = '';
	$fullName = '';
	// khoi tao cac gia tri ban dau
	$email = '';
	$gender = '';
	$birthday = '';
	$city = '';
	$checkValidate = true;

	if (isset($_POST['register'])) {
		$fullName = $_POST['fullname'];
		$email = $_POST['email'];
		$gender = isset($_POST['gender'])?$_POST['gender']:'';
		$birthday = $_POST['birthday'];
		$city = $_POST['city'];
		// Xu ly upload avatar
		$avatar = $_FILES['avatar'];
		// khoi tao anh mac dinh
		$avatarName = 'default.png';

		if ($avatar['error'] == 0) {
			// Gan ten cho avatar upload len
			$avatarName = $avatar['name'];
			// Upload file vao thu muc
			move_uploaded_file($avatar['tmp_name'], 'uploads/'.$avatarName);
		}
		// Ket thu xu ly upload avatar
		// validate loi de trong (validate co ban)
		if ($fullName == '') {
			$checkValidate = false;
			$errFullName = 'Please input full name';
		}
		if ($email == '') {
			$checkValidate = false;
			$errEmail = 'Please input email';
		}
		if ($gender == '') {
			$checkValidate = false;
			$errGender = 'Please choose gender';
		}
		if ($birthday == '') {
			$checkValidate = false;
			$errBirthday = 'Please input birthday';
		}
		if ($city == '') {
			$checkValidate = false;
			$errCity = 'Please choose city';
		}

		//In thong tin dang ky ra
		if ($checkValidate) {
			echo "<h2>Thong tin dang ky</h2>";
			echo "Fullname: $fullName <br>";
			echo "Email: $email <br>";
			echo "Birthday: $birthday <br>";
			echo "Gender: $arrGender[$gender] <br>";
			echo "City: $arrCity[$city] <br>";
			echo "<img src='uploads/$avatarName'>";
		}
	}
	// ket thuc ket submit form
	?>
	<h1>Register form</h1>
	<div class="register-form">
		<form action="#" name="registerForm" id="registerForm" method="POST" enctype="multipart/form-data">
			<div class="form-control">
				<div class="label">Fullname</div>
				<div class="input">
					<input type="text" name="fullname" id="fullname" value="<?php echo $fullName?>">
					<span class="error"> <?php echo $errFullName;?> </span>
				</div>
				
			</div>
			<div class="form-control">
				<div class="label">Email</div>
				<div class="input">
					<input type="text" name="email" id="email" value="<?php echo $email?>">
					<span class="error"> <?php echo $errEmail;?> </span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Gender</div>
				<div class="input">
					<input type="radio" name="gender" value="male" <?php echo ($gender == 'male')?'checked':''?>>Male
					<input type="radio" name="gender" value="female" <?php echo ($gender == 'female')?'checked':''?>>Female
					<span class="error"> <?php echo $errGender;?> </span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Birthday</div>
				<div class="input">
					<input type="date" name="birthday" id="birthday" value="<?php echo $birthday?>">
					<span class="error"> <?php echo $errBirthday;?> </span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">City</div>
				<div class="input">
					<select name="city">
						<option value="">Choose city</option>
						<option value="dn" <?php echo ($city == 'dn')?'selected':''?>>Da Nang</option>
						<option value="qn" <?php echo ($city == 'qn')?'selected':''?>>Quang Nam</option>
					</select>
					<span class="error"> <?php echo $errCity;?> </span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Avatar</div>
				<div class="input">
					<input type="file" name="avatar" id="avatar">
				</div>
			</div>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="register" value="Reigster">
				</div>
			</div>
		</form>
	</div>
	<script src="js/common.js"></script>
</body>
</html>