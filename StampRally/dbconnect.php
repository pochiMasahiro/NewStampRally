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
		$stmt = $this -> pdo -> query( 'select * from check_point' );
		$out = $stmt -> fetchAll(PDO::FETCH_BOTH);
		return $out;
	}
	
	public function setPointData($title, $path)
	{
		$stmt = $this -> pdo -> prepare('insert into check_point (title, banner) values(:title, :banner)');
		$stmt -> bindValue( ':title', $title );
		$stmt -> bindValue( ':banner', $path );
		$stmt -> execute();
		return 0;
	}
	
	public function setAnqData( $idm, $point, $rate, $clean, $comprehensive )
	{
		$stmt = $this -> pdo -> prepare('insert into point_anq (idm, point, rate, clean, comprehensive) values(:idm, :point, :rate, :clean, :comprehensive)');
		$stmt -> bindValue(':idm', $idm);
		$stmt -> bindValue(':point', $point);
		$stmt -> bindValue(':rate', $rate);
		$stmt -> bindValue(':clean', $clean);
		$stmt -> bindValue(':comprehensive', $comprehensive);
		$stmt -> execute();
		return 0;
	}
	
	public function setUserData( $idm, $purpose, $age, $area, $gender, $visited )
	{
		$stmt = $this -> pdo -> prepare('insert into account (idm, purpose, age, area, gender, visited) values(:idm, :purpose, :age, :area, :gender, :visited)');
		$stmt -> bindValue(':idm', $idm);
		$stmt -> bindValue(':purpose', $purpose);
		$stmt -> bindValue(':age', $age);
		$stmt -> bindValue(':area', $area);
		$stmt -> bindValue(':gender', $gender);
		$stmt -> bindValue(':visited', $visited);
		$stmt -> execute();
		return 0;
	}
	
	public function checkUser( $idm )
	{
		$chk_account = $this -> pdo -> prepare('select idm from account where idm = :idm ');
		$chk_account -> bindValue(':idm', $idm);
		$chk_account -> execute();
		if(($row_name = $chk_account -> fetchColumn()) != null){
			return 1;
		}
		else{
			return 0;
		}
	}
	
}
?>