<!DOCTYPE html>
<html>
<head>
	<title>Register - bai 6</title>
	<style type="text/css">
		.error {
			color: red;
		}
		#container {
			border: 1px solid grey;
			width: 300px;
			height: auto;
			background: #00FFFF;
			font-size: 20px;
		}
		h1 {
			color: red;
			text-align: center;
		}
		.panel {
			/*float: left;*/
			margin-right: 20px;
		}
	</style>
</head>
<body>
	<?php
		$arrCity = array(
				'quangnam' => 'Quang Nam',
				'danang' => 'Da Nang',				
			);
		$arrGenderEn = array(
			'male' => 'Male',
			'female' => 'Female',
		);
		
		$errName = '';
		$errEmail = '';
		$errBithday = '';
		$errCity = '';
		$errGender = '';
		// Khoi tao gia tri ban dau
		$name = '';
		$email = '';
		$city = '';
		$gender = '';
		$bithday = '';

		// bien check loi
		$checkRegister = true;
		if (isset($_POST['register'])) {
			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$gender  = isset($_POST['gender'])?$_POST['gender']:'';
			$bithday = $_POST['bithday'];
			$city    = $_POST['city'];
			if ($name == '') {
				$errName = 'Please input your name';
				$checkRegister = false;
			}
			if ($email == '') {
				$errEmail = 'Please input your email';
				$checkRegister = false;
			}
			if ($gender == '') {
				$errGender = 'Please choose your gender';
				$checkRegister = false;
			}
			if ($city == '') {
				$errCity = 'Please choose your city';
				$checkRegister = false;
			}
			if ($bithday == '') {
				$errBithday = 'Please choose your bithday';
				$checkRegister = false;
			}
			// in ra
			if ($checkRegister) {												
				echo "Name: $name <br> Email: $email <br> City:";
				echo  $arrCity["$city"];
				echo " <br> Birthday: $bithday <br>Gender:";
				echo  $arrGenderEn["$gender"];								
			}
		}
	?>
	
	<form action="#" id="container" method="POST">
		<h1>Register</h1>
		<p class="panel">Name
			<input type="text" name="name" value="<?php echo $name;?>">
		</p>
		<p class="error"><?php echo $errName;?></p>
		<p class="panel">Email
			<input type="text" name="email" value="<?php echo $email;?>">
		</p>
		<p class="error"><?php echo $errEmail;?></p>
		<p class="panel">Gender
			<input type="radio" name="gender" value="male" 
			<?php if($gender == 'male'){ echo "checked";}?>>Male
			<input type="radio" name="gender" value="female"
			<?php echo $gender == 'female'?"checked":'';?>>Female			
		</p>
		<p class="error"><?php echo $errGender;?></p>
		<p class="panel">Birthday
			<input type="date" name="bithday" value="<?php echo $bithday;?>">
		</p>
		<p class="error"><?php echo $errBithday;?></p>
		<!-- <p class="panel">City
			<select name="city">
				<option value="" <?php echo $city == ''?"selected":'';?>>Please choose city</option>
				<option value="danang" <?php echo $city == 'danang'?"selected":'';?>>Da Nang</option>
				<option value="quangnam" <?php echo $city == 'quangnam'?"selected":'';?>>Quang Nam</option>				
			</select>
		</p> -->
		<div id="demo-content">
    <div class="frmDronpDown">
        <div class="row">
            <label>Country:</label><br /> <select name="country"
                id="country-list" class="demoInputBox"
                onchange="getState(this.value);">
                <option value="" disabled="" selected="">Select Country</option>
                <option value="1">Brazil</option>
                <option value="2">China</option>
                <option value="3">France</option>
                <option value="4">India</option>
                <option value="5">USA</option>
            </select>
        </div>
        <div class="row">
            <label>State:</label><br /> <select name="state"
                id="state-list" class="demoInputBox"
                onChange="getCity(this.value);">
                <option value="">Select State</option>
            </select>
        </div>
        <div class="row">
            <label>City:</label><br /> <select name="city"
                id="city-list" class="demoInputBox">
                <option value="">Select City</option>
            </select>
        </div>
    </div>
</div>
		<p class="error"><?php echo $errCity;?></p>
		<p><input type="submit" id="register" name="register" value="Register"></p>
	</form>
</body>
</html>