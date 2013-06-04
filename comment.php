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
	
$board_id=$_GET['board_id'];
$comment="";
$delete_id="";

?>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING01</h1></div>

<div class="sample-contents">
<h2>サンプルフォーム1</h2>

<div id="get_comment_form">
  <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<label for="comment">comment:</label><br />
		<textarea id="comment" name="comment"  cols="40" rows="5"></textarea>
		<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="insert" name="flag">
		<input type="hidden" value="<?php echo $board_id; ?>" name="board_id">
	</form>

<?php
	$error_massage='';

	echo $board_id.'のコメント一覧';

	$db = mysqli_connect("localhost","root","","TRANING01") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

	// フォームのデータが送信された場合に行う処理	
if(isset($_GET['flag']) && $_GET['flag']=='insert'){
		$comment=$_GET['comment'];
		$board_id =$_GET['board_id'];
		
		// コメントが入力されているかチェックする。		
	if(empty($comment)){ 
		$error_massage= 'titleを入力してください。';
	}

	else{ //コメントをデータベースに保存する
		$query = "SELECT * FROM  comment;";
		$result = mysqli_query($db,$query) or die('ERROR!(query):MySQLサーバーへの接続に失敗しました。');
		$row = mysqli_fetch_array($result);
		
		$query ="INSERT INTO  comment (board_id,comments,created_at) VALUES ('$board_id','$comment',CURRENT_TIMESTAMP)";

		$result = mysqli_query($db,$query) or die('ERROR!(insert coment):MySQLサーバーへの接続に失敗しました。2');
	}
}
//elseif(isset($_GET['submit']) && $_GET['submit']=='削除'){
	//		$delete_id = $_GET['delete_id'];
	//		$query = "DELETE FROM comment WHERE id = "."$delete_id;";
	//		$result = mysqli_query($db,$query) or die('ERROR!(削除):MySQLサーバーへの接続に失敗しました。');
//}
?>

	<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="50">time</th><th width="300">comment</th><th width="20">削除</th>
	</tr>

<?php
	$query = "SELECT * FROM  comment where board_id = "."$board_id ;";
	$result = mysqli_query($db,$query) or die('ERROR!(query):MySQLサーバーへの接続に失敗しました。4');
	
while($row = mysqli_fetch_array($result)){
		 
		$time = $row['created_at'];
		$comment= $row['comments'];
		$id= $row['id'];

		echo '<tr>';
		echo '<td>'.$time.'</td>';
		echo '<td>'.$comment.'</td>';
	    echo '<td>'.'<form method="get" action=" delete_comment.php " >'.'<input type="submit" value="削除" name="submit" />'.'<input type="hidden" value=" '.$id.' " name="delete_id">'.'<input type="hidden" value=" '.$created_at.' " name="delete_time">'.'<input type="hidden" value=" '.$comment.' " name="delete_comment">'.'</form>'.'</td>';
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
