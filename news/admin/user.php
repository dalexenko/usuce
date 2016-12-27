<?
	include '../config.php';
	include '../lang_ru.php';
	include '../header.php';
	
	//регистрация + подключени к бд
	include '../lib.php';
	connect_db();
	register();
	if (!main_root())	exit;

	//удаление пользователей
	if(isset($_POST['b_del']) and isset($_POST['del'])) {
		foreach($_POST['del'] as $v) {
			$result = mysql_query("DELETE FROM news WHERE name='$v'") or die("Invalid query: " . mysql_error());
			$result = mysql_query("DELETE FROM rules WHERE name='$v'") or die("Invalid query: " . mysql_error());
			$result = mysql_query("DELETE FROM users WHERE name='$v'") or die("Invalid query: " . mysql_error());
			
		}
		
		//перегрузка страницы
		header('Location: '.$_SERVER['PHP_SELF']);
	}

	//добавление пользователя
	if(isset($_POST['b_add'])) {
	   
	   //проверки
		(isset($_POST['name']) and strlen($_POST['name'])<=15) or die("Incorect value of 'Name'");
		(isset($_POST['passwd']) and strlen($_POST['passwd'])<=30) or die("Incorect value of 'Password'");
		$_POST['type']=='root' or $_POST['type']=='user' or die("Incorect value of 'Type'");
		strlen($_POST['fname'])<=70 or die("Incorect value of 'Full_name'");
		
		$name = strtolower($_POST['name']);
		$passwd = md5($_POST['passwd']);
		$type = $_POST['type'];
		if(isset($_POST['fname']))
			$fname = addslashes(htmlspecialchars($_POST['fname']));
			else
				$fname = '';
		
		
		//добавление
		mysql_query("INSERT users SET name='$name', passwd='$passwd', user_type='$type', full_name='$fname'") or die('Invalid query: '.mysql_error());
		
		//перегрузка страницы
		header('Location: '.$_SERVER['PHP_SELF']);
	}
	
	if (isset($_POST['b_save'])) {
		(isset($_POST['name']) and strlen($_POST['name'])<=15) or die("Incorect value of 'Name'");
		(isset($_POST['passwd']) and strlen($_POST['passwd'])<=30) or die("Incorect value of 'Password'");
		$_POST['type']=='root' or $_POST['type']=='user' or die("Incorect value of 'Type'");
		strlen($_POST['fname'])<=70 or die("Incorect value of 'Full_name'");
		
		$name = strtolower($_POST['name']);
		
		$type = $_POST['type'];
		if(isset($_POST['fname']))
			$fname = addslashes(htmlspecialchars($_POST['fname']));
		else
			$fname = '';
		
		if (strlen($_POST['passwd'])) {
			$passwd = md5($_POST['passwd']);
			mysql_query("UPDATE users SET passwd='$passwd', user_type='$type', full_name='$fname' WHERE name='$name'") or die('Invalid query: '.mysql_error());
		
			//перегрузка страницы
			header('Location: '.$_SERVER['PHP_SELF']);
		} else {
			mysql_query("UPDATE users SET user_type='$type', full_name='$fname' WHERE name='$name'") or die('Invalid query: '.mysql_error());
		
			//перегрузка страницы
			header('Location: '.$_SERVER['PHP_SELF']);
		}
		
		
		
	}
	
	
	if (isset($_GET['user'])) {
		$result = mysql_query("SELECT * FROM users WHERE name='$_GET[user]'") or die("Invalid query: " . mysql_error());
		$result = mysql_fetch_assoc($result);
		$name = $result['name'];
		$type = $result['user_type'];
		$fname = $result['full_name'];
	} else {
		$name = '';
		$type = 'user';
		$fname = '';
	}


?>
<html>
<head>
<title>
<? echo TIT_US ?>
</title>
</head>
<body>
<form method="post" action=<? echo $_SERVER['PHP_SELF'] ?> >
<a href="rules.php">add/edit rules</a>
<a href="news.php">add/edit news</a>
<table border="1">
	<thead>
		<tr>
			<td><? echo NAME ?></td>
			<td><? echo PASSWD ?></td>
			<td><? echo TYPE ?></td>
			<td><? echo FULL_NAME ?></td>
			<td><? echo DELETE ?></td>
		</tr>
	</thead>
	<tbody>
<?    
	$result = mysql_query("SELECT * FROM users ORDER BY user_type, name") or die("Invalid query: " . mysql_error());
	while ($row = mysql_fetch_assoc($result)) {
		printf ("<tr><td><a href='$_SERVER[PHP_SELF]?user=%s'>%s</a><td>%s<td>%s<td>%s<td>%s</tr>", $row['name'],$row['name'],strlen($row['passwd'])?$row['passwd']:'&nbsp' ,$row['user_type'],(strlen($row['full_name'])?$row['full_name']:'&nbsp'),'<input type="checkbox" name="del[]" value="'.$row['name'].'">');
		#print_r($row);
	} 

	//закрываем соединение с бд
	mysql_close();

?>
	</tbody>
</table><br>
<input type="submit" name="b_exit" value="<? echo BEXIT ?>"><input type="submit" name="b_del" value="<? echo DELETE ?>"><br><br>
<? echo MES_US ?><br><br>
	<table>
	<thead>
	  <tr>
			<td><? echo NAME ?></td>
			<td><? echo PASSWD ?></td>
			<td><? echo TYPE ?></td>
			<td><? echo FULL_NAME ?></td>
			<td><? echo BUTTON ?></td>
		</tr>
	</thead>
	<tbody>
	  <tr>
			<td><input type="text" name="name" maxlength="15" value="<? echo $name ?>"></td>
			<td><input type="password" name="passwd" maxlength="30"></td>
			<td><select size="1" name="type">
					<option value="user" <? if ($type=='user') echo 'selected' ?>>user</option>
					<option value="root" <? if ($type=='root') echo 'selected' ?>>root</option>
				</select></td>
			<td><input type="text" name="fname" maxlength="70" value="<? echo $fname ?>"></td>
			<? if (isset($_GET['user'])) { ?>
				<td><input type="submit" name="b_save" value="<? echo SAVE ?>"></td>
			<? } else { ?>
				<td><input type="submit" name="b_add" value="<? echo ADD ?>"></td>
			<? } ?>
		</tr>
	</tbody>
	</table>

</form>
</body>
</html>
