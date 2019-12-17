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
	<?php include 'connectdb.php';?>
		<?php 
			$sqlSelect = "SELECT * FROM news";
			$result = mysqli_query($connect, $sqlSelect);
		?>
	<?php 
	$html = '';
		while ($row = $result->fetch_assoc()) {
			// khai bao id de de su dung khi edit va delete
			$id = $row['id'];
			$html .='
			<tr>
			 <td>'.$row['id'].'</td>
			 <td>'.$row['title'].'</td>
			 <td>'.$row['description'].'</td>
			 <td><img src="uploads/'.$row['avatar'].'"></td>
			 <td><a href="index.php">Thêm</a></td>
			 <td><a href="delete.php?id='.$id.'">Delete</a></td>
			 <td><a href="repair.php?id='.$id.'">Repair</a></td>
			 </tr>
			';
		}		
	?>
		<?php
		echo $id;
		echo "asdasdasd";
	?>
	<a href="index.php">Register</a>
	<form action="repair.php?id=<?php echo $id ?>" method="POST">
		<p>Search
			<input type="text" name="keyword" placeholder="Please input keyword">
			<input type="submit" name="search" value="Search">
		</p>
	</form>
	
	<table>
		<tr>
			<th>No.</th>
			<th>title</th>
			<th>description</th>
			<th>Avatar</th>
			<th colspan="3">Action</th>
		</tr>
		<?php 
			echo $html;
		 ?>
	</table>
</body>
</html>