<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add-handle</title>
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
		    $title = filterWords($_POST['title']);
		    $author = filterWords($_POST['author']);
		    $description = filterWords($_POST['description']);
		    $content = filterWords($_POST['content']); 

			//将数据插入数据库的表中
			$insertsql = "insert into article(title, author, description, content, deadline) values(
							'$title','$author','$description','$content',$deadline)";
			if (mysql_query($insertsql)) {
				echo "<script>alert('文章发布成功');window.location.href='article.add.php'</script>";
			}else{
				echo "<script>alert('文章发布失败');window.location.href='article.add.php'</script>";
			}
		 ?>
	</body>
</head>
</html>