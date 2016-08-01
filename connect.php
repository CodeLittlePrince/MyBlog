<?php 
	require_once('config.php');
	//上线以前要把累死error的语句删除
	//connect mysql
	if (!mysql_connect(HOST, USERNAME, PASSWORD)) {
		echo mysql_error();
	}
	//select mysql
	if (!mysql_select_db('info')) {
		echo mysql_error();
	}
	//set mysql query utf8
	if (!mysql_query("set names utf8")) {
		echo mysql_error();
	}
 ?>