<!DOCTYPE html>
<html>
<head>
	<title>List news</title>
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
	<h1>List News</h1>
	<a href="index.php">Register</a>
	<form action="#" method="POST">
		<p>Search
			<input type="text" name="keyword" placeholder="Please input keyword">
			<input type="submit" name="search" value="Search">
		</p>
	</form>
	<?php include 'connectdb.php';?>
	<?php 
		$sqlSelect = "SELECT * FROM news";
		$result = mysqli_query($connect, $sqlSelect);
	?>
	<table>
		<tr>
			<th>No.</th>
			<th>title</th>
			<th>description</th>
			<th>Avatar</th>
			<th colspan="3">Action</th>
		</tr>
	
	<?php 
		while ($row = $result->fetch_assoc()) {
			// khai bao id de de su dung khi edit va delete
			$id = $row['id'];
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['description']."</td>";
			echo "<td><img src='uploads/".$row['avatar']."'></td>";
			echo "<td><a href='index.php'>Thêm</a></td>";
			echo "<td><a href='delete.php?id=".$id."''>Delete</a></td>";
			echo "<td><a href='repair.php?id=".$id."''>Repair</a></td>";
			echo "</tr>";
		}
	?>
	</table>
</body>
</html>