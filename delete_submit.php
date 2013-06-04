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
?>
</head>
<body>
<div id="sample-title"><h1>TRANING01</h1></div>

<div class="sample-contents">
<h2>削除完了画面</h2>

<?php
	$error_massage='';
	$delete_id =$_GET['delete_id'];
	$delete_title= $_GET['delete_title'];
	$delete_c_id =$_GET['delete_c_id'];
	$delete_comment =$_GET['delete_id'];
	
	
	$db = mysqli_connect("localhost","root","","TRANING01") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

if(isset($_GET['submit']) && $_GET['submit']=='タイトル削除'){
		$delete_id = $_GET['delete_id'];
		$query = "DELETE FROM board WHERE id = "."$delete_id;";
		$result = mysqli_query($db,$query) or die('ERROR!(削除):MySQLサーバーへの接続に失敗しました。');
}
else if(isset($_GET['submit']) && $_GET['submit']=='コメント削除'){
		$delete_id = $_GET['delete_c_id'];
		$query = "DELETE FROM comment WHERE id = "."$delete_c_id;";
		$result = mysqli_query($db,$query) or die('ERROR!(削除):MySQLサーバーへの接続に失敗しました。');
}

?>
<br/>
<a href= "/index.php">TOPに戻る</a>
</body>

<?php
	mysqli_close($db);
?>

</html>
