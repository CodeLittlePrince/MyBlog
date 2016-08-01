<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list</title>
	<style type="text/css">
		html, body, ul, li, div, h3, h1, h2, p{margin: 0;padding: 0;}
		body{background-color: #eee;}
		a{text-decoration: none;color: #aaa;}
		li{list-style: none;}
		header{
			position: relative;
		}
		.box{
			background-color: #fff;
			box-shadow: 2px 2px 1px 0 #ccc;
			padding: 20px;
			box-sizing: border-box;
		}
		ul{
			width: 800px;
			float: left;
		}
		article p{margin-top: 15px;text-indent: 2em;}
		aside{
			width: 350px;
			float: right;
		}
		.content{
			width: 1200px;
			margin: 30px auto;
		}
		h1{font-size: 40px;color: #888;font-weight: normal;}
		h1 span{font-size: 20px;}
		h2{font-size: 28px;font-weight: normal;color: #333}
		time{color: #258fb8;}
		header p{color: #444;text-indent: 2em;}
		.mt5{margin-top: 5px;}
		.mb10{margin-bottom: 10px;}
		.lh1d5{line-height: 1.5;}
		.tags a:before{content: 'Tag';margin-right: 5px;}
		input[type="text"]{
			width: 200px;
			height: 30px;
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 0 10px;
			box-sizing: border-box;
		}
		input[type="submit"]{
			width: 80px;
			margin-left: 10px;
		}
	</style>
</head>
<?php 
	require_once('../connect.php');
	date_default_timezone_set('PRC');
	$id = $_GET['id'];
	$selectsql = "select title, deadline, content from article where id = $id";
	if ($query = mysql_query($selectsql)) {
		$data = mysql_fetch_assoc($query);
	}else{
		echo "数据库查询失败";
	}
 ?>
<body>
	<div class="content">
		<header class="mb10">
			<h1>骡子咻咻咻</br><span>骡子的技术博客</span></h1>
		</header>
		<ul>
			<li class="box mb10">
				<header class="mb10">
					<time><?php echo date('Y-m-d',$data['deadline']); ?></time>
					<h2 class="mt5 mb10"><?php echo $data['title'] ?></h2>
					<article class="lh1d5">
						<?php echo $data['content'] ?>
					</article>
				</header>
				<footer>
					<div class="tags">
						<a href="article.list.php?tag='武林至尊'">武林至尊</a>
					</div>
				</footer>
			</li>
		</ul>
		<aside class="box">
			<form method="get" action="article.search.php">
				<input type="text" name="key">
				<input type="submit" value="搜索">
			</form>
		</aside>
	</div>
</body>
</html>