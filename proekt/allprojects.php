<?

//============= db settings ===========================

include 'dbconf.php';

// echo '<pre>';
// print_r($_POST);

//============= db connect ============================

mysql_connect(dbhost, dblogin, dbpassw) or die ("Could not connect ".dbhost);
mysql_select_db (database) or die ("Could not select database ".database);
mysql_query('set character set cp1251');


//============= creating query ========================

$query = "SELECT id,nazvanie FROM proekt WHERE lang='".lang.'\'';

if (isset($_POST['find']) && strlen($_POST['find'])) {
	$find = htmlspecialchars($_POST['find']);
	
	$count = 0;
	
	if (isset($_POST['nazvanie'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' nazvanie LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['avtori'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' avtori LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['horakteristiki'])){
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' horakteristiki LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['patent'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' patent LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['analogi'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' analogi LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['economika'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' economika LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['naznachenie'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' naznachenie LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['gotovnost'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' gotovnost LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['rezultati'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' rezultati LIKE \'%'.$find.'%\'';
	}
	if (isset($_POST['koordinati'])) {
		if ($count==0) $query .= ' AND ('; else $query .= ' OR'; $count++;
		$query .= ' koordinati LIKE \'%'.$find.'%\'';
	}
	if ($count) $query .= ')';
} else $find = '';

$query .= ' ORDER BY nazvanie';

//============= getting info ==========================

// echo $query.'<br>';
$result = mysql_query($query) or die("Invalid query: " . mysql_error());

//============= showing records =======================

?>
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link href="/project.css" type="text/css" rel="stylesheet">
</head>
<body>
<table border="0">
<?
	while($res = mysql_fetch_assoc($result)) {
		echo '<tr><td><a href="project.php?id='.$res['id'].'" target="_blank">'.$res['nazvanie'].'</a></td></tr>';
	}
?>
</table>
<br>

<form method="post">
	<input type="checkbox" name="nazvanie" <? if (isset($_POST['nazvanie']) or !isset($_POST['find'])) echo 'checked' ?>><? echo nazvanie ?><br>
	<input type="checkbox" name="avtori" <? if (isset($_POST['avtori']) or !isset($_POST['find'])) echo 'checked' ?>><? echo avtori ?><br>
	<input type="checkbox" name="horakteristiki" <? if (isset($_POST['horakteristiki']) or !isset($_POST['find'])) echo 'checked' ?>><? echo horakteristiki ?><br>
	<input type="checkbox" name="patent" <? if (isset($_POST['patent']) or !isset($_POST['find'])) echo 'checked' ?>><? echo patent ?><br>
	<input type="checkbox" name="analogi" <? if (isset($_POST['analogi']) or !isset($_POST['find'])) echo 'checked' ?>><? echo analogi ?><br>
	<input type="checkbox" name="economika" <? if (isset($_POST['economika']) or !isset($_POST['find'])) echo 'checked' ?>><? echo economika ?><br>
	<input type="checkbox" name="naznachenie" <? if (isset($_POST['naznachenie']) or !isset($_POST['find'])) echo 'checked' ?>><? echo naznachenie ?><br>
	<input type="checkbox" name="gotovnost" <? if (isset($_POST['gotovnost']) or !isset($_POST['find'])) echo 'checked' ?>><? echo gotovnost ?><br>
	<input type="checkbox" name="rezultati" <? if (isset($_POST['rezultati']) or !isset($_POST['find'])) echo 'checked' ?>><? echo rezultati ?><br>
	<input type="checkbox" name="koordinati" <? if (isset($_POST['koordinati']) or !isset($_POST['find'])) echo 'checked' ?>><? echo koordinati ?><br>
	<input type="text" name="find" value="<? echo $find ?>"><input type="submit" value="<? echo find ?>">
</form>

</body>
</html>
<?

//============= db disconnect ==========================
mysql_close();

?>
