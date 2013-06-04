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

$title="";

?>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING01</h1></div>

<div class="sample-contents">
<h2>サンプルフォーム1</h2>

<div id="get_tittle_form">
  <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<label for="title">title:</label><br />
		<input type="text" id="title" name="title" value="<?php echo $title; ?>"/>
		<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="insert" name="flag">
	</form>

<?php
	$error_massage='';

	$db = mysqli_connect("localhost","root","","TRANING01") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

	// フォームのデータが送信された場合に行う処理	
if(isset($_GET['flag']) && $_GET['flag']=='insert'){
	$title = $_GET['title'];

		// 名前とコメントが入力されているかチェックする。		
	if(empty($title)){ 
		$error_massage= 'titleを入力してください。';
	}
	else{ //コメントをデータベースに保存する
		$query = "SELECT * FROM  board ;";
		$result = mysqli_query($db,$query) or die('ERROR!(query):MySQLサーバーへの接続に失敗しました。');
		$row = mysqli_fetch_array($result);
		
		$query ="INSERT INTO  board (title,created_at) VALUES ('$title',CURRENT_TIMESTAMP);";

		$result = mysqli_query($db,$query) or die('ERROR!(insert coment):MySQLサーバーへの接続に失敗しました。2');
	}
	
}
//elseif(isset($_GET['submit']) && $_GET['submit']=='削除'){
//			$delete_id = $_GET['delete_id'];
//			$query = "DELETE FROM board WHERE id = "."$delete_id;";
//			$result = mysqli_query($db,$query) or die('ERROR!(削除):MySQLサーバーへの接続に失敗しました。');
 //			if($result ===true){
 //				$query_comment = "DELETE FROM coomment WHERE board_id = "."$delete_id;";
 //				$result = mysqli_query($db,$query_comment) or die('ERROR!(削除):MySQLサーバーへの接続に失敗しました。k');
 //			}
//}
?>

	<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="50">id</th><th width="300">title</th><th width="20">comment</th><th width="20">削除</th>
	</tr>

<?php

	$query = "SELECT * FROM  board ;";
	$result = mysqli_query($db,$query) or die('ERROR!(query):MySQLサーバーへの接続に失敗しました。4');
while($row = mysqli_fetch_array($result)){
		 
		$id = $row['id'];
		$title= $row['title'];

		echo '<tr>';
		echo '<td>'.$id.'</td>';
		echo '<td>'.$title.'</td>';
	    echo '<td><a href="comment.php?board_id='.$id.'">コメント<input type="hidden" value="$board_id" name="$board_id"></a></td>';
	    echo   '<td>'.'<form method="get" action=" delete_title.php " >'.'<input type="submit" value="削除" name="submit" />'.'<input type="hidden" value=" '.$id.' " name="delete_id">'.'<input type="hidden" value=" '.$title.' " name=" delete_title">'.'</form>'.'</td>';
		echo '</tr>';
}
?>
</table>
</div>
</div><!-- waku_END -->

</body>

<?php
	mysqli_close($db);
?>

</html>
