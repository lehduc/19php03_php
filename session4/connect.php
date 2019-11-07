<?php 
	// thong tin ket noi database
	$server = ''; //$server = '127.0.0.1'
	$username = ''; // username default
	$password = ''; // password default
	$database = ''; // ket noi den database nay
	
	// thuc hien ket noi database
	$connect = mysqli_connect($server, $username, $password, $database);

	// kiem tra ket noi database
	if ($connect === FALSE) {
		echo "Connect fail ".mysqli_connect_error();
	}

	// du lieu dung de chen vao users
	$name = 'huynh duc'; // $name = $_POST['name'];
	$decription = 'the-kite';
	$price = '5000';
	$avatar = 'default.png';
	$datepost = '2019/11/01';
	$dateover = '2019/11/05';
	$category = 'cate2' ;

	// cau lenh insert du lieu
	$sql = "INSERT INTO product (name, decription, price, avatar, datepost, dateover, category ) VALUES ('$name', '$decription', '$price', '$avatar', '$datepost', '$dateover', '$category')";

	// thuc thi cau lenh 
	if (mysqli_query($connect, $sql) === FALSE) {
		echo "error";
	} 

?>