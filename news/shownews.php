﻿<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
</head>
<body>
<?
	$t = array('site','stud','prep','science');
	$l = array('ua','ru','en');
	
	if (isset($_GET['type']) && array_search($_GET['type'],$t))
		$type = $_GET['type'];
	else
		$type = 'site';
		
	if (isset($_GET['lang']) && array_search($_GET['lang'],$l))
		$lang = $_GET['lang'];
	else
		$lang = 'ua';
		
	//define("NEWS_TYPE","prep");
	//$NEWS_LANG=isset($_COOKIE['lang'])?$_COOKIE['lang']:'ua';

	//echo $type.'<br>';
	
	include '../news/config.php';
	//регистрация + подключени к бд
	include '../news/lib.php';
	include '../news/lib_n.php';
	
	connect_db();
	
	if ($type == 'prep') {
		register();		
		check_read() or die('Access denied');
	}

	
	 
	$result = mysql_query("SELECT d_modify,header,body FROM news WHERE news_type='".$type."' and lang='".$lang."' and visible='1' ORDER BY d_modify") or die("Invalid query: " . mysql_error());
	$count=mysql_num_rows($result)-1;
	echo '<table>';
	while ($row = mysql_fetch_assoc($result)) {
		//echo '<tr><td>'.$row['d_modify'].'</td></tr>';
		echo '<tr><td>'.time_form($row['d_modify']).'  <b>'.$row['header'].'</b></td></tr>';
		echo '<tr><td>'.$row['body'].'</td></tr>';
		if($count)
			echo '<tr><td><hr></td></tr>';
	}
	echo '</table>';
	
	mysql_close();
?>
</BODY>
</HTML>