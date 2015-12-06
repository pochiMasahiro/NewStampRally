<!--
* チェックポイントディスパッチャ
** バナー画像、タイトルをページに埋め込む
-->

<?php
	/* ファイルの読み込み */
	require "./Skinny.php"; // phpテンプレート
	require "dbconnect.php"; // データベースアクセス
	
	/* Cookieの確認 */
	if( ( $params = $COOKIE[checkpoint] ) == Null ){
		$params = $_GET[point];
		//$Skinny -> $SkinnyDisplay("select-checkpoint.html");
		//exit();
	}
	$params = $_GET[point];
	// データベースコネクションインスタンスの作成
	$dbConnect = new DBConnect();
	// チェックポイントデータの取り出し
	$pointData = $dbConnect -> getPointData( $params );
	
	// Skinnyを使用しての値のバインド
	$Skinny -> SkinnyDisplay( "point.html", $pointData );
?>