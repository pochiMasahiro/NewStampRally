<?php

class CheckPointController
{
	public function action()
	{
		require_once "dbconnect.php";
		// チェックポイント名の取り出し
		// パラメータ取り出し用のクラス作成の予定から変更の可能性あり
		$params = $_GET['point'];
		
		// データベースコネクションインスタンスの作成
		$dbConnect = new DBConnect();
		// チェックポイントデータの取り出し
		$pointData = $dbConnect -> getPointData( $params );
		
		// 出力用変数への割り当て
		$out['sign'] = $pointData['sign'];
		$out['name'] = $pointData['name'];
		// Skinnyを使用しての値のバインド
		$Skinny -> SkinnyDisplay( "Check-Point-Temp.html", $out );
	}
}
?>