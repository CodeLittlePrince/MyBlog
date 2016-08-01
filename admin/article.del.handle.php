<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>del-handle</title>
	<body>
		<?php
			require_once('../connect.php');

			$id = $_GET['id'];
			$delsql = "delete from article where id = $id";
			if (mysql_query($delsql)) {
			 	echo "<script>alert('文章删除成功');window.location.href='article.magage.php'</script>";
			 }else{
			 	echo "<script>alert('文章删除失败');window.location.href='article.magage.php'</script>";
			 }
		 ?>
	</body>
</head>
</html>