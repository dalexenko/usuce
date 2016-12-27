<?PHP

//phpinfo(); exit;

$m = isset($_GET['m'])? (int)$_GET['m']:0;
$s = (isset($_GET['s']))?(int)$_GET['s']:0;
$l = (isset($_GET['l']))?(int)$_GET['l']:-1;

$k = array_keys($menu);
if (!is_array($menu[$k[$m]][$s])) {
	$main = $menu[$k[$m]][$s];
	$s = -1;
}
else
	$main = $menu[$k[$m]][$s][1];

	

?>

<HTML>
<HEAD>

<script language="javascript">
<!-- 
	//var l = <? echo $l ?>;
	//var m = 1;
	//var s = s0 = 2;
	//var l = 0;
	//var reload_main = 0;

	
	function checkmain()
	{
		if (main.m != undefined && main.s != undefined) {
			menu.setmenu(main.m);
			menu.setsubmenucontent(main.m,main.s)
		}
		
	}
	
 -->
</script>

<?

if ($l >= 0)  {
	$dir = dirname($main);
	
	$f = join('',file('http://usuce/'.lang.'/'.$main));
	//$f = join('',file($main));
	//$f = file('http://usuce/ua/'.$main);
	$links = preg_split('/<a\s*href\s*=\s*"\s*/i',$f);
	 
	$counter = 0;
	foreach($links as $v) {
		$stop1 = strpos($v,'"');
		$stop2 = strpos($v,' ');
		$stop = min($stop1,$stop2);
		$st = substr($v,0,$stop);
		
		if (substr($st,strlen($st)-3) !== 'css' && $counter != 0)
			$link[] = $dir.'/'.$st;
		// $links1 = preg_split('/href\s*=\s*"\s*/i',$f);
		// echo ' -> '.$links1[0].'<-<br>';
		// print_r($links1);
		// echo '<br>===================================<br>';
		$counter++;
	}
	
		 
		
		//echo '<pre>';
		//print_r($f);
		//print_r($link);
		
	if (isset($link[$l]))
		$main = $link[$l];
		
}

?>

<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<TITLE>udhtu</TITLE>
</HEAD>
 
<FRAMESET cols="136,*">
	<FRAMESET rows="170,*">
		<FRAME name="logo" src="../logo.html" noresize scrolling="no" frameborder="no" marginwidth="0" marginheight="0">
		<FRAME name="submenu" src="submenu.php?p=<? echo $m ?>&s=<? echo $s ?>" noresize scrolling="no" frameborder="no" marginwidth="0" marginheight="0">
	</FRAMESET>
	
	<FRAMESET rows="135,*">
		<!-- <FRAME name="header" src="../header.html" noresize scrolling="no" frameborder="no" marginwidth="0" marginheight="0"> -->
		<FRAME name="menu" src="menu.php?m=<? echo $m ?>" noresize scrolling="no" frameborder="no" marginwidth="0" marginheight="0">
		<FRAME name="main" onload="checkmain()" src="<? echo $main ?>" noresize frameborder="no" marginwidth="20" marginheight="20">
  </FRAMESET>
  <NOFRAMES>
	
  <?
	
	require lang.'/'.$main;
	
//============= db settings ===========================

include '../dbconf.php';

//============= db connect ============================

mysql_connect(dbhost, dblogin, dbpassw) or die ("Could not connect ".dbhost);
mysql_select_db (database) or die ("Could not select database ".database);
mysql_query('set character set cp1251');


//============= creating query ========================

		$query = "SELECT id,nazvanie FROM proekt WHERE lang='".lang.'\' ORDER BY nazvanie';
		$result = mysql_query($query) or die("Invalid query: " . mysql_error());
		
		$counter = 0;
		while ($res = mysql_fetch_assoc($result)) {
			echo '<a href="http://'.$_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"].'?m=2&s=0&l='.$counter.'" target="_blank">'.$res['nazvanie']."</a><br>\n";
			$counter++;
		}
		
		//require lang.'/'.$main;
		//echo '<pre>'; print_r($link);
		
		?>
  </NOFRAMES>
</FRAMESET>

</HTML>
