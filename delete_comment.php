<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
<?php
	if(isset($_SESSION['post_proc']) && $_SESSION['post_proc'] == true){
		$_SESSION['post_proc'] = false;
		header('Location:'.$_SERVER['PHP_SELF']);
		exit();
	}
$delete_c_id='';
$delete_comment='';
?>
</head>
<body>
<div id="sample-title"><h1>TRANING01</h1></div>

<div class="sample-contents">
<h2>削除確認</h2>

<?php
	$error_massage='';
	$delete_id =$_GET['delete_id'];
	$delete_comment= $_GET['delete_comment'];
	$delete_time = $_GET['delete_time'];
		
		echo 'TIME:'.$delete_time.'，COMMENT:'.$delete_comment.'　を削除しますか？'.'<br/>';
		echo   '<form method="get" action=" delete_submit.php " >'.'<input type="submit" value="コメント削除" name="submit" />'.'<input type="hidden" value=" '.$delete_id.' " name="delete_c_id">'.'</form>'.     '<form method="get" action=" index.php " >'.'<input type="submit" value="削除しない" name="submit" />'.'</form>';

?>

</body>
</html>
