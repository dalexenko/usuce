<?

$k = array_keys($menu);
$p = isset($_GET['p'])? (int)$_GET['p']:0;
$s = (isset($_GET['s']))?(int)$_GET['s']:-1;
?>
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<base target="main">
<link href="/submenu.css" type="text/css" rel="stylesheet">
<script language="javascript" src="/menu.js"></script>
<script language="javascript">
var start=0;
<?
	echo 'var item='.$s."\n";
?>

</script>
</head>

<body onload=" 
if (item < 0 && document.getElementById('main')) 
{
	parent.main.location.href=document.getElementById('main').value;
	
} else if (item < 0) {
	setmenu(start); 
	setmaincontent(start);
}	else { 
	setmenu(start+item)
	}
	"
	style="background-color:#cccccc">

<?
if (!is_array($menu[$k[$p]][0])) {
	$mlink = $menu[$k[$p]][0];
	if (isset($mlink))
		echo "<input type=\"hidden\" id=\"main\" value=\"$mlink\">";
}
?>



		<table border="0" cellspacing="0" cellpadding="5" width="100%">
		<!-- <tr><td><img src="/pics/index/emb1.jpg" width="100" hieght="98"><br><br></td></tr> -->
		<!-- <tr><td><a href="/ua" target="_top">ua</a>&nbsp;<a href="/ru" target="_top">ru</a>&nbsp;<a href="/en" target="_top">en</a><br><br></td></tr> -->
		<noscript><?
			if (isset($mlink)) {
				echo '<tr><td class="lbut" align="center"><a class="menu" href="'.$mlink.'">'.main.'</a></td></tr>';
				echo '<tr><td height="10"> </td></tr>';
			}
		?></noscript>
		
		<?
		$counter = 0;
		foreach ($menu[$k[$p]] as $k1 => $v) {
			if (!is_array($v))
				continue;
				//echo "<a href='$v'></a>";  style="background-color: #999999;"
			echo '<tr ><td class="lbut" align="center"><a class="menu" href="'.$v[1].'" onclick="unset(); this.className=\'amenu\'">'.$v[0].'</a></td></tr>';
			echo '<tr><td height="10"> </td></tr>';
			$counter++;
		}
		
		
		
		?>
		
		</table>
		

	
</body>

</html>
