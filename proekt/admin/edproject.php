﻿<?

//============= db settings ===========================

include '../proekt/dbconf.php';

//============= db connect ============================

mysql_connect(dbhost, dblogin, dbpassw) or die ("Could not connect ".dbhost);
mysql_select_db (database) or die ("Could not select database ".database);
mysql_query('set character set cp1251');


//============= getting id ============================

@$id = (int) $_GET['id'] or 0;

//============= saving new record ======================

if (isset($_POST['add']))
{
	$query = 'INSERT proekt (lang,nazvanie,avtori,horakteristiki,patent,analogi,economika,naznachenie,gotovnost,rezultati,koordinati) 
			VALUES(\''.lang.'\',\''.$_POST['nazvanie'].'\',\''.$_POST['avtori'].'\',\''.$_POST['horakteristiki'].'\',\''.$_POST['patent'].'\',\''
			.$_POST['analogi'].'\',\''.$_POST['economika'].'\',\''.$_POST['naznachenie'].'\',\''.$_POST['gotovnost'].'\',\''.$_POST['rezultati'].'\',\''.$_POST['koordinati'].'\')';
	mysql_query($query);
	
	echo '<html><body onLoad="opener.location.reload(); window.close()"></body></html>';
	exit;
}

//============= changing record ======================

if (isset($_POST['sv']) && $id != 0)
{
	$query = 'UPDATE proekt SET lang=\''.lang.'\',nazvanie=\''.$_POST['nazvanie'].'\',avtori=\''.$_POST['avtori']
	.'\',horakteristiki=\''.$_POST['horakteristiki'].'\',patent=\''.$_POST['patent'].'\',analogi=\''.$_POST['analogi']
	.'\',economika=\''.$_POST['economika'].'\',naznachenie=\''.$_POST['naznachenie'].'\',gotovnost=\''.$_POST['gotovnost'].'\',rezultati=\''.$_POST['rezultati'].'\',koordinati=\''.$_POST['koordinati'].'\' WHERE id=\''.$id.'\''; 
	mysql_query($query);
	
	echo '<html><body onLoad="opener.location.reload(); window.close()"></body></html>';
	exit;
}

//============= getting info ==========================

if ($id != 0) {
	$result = mysql_query("SELECT * FROM proekt WHERE id = '$id'");
	$result = mysql_fetch_assoc($result);
} else {
	$result['nazvanie'] = '';
	$result['avtori'] = '';
	$result['horakteristiki'] = '';
	$result['patent'] = '';
	$result['analogi'] = '';
	$result['economika'] = '';
	$result['naznachenie'] = '';
	$result['gotovnost'] = '';
	$result['rezultati'] = '';
	$result['koordinati'] = '';
}

//============= showing record ========================

?>
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link href="/project.css" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post">
<div class="nazvanie"><input type="text" name="nazvanie"  cols="60" maxlength="200" value="
<?

echo $result['nazvanie'].'"></div>';

echo '<p class="zagolovok"> 1. '.avtori.'</p>';
echo '<p class="tekst"><input type="text" name="avtori" maxlength="200" cols="60" value="'.$result['avtori'].'"></p>';

echo '<p class="zagolovok"> 2. '.horakteristiki.'</p>';
echo '<p class="tekst"><textarea name="horakteristiki"  cols="50" rows="10">'.$result['horakteristiki'].'</textarea></p>';

echo '<p class="zagolovok"> 3. '.patent.'</p>';
echo '<p class="tekst"><textarea name="patent"  cols="50" rows="10">'.$result['patent'].'</textarea></p>';

echo '<p class="zagolovok"> 4. '.analogi.'</p>';
echo '<p class="tekst"><textarea name="analogi"  cols="50" rows="10">'.$result['analogi'].'</textarea></p>';

echo '<p class="zagolovok"> 5. '.economika.'</p>';
echo '<p class="tekst"><textarea name="economika"  cols="50" rows="10">'.$result['economika'].'</textarea></p>';

echo '<p class="zagolovok"> 6. '.naznachenie.'</p>';
echo '<p class="tekst"><textarea name="naznachenie"  cols="50" rows="10">'.$result['naznachenie'].'</textarea></p>';

echo '<p class="zagolovok"> 7. '.gotovnost.'</p>';
echo '<p class="tekst"><textarea name="gotovnost"  cols="50" rows="10">'.$result['gotovnost'].'</textarea></p>';

echo '<p class="zagolovok"> 8. '.rezultati.'</p>';
echo '<p class="tekst"><textarea name="rezultati"  cols="50" rows="10">'.$result['rezultati'].'</textarea></p>';

echo '<p class="zagolovok"> 9. '.koordinati.'</p>';
echo '<p class="tekst"><textarea name="koordinati"  cols="50" rows="10">'.$result['koordinati'].'</textarea></p>';

if ($id != 0)
	echo '<input type=submit name="sv" value="'.save.'">';
else
	echo '<input type=submit name="add" value="'.save.'">';

?>
</form>
</body>
</html>
<?

//============= db disconnect ==========================
mysql_close();

?>
