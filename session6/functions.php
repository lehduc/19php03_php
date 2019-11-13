<?php 
	//kiem tra tieu de  ton tai cua tin tuc
    function checkExistTitle($name, $connect){
      $sql = "SELECT title FROM news WHERE title = '$title'";
      $result = mysqli_query($connect, $sql);
      return $result->num_rows;
    }
?>