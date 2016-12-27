<?
	include '../config.php';
	include '../lang_ru.php';
	include '../header.php';

	//регистрация + подключени к бд
	include '../lib.php';
	//include 'lib_n.php';
	connect_db();
	register();
	if (!main_root()) {
		header('Location: news.php');
		exit;
	}
	
	//$result = mysql_query("SELECT * FROM users") or die("Invalid query: " . mysql_error());


		
	//удаление пользователей
	if(isset($_POST['b_del']) and isset($_POST['del'])) {
		foreach($_POST['del'] as $v) {
		  $key=explode('+', $v);
			print_r($key);
			$result = mysql_query("DELETE FROM rules WHERE name='$key[0]' and news_type='$key[1]'") or die("Invalid query: " . mysql_error());
			
		}
		
		//перегрузка страницы
		header('Location: '.$_SERVER['PHP_SELF']);
	}
	
	//добавление пользователя
	if(isset($_POST['b_add'])) {
		isset($_POST['name']) or die("Incorect value of 'Full_name'");
		isset($_POST['type']) or die("Incorect value of 'Full_name'");
		isset($_POST['access']) or die("Incorect value of 'Full_name'");
		if($_POST['type']!='prep' and $_POST['access']=='read')
			$access='write';
		else
			$access=$_POST['access'];
		$result = mysql_query("INSERT rules SET name='$_POST[name]', news_type='$_POST[type]', access='$access'");
		if (mysql_error())
			if(mysql_errno()==1062)
				$result = mysql_query("UPDATE rules SET access='$access' WHERE name='$_POST[name]' AND news_type='$_POST[type]'") or die("Invalid query: " . mysql_error().' '.mysql_errno());
			else
				die("Invalid query: " . mysql_error().' '.mysql_errno());
		
		//перегрузка страницы
		header('Location: '.$_SERVER['PHP_SELF']);
	  }
	
?>
<html>
<head>
<title>
<? echo TIT_RUL?>
</title>
</head>
<body>
<a href="user.php">add/edit users</a>
<a href="news.php">add/edit news</a>
<form method="post" action=<? echo $_SERVER['PHP_SELF'] ?> >
<table border="1">
	<thead>
		<tr>
			<td><? echo NAME ?></td>
			<td><? echo TYPE ?></td>
			<td><? echo ACCESS ?></td>
			<td><? echo DELETE ?></td>
		</tr>
	</thead>
	<tbody>
<?    
	$result = mysql_query("SELECT rules.*, users.full_name FROM rules,users WHERE users.name=rules.name ORDER BY rules.name, rules.news_type") or die("Invalid query: " . mysql_error());
	while ($row = mysql_fetch_assoc($result)) {
		printf ("<tr><td>%s | %s<td>%s<td>%s<td>%s</tr>", $row['name'], $row['full_name'],$row['news_type'],strlen($row['access'])?$row['access']:'&nbsp','<input type="checkbox" name="del[]" value="'.$row['name'].'+'.$row['news_type'].'">');
		#print_r($row);
	} 

?>
	</tbody>
</table><br>
<input type="submit" name="b_del" value="Удалить"><br><br>

	<table>
	<thead>
	  <tr>
			<td><? echo NAME ?></td>
			<td><? echo TYPE ?></td>
			<td><? echo ACCESS ?></td>
			<td><? echo BUTTON ?></td>
		</tr>
	</thead>
	<tbody>
	  <tr>
			<td><select size="1" name="name">
				<?
					$result = mysql_query("SELECT name, full_name FROM users ORDER BY name") or die("Invalid query: " . mysql_error());
					while ($row = mysql_fetch_assoc($result)) {
						echo "<option value=$row[name]>$row[name] | $row[full_name]</option>";
					};
				?>
			</td>
			<td><select size="1" name="type">
					<option value="site">site</option>
					<option value="stud">stud</option>
					<option value="prep">prep</option>
					<option value="science">science</option>
					</select></td>
			<td><select size="1" name="access">
					<option value="read">read</option>
					<option value="write">write</option>
					<option value="root">root</option>
					</select></td>

			<td><input type="submit" name="b_add" value="<? echo ADD ?>"><input type="submit" name="b_exit" value="<? echo BEXIT ?>"></td>
		</tr>
	</tbody>
	</table>

</form>

<?
	//закрываем соединение с бд
	mysql_close();
?>

</body>
</html>
