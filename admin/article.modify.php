<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>modify</title>
	<style type="text/css">
		html, body, ul, li, div, h3{margin: 0;padding: 0;}
		li{list-style: none;}
		header{font-size: 30px;height:100px;line-height:100px;background-color: #fdc;text-align: center;border: 1px solid #ccc;}
		aside{padding-top: 50px;line-height: 50px; width: 200px;height: 200px;background: cyan;border: 1px solid #ccc;float: left;text-align: center;}
		article{padding: 50px 0;overflow: hidden;background: #eee;text-align: center;}
		article form{display: inline-block;}
		#submit{width: 100px;height: 30px;font-size: 20px;line-height: 30px;background-color: #fff;margin: 20px auto;}
	</style>
</head>
<?php 
	require_once('../connect.php');
	$id = $_GET['id'];
	if ($id) {
		$query = mysql_query("select * from article where id = $id");
		$data = mysql_fetch_assoc($query);
	}
 ?>
<body>
	<header>后台管理系统</header>
	<aside>
		<ul>
			<li><a href="article.add.php">发布文章</a></li>
			<li><a href="article.manage.php">管理文章</a></li>
		</ul>
	</aside>
	<article>
		<h3>发布文章</h3>
		<form id="form" action="article.modify.handle.php" method="post">
			<input type="hidden" name="id" value="<?php echo $data['id']?>">
			<p>
				标题<input type="text" name="title" maxlength="100" value="<?php echo $data['title'];?>">
			</p>
			<p>
				作者<input type="text" name="author" maxlength="50" value="<?php echo $data['author'];?>">
			</p>
			<p>
				简介<textarea name="description" cols="100" rows="8" maxlength="255"><?php echo $data['description'];?></textarea>
			</p>
			<p>
				内容<textarea name="content" cols="100" rows="10"><?php echo $data['content'];?></textarea>
			</p>
			<div id="submit">发布</div>
		</form>
	</article>
	<script type="text/javascript">
		var form = document.getElementById('form');
		var submit = document.getElementById('submit');
		submit.onclick = function(){
			var title = form.title.value;
			var author = form.author.value;
			var description = form.description.value;
			var content = form.content.value;
			if (!(title.length && author.length && author.length && description.length && content.length)) {
				alert('表单未填写完整');
			}else{
				form.submit();
			}
		};
	</script>
</body>
</html>