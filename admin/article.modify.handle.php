<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>modify-handle</title>
</head>
<body>
	<?php 
		require_once('../connect.php');
		function filterWords($str)
	    {
	        $farr = array(
	                "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
	                "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
	                "/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
	        );
	        $str = preg_replace($farr,'',$str);
	        return $str;
	    }
		//获取表单里的信息
		$deadline = time();
		$id = $_POST['id'];
		$title = filterWords($_POST['title']);
		$author = filterWords($_POST['author']);
		$description = filterWords($_POST['description']);
		$content = filterWords($_POST['content']); 

		//将数据更新数据库中
		$updatesql = "update article set title = '$title', author = '$author', description = '$description', content = '$content', deadline = $deadline where id = $id";
		if (mysql_query($updatesql)) {
			echo "<script>alert('文章更新成功');window.location.href='article.manage.php'</script>";
		}else{
			echo "<script>alert('文章更新失败');window.location.href='article.manage.php'</script>";
		}
	?>
</body>
</html>