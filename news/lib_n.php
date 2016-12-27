<?

	//======================================================

	function local_root($table) {
		$result = mysql_query("SELECT user_type FROM rules WHERE name='$_COOKIE[name]' and news_type='$table' and access='root'") or die("Invalid query: " . mysql_error());
		return mysql_num_rows($result);
	};
	
		
	//======================================================
	
	function check_wr($table) {
		$result = mysql_query("SELECT access FROM rules WHERE name='$_COOKIE[name]' and news_type='$table' and access <> 'read'") or die("Invalid query: " . mysql_error());
		return mysql_num_rows($result);
	};
	
	//======================================================
	
	function time_form($time) {
		return date('j-m-y  H:i:s',$time);
	};

	//======================================================
	
	function check_read() {
		$result = mysql_query("SELECT access FROM rules WHERE name='$_COOKIE[name]' and news_type='prep'") or die("Invalid query: " . mysql_error());
		return mysql_num_rows($result);
	};
	
	
?>