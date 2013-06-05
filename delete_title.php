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
$delete_id='';
$delete_title='';
?>
</head>
<body>
<div id="sample-title"><h1>TRANING01</h1></div>

<div class="sample-contents">
<h2>削除確認</h2>

<?php
	$error_massage='';
	$delete_id =$_GET['delete_id'];
	$delete_title= $_GET['delete_title'];
		
		echo 'ID:'.$delete_id.'，'.'TITLE:'.$delete_title.'　を削除しますか？'.'<br/>';
		echo   '<form method="get" action=" delete_submit.php " >'.'<input type="submit" value="タイトル削除" name="submit" />'.'<input type="hidden" value=" '.$id.' " name="delete_id">'.'</form>'.     '<form method="get" action=" index.php " >'.'<input type="submit" value="削除しない" name="submit" />'.'</form>';

?>

</body>
</html>
