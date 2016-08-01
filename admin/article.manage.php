<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>manage</title>
	<style type="text/css">
		html, body, ul, li, div, h3{margin: 0;padding: 0;}
		li{list-style: none;}
		header{font-size: 30px;height:100px;line-height:100px;background-color: #fdc;text-align: center;border: 1px solid #ccc;}
		aside{padding-top: 50px;line-height: 50px; width: 200px;height: 200px;background: cyan;border: 1px solid #ccc;float: left;text-align: center;}
		article{padding: 50px 0;overflow: hidden;background: #eee;text-align: center;}
		article form{display: inline-block;}
		#submit{width: 100px;height: 30px;font-size: 20px;line-height: 30px;background-color: #fff;margin: 20px auto;}
		table{width: 100%;margin-top: 10px;}
	</style>
</head>
<?php 
	require_once('../connect.php');
	$selectsql = "select id, title from article";
	$result = [];
	$query = mysql_query($selectsql);
	if ($query && mysql_num_rows($query)) {
		while($data = mysql_fetch_assoc($query)){
			array_push($result, $data);
		}
	}
 ?>
<body>
	<header>后台管理系统</header>
	<aside>
		<ul>
			<li><a href="article.add.php">发布文章</a></li>
			<li><a href="article.modify.php">管理文章</a></li>
		</ul>
	</aside>
	<article>
		<h3>发布文章</h3>
		<table>
			<caption>文章管理列表</caption>
			<thead>
				<tr>
					<th>编号</th>
					<th>标题</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(!empty($result)){
						foreach ($result as $value) {
				 ?>
				<tr>
					<td><?php echo $value['id']?></td>
					<td><?php echo $value['title']?></td>
					<td>
						<a href="article.del.handle.php?id=<?php echo $value['id']?>">删除</a>
						<a href="article.modify.php?id=<?php echo $value['id']?>">修改</a>
					</td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>
	</article>
	<script type="text/javascript">
		
	</script>
</body>
</html>