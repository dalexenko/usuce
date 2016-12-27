<?

//$m = 0;
$m = (isset($_GET['m']))?(int)$_GET['m']:0;
?>
<html>
<head>
<base target="submenu">
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link href="/menu.css" type="text/css" rel="stylesheet">
<script language="javascript" src="/menu.js"></script>
<script language="javascript">
<?
	echo 'var item='.$m."\n";
?>

</script>

</head>
<body onload="setmenu(item);">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>



	<table border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center" width="100%">

<tr>
	
	<td align="left">
	
		<table id="Table_01" width="273" height="99" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<img src="/images/logo_02.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_03.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_04.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_05.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_06.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_07.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_08.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_09.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_10.jpg" width="273" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/logo_11.jpg" width="273" height="9" alt=""></td>
			</tr>
		</table>
	
	</td>
	
	<td align="center">
	
	
<table id="Table_01" width="247" height="99" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="/images/kolba_01.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_02.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_03.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_04.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_05.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_06.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_07.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_08.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_09.jpg" width="247" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/kolba_10.jpg" width="247" height="9" alt=""></td>
	</tr>
</table>
	
	
	</td>
	
	<td align="right">
	
	
		<table id="Table_01" width="140" height="99" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<img src="/images/chemical_01.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_02.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_03.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_04.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_05.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_06.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_07.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_08.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_09.jpg" width="140" height="10" alt=""></td>
			</tr>
			<tr>
				<td>
					<img src="/images/chemical_10.jpg" width="140" height="9" alt=""></td>
			</tr>
		</table>
	
	</td>

</tr>

</table>
	



	</td>
</tr>


<tr>
	<td width="100%" height="3" background="/images/line.jpg">
	</td>
</tr>
	
<tr>
	<td>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#cccccc">

<tr>
<?
$counter = 0;
foreach ($menu as $k1 => $v1) {
	echo '<td align="center">';
	
	?>
	
	<table id="Table_01" width="120" height="36" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="/images/menu_01.jpg" width="6" height="26" alt=""></td>
		<td align="center" bgcolor="#666666">
		
	<?
	
	
	echo '<a class="menu" href="submenu.php?p='.$counter."\" onclick=\"setmenu($counter)\">".$k1.'</a>';
	
	?>
	
	
			</td>
		<td>
			<img src="/images/menu_03.jpg" width="6" height="26" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/menu_04.jpg" width="6" height="10" alt=""></td>
		<td background="/images/menu_05.jpg" width="120" height="10"></td>
		<td>
			<img src="/images/menu_06.jpg" width="6" height="10" alt=""></td>
	</tr>
</table>
	
	<?
	
	echo '</td>';
	$counter++;
};

?>
</tr>
</table>

	</td>
</tr>

</body>
</html>
