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
		$stmt = $this -> pdo -> prepare('select * from check_point where point = :point;');
		$stmt -> bindValue( ':point', $param );
		$stmt -> execute();
		$out = $stmt -> fetch(PDO::FETCH_ASSOC);
		return $out;
	}
}
?>