<?

//============= =======================================

//============= db settings ===========================

include '../dbconf.php';

//============= db connect ============================

mysql_connect(dbhost, dblogin, dbpassw) or die ("Could not connect ".dbhost);
mysql_select_db (database) or die ("Could not select database ".database);
mysql_query('set character set cp1251');

//============= getting id ============================

@$id = (int) $_GET['id'] or 0;

//============= checking id ===========================

if ($id == 0) {
	mysql_close();
	exit;
}

//============= query to db ===========================

$result = mysql_query("SELECT * FROM proekt WHERE id = '$id'");
$result = mysql_fetch_assoc($result);

//============= showing record ========================

?>
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link href="/project.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="nazvanie">
<?
echo $result['nazvanie'].'</div>';

echo '<p class="zagolovok"> 1. '.avtori.'</p>';
echo '<p class="tekst">'.$result['avtori'].'</p>';

echo '<p class="zagolovok"> 2. '.horakteristiki.'</p>';
echo '<p class="tekst">'.$result['horakteristiki'].'</p>';

echo '<p class="zagolovok"> 3. '.patent.'</p>';
echo '<p class="tekst">'.$result['patent'].'</p>';

echo '<p class="zagolovok"> 4. '.analogi.'</p>';
echo '<p class="tekst">'.$result['analogi'].'</p>';

echo '<p class="zagolovok"> 5. '.economika.'</p>';
echo '<p class="tekst">'.$result['economika'].'</p>';

echo '<p class="zagolovok"> 6. '.naznachenie.'</p>';
echo '<p class="tekst">'.$result['naznachenie'].'</p>';

echo '<p class="zagolovok"> 7. '.gotovnost.'</p>';
echo '<p class="tekst">'.$result['gotovnost'].'</p>';

echo '<p class="zagolovok"> 8. '.rezultati.'</p>';
echo '<p class="tekst">'.$result['rezultati'].'</p>';

echo '<p class="zagolovok"> 9. '.koordinati.'</p>';
echo '<p class="tekst">'.$result['koordinati'].'</p>';

echo '</body>';
echo '</html>';


//============= db disconnect ==========================

mysql_close();

?>
