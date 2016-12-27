<?

//============= db settings ===========================

//include '../proekt/dbconf.php';

include '../news/config.php';
include '../news/admin/lib.php';
connect_db();
register();
if (!main_root())	exit;

//============= db connect ============================

//mysql_connect(dbhost, dblogin, dbpassw) or die ("Could not connect ".dbhost);
//mysql_select_db (database) or die ("Could not select database ".database);
mysql_query('set character set cp1251');

//============= delete record =========================

if (isset($_GET['del'])) {
	$id = (int) $_GET['del'];
	mysql_query("DELETE FROM proekt WHERE id='$id'");
	header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
	exit;
}

//============= getting info ==========================

$result = mysql_query("SELECT id,nazvanie FROM proekt WHERE lang='".lang."' ORDER BY nazvanie");

//============= showing records =======================

?>
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link href="/project.css" type="text/css" rel="stylesheet">
<BASE target="_blank">
</head>
<body>
<table border="0">
<tr><td style="color: blue; text-decoration: underline;"><a onClick="window.open('edproject.php')">new</a></td></tr>
<?
	while($res = mysql_fetch_assoc($result)) {
		//echo '<tr><td><a href="edproject.php?id='.$res['id'].'">'.$res['nazvanie'].'</a></td></tr>';
		echo '<tr><td><a onClick="window.open(\'edproject.php?id='.$res['id'].'\')">'.$res['nazvanie'].'</a></td><td><a target="_self" href="?del='.$res['id'].'">del</a></td></tr>';
	}
?>
</table>
</body>
</html>
<?

//============= db disconnect ==========================
mysql_close();

?>
