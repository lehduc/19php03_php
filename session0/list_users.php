<!DOCTYPE html>
<html>
<head>
	<title>List users</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 800px;
		}
		table, tr, th, td {
			border: 1px solid black;
		}
		img {
			width: 150px;
		}
	</style>
</head>
<body>
	<h1>List users</h1>
	<a href="register.php">Register</a>
	<form action="#" method="POST">
		<p>Search
			<input type="text" name="keyword" placeholder="Please input keyword">
			<input type="submit" name="search" value="Search">
		</p>
	</form>
	<?php include 'database.php';?>
	<?php 
		$sqlSelect = "SELECT * FROM users";
		$result = mysqli_query($connect, $sqlSelect);
	?>
	<table>
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Avatar</th>
			<th>Action</th>
		</tr>
	
	<?php 
		while ($row = $result->fetch_assoc()) {
			// khai bao id de de su dung khi edit va delete
			$id = $row['id'];
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['password']."</td>";
			echo "<td><img src='uploads/".$row['avatar']."'></td>";
			echo "<td><a href='delete.php?id=".$id."''>Delete</a> | <a href='edit.php?id=".$id."''>Edit</a></td>";
			echo "</tr>";
		}
	?>
	</table>
</body>
</html>