<?php 

class Room {

	static public function getAll(){
		
		$stmt = DB::connect()->prepare('SELECT * FROM room ');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}
	static public function getAllsimple(){
		
		$stmt = DB::connect()->prepare('SELECT * FROM room where typechambre="chambre"');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}

	static public function getAllsuite(){
		
		$stmt = DB::connect()->prepare('SELECT * FROM room where typechambre="suite" ');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}




	static public function getBySearch($data){
	$nombrepers = $data['nombrepers'];
	
	$query = 'SELECT * FROM room where  nombrepers >=:nombrepers ';

			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":nombrepers" => $nombrepers
		));
			$room = $stmt->fetchAll();;
			return $room;



	}

static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE room SET nombrepers=:nombrepers,prix=:prix,imageroom=:imageroom,typechambre=:typechambre,typedetype=:typedetype WHERE ChambreId=:ChambreId');
		$stmt->bindParam(':ChambreId',$data['ChambreId']);
		$stmt->bindParam(':nombrepers',$data['nombrepers']);
		$stmt->bindParam(':prix',$data['prix']);
		$stmt->bindParam(':imageroom',$data['imageroom']);
		$stmt->bindParam(':typechambre',$data['typechambre']);
		$stmt->bindParam(':typedetype',$data['typedetype']);

			
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
		
	
	}

static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO room (nombrepers,prix,imageroom,typechambre,typedetype)
			VALUES (:nombrepers,:prix,:imageroom,:typechambre,:typedetype)');
		
		$stmt->bindParam(':nombrepers',$data['nombrepers']);
		$stmt->bindParam(':prix',$data['prix']);
		$stmt->bindParam(':imageroom',$data['imageroom']);
		$stmt->bindParam(':typechambre',$data['typechambre']);
		$stmt->bindParam(':typedetype',$data['typedetype']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}

static public function getRoom($data){
		$ChambreId = $data['ChambreId'];
		try{
			$query = 'SELECT * FROM room WHERE ChambreId=:ChambreId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":ChambreId" => $ChambreId));
			$room = $stmt->fetch(PDO::FETCH_ASSOC);
			return $room;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

    static public function delete($data){
		$ChambreId = $data['ChambreId'];
		try{
			$query = 'DELETE FROM room WHERE ChambreId=:ChambreId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":ChambreId" => $ChambreId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}


	