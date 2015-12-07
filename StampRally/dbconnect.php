<?php

class DBConnect
{
	private $pdo;
	
	public function __construct()
	{
		try{
			$this -> pdo = new PDO('mysql:host=localhost;dbname=stamprally;charset=utf8', 'piyo', 'piyopiyo', array(PDO::ATTR_EMULATE_PREPARES => false));
		} catch(PDOException $e){
			exit('データベース接続失敗。'.$e->getMessage());
		}
	}
	
	public function getPointData( $param )
	{
		/* データ取り出し */
		$stmt = $this -> pdo -> prepare('select * from check_point where point = :point;');
		$stmt -> bindValue( ':point', $param );
		$stmt -> execute();
		$out = $stmt -> fetch(PDO::FETCH_ASSOC);
		
		/* アンケートフォームから戻るためのpath */
		$out[path] = str_replace(" ", "", $out[title]);
	
		return $out;
	}
	
	public function getAllUserData()
	{
		$stmt = $this -> pdo -> query( 'select * from passage_time order by idm, time' );
		$out = $stmt -> fetchAll(PDO::FETCH_BOTH);
		return $out;
	}
	
	public function getAllPointData()
	{
		$stmt = $this -> pdl -> query( 'select * from check_point' );
		$out = $stmt -> fetchAll(PDO::FETCH_BOTH);
		return $out;
	}
	
	public function setPointData($title, $path)
	{
		$stmt = $this -> pdl -> prepare('insert into check_point (title, banner) values(:title, :banner)');
		$stmt -> bindValue( ':title', $title );
		$stmt -> bindValue( ':banner', $path );
		$stmt -> execute();
		return 0;
	}
}
?>