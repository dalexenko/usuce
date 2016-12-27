<?
	if(isset($_POST['b_exit'])) {
		// if (isset($_COOKIE['id']))
			// unset($_COOKIE['id']);
		setcookie('name','');
		setcookie('uid','');
		//echo '<html><body onLoad="window.close()"></body></html>';
		header('Location: '.$_SERVER['PHP_SELF']);
		exit;
	}
		
//----------------------------------------------------

	define('TIME',time()+60*5);

//----------------------------------------------------
	function connect_db() {
		//соединение и выбор бд  
		$link=mysql_connect('', DB_USER, DB_PASSWD)
			or die('Could not connect:' . mysql_error());
		mysql_select_db(DB_DB, $link) or die ('Can\'t use '.DB_DB.' : ' . mysql_error());
		mysql_query('set character set cp1251');
	}

//----------------------------------------------------
	
	//уникальный индификатор
	function uid($name) {
		$id_num=explode('.',$_SERVER['REMOTE_ADDR']);
		return md5(($id_num[0]*1.38+$id_num[1]*1.25-$id_num[2]/((int) date('W'))/9.8+$id_num[3]/((int) date('j'))*1.47)/7.314 . $name );
	};
	
	//setcookie('id',$id_num,$time);

	//======================================================

	function main_root() {
		$result = mysql_query("SELECT user_type FROM users WHERE name='$_COOKIE[name]' and user_type='root'") or die("Invalid query: " . mysql_error());
		return mysql_num_rows($result);
	};

	//----------------------------------------------------	
	
	function register() {
	  if(isset($_COOKIE['uid']) and isset($_COOKIE['name']) and $_COOKIE['uid']==uid($_COOKIE['name'])) {
			setcookie('uid',uid($_COOKIE['name']),TIME);
			setcookie('name',$_COOKIE['name'],TIME);
			return;
			}
		else
			if(isset($_POST['name']) and isset($_POST['passwd']) and isset($_POST['b_ent'])) {
				$result = mysql_query("SELECT passwd FROM users WHERE name='$_POST[name]'") or die("Invalid query: " . mysql_error());
				$result=mysql_fetch_assoc($result);
				if($result['passwd']==md5($_POST['passwd'])) {
					setcookie('uid',uid($_POST['name']),TIME);
					setcookie('name',$_POST['name'],TIME);
					//перегрузка страницы
					header('Location: '.$_SERVER['PHP_SELF']);
				}
				else {
					mysql_close();
					die('Не правильное имя или пароль.');
				}
			}
			else {
		?>
			<html>
			<head>
			<title>
			Вход в систему
			</title>
			</head>
			<body>
			<form method="post" action=<? echo $_SERVER['PHP_SELF']?>>
			<input type="text" name="name" maxlength="15">
			<input type="password" name="passwd" maxlength="30">
			<input type="submit" name="b_ent" value="Enter">
			</form>
			</body>
			</html>
		<?
			mysql_close();
			exit;
		}
	}
?>