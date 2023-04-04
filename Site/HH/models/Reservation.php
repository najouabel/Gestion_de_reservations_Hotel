<?php 

class Reservation {

static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM reservation ');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}


	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO Reservation (AdminId,ChambreId,datearrive,datedepart)
			VALUES (:AdminId,:ChambreId,:datearrive,:datedepart)');
		$stmt->bindParam(':AdminId',$data['AdminId']);
		$stmt->bindParam(':ChambreId',$data['ChambreId']);
		$stmt->bindParam(':datearrive',$data['datearrive']);
		$stmt->bindParam(':datedepart',$data['datedepart']);
		return $stmt->execute();
	}
static public function getroomBynoreservation($data){
	$ChambreId = $data['ChambreId'];
	$query = 'SELECT * FROM reservation,room WHERE reservation.ChambreId=:ChambreId AND reservation.ChambreId=room.ChambreId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":ChambreId" => $ChambreId));
			$room = $stmt->fetchAll();
			return $room;

	}

	static public function getByuser($data){
		$reservationId = $data['reservationId'];
		$query = 'SELECT * FROM reservation,admin WHERE reservation.reservationId=:reservationId AND reservation.reservationId=admin.reservationId';
				$stmt = DB::connect()->prepare($query);
				$stmt->execute(array(":ChambreId" => $reservationId));
				$room = $stmt->fetchAll();
				return $room;
	
		}
	


static public function delete($data){
		$reservationId = $data['reservationId'];
		try{
			$query = 'DELETE FROM reservation WHERE reservationId=:reservationId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":reservationId" => $reservationId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	
}
