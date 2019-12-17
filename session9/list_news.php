<!DOCTYPE html>
<html>
<head>
	<title>List News</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
<?php 
	include 'connect.php';
	$sqlSelect = "SELECT * FROM news";
	// Thuc hien chuc nang tim kiem
	$keyword = '';
	if (isset($_POST['search'])) {
		$keyword = $_POST['keyword'];
		// search keyword
		if ($keyword != '') {
			$sqlSelect = "SELECT * FROM news WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
		}
	}

	$result = mysqli_query($connect, $sqlSelect);

?>
	<h1>List News</h1>
	<div id="content">
		<form action="#" method="POST" name="search-news" id="list_form">
			<p class="find">
				Keywords
				<input type="text" name="keyword" value="<?php echo $keyword;?>">
			</p>
			<p class="find">
				<input type="submit" name="search" value="search">
			</p>
			<p class="register"><a href="add_news.php">Register</a></p>
		</form>
		<table class="table table-bordered">
	        <tr>
	          <th style="width: 10px">ID</th>
	          <th>Title</th>
	          <th>Description</th>
	          <th>Avatar</th>
	          <th>Action</th>
	        </tr>
	        <?php 
	        if ($result->num_rows > 0) {
	       	while($row = $result->fetch_assoc()) {
	       		$id = $row['id'];
	        ?>
	        <tr>
	          <td><?php echo $row['id']?></td>
	          <td><?php echo $row['title']?></td>
	          <td><?php echo $row['description']?></td>
	          <td><img src="uploads/<?php echo $row['avatar']?>"></td>
	          <td><a href="edit_news.php?id=<?php echo $id?>">Edit</a> | <a href="delete_news.php?id=<?php echo $id?>">Delete</a></td>
	        </tr>
	        <?php 
	        	}
	        } else {?>
	        <tr>
	        	<td colspan="4">Khong co news nao</td>
	        </tr>
	        <?php }?>
	    </table>
    </div>
</body>
</html>