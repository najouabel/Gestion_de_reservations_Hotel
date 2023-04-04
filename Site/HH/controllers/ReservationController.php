<?php 

class ReservationController{


public function getAllReservations(){
		$reservations = Reservation::getAll();
		return $reservations;
	}

	public function getReservationsuser(){
		if(isset($_POST['reservationId'])){
			$data['reservationId'] = $_POST['reservationId'];
			$reservations = Reservation::getByuser($data);
			if($reservations === 'ok'){
				Session::set('success','Reservation Supprimé');
				Redirect::to('reservations');
			}else{
				echo $reservations;
			}
		}
		return $reservations;
	}
	public function getAllpersonne(){
		$pers = personne::getAll();
		return $pers;
	}
	public function addReservation(){
            $data = array(
				"datearrive" => $_POST["checkin"],
				"datedepart" => $_POST["checkout"],
				"AdminId" =>$_SESSION['AdminId'],
				"ChambreId" =>$_SESSION['ChambreId'],
				
			);

			$data2 = array(
				"num" =>$_POST["guestnum"],
				"name" => $_POST["name"],
				"age" => $_POST["age"],
			);
			if(Reservation::add($data)){
				
				if(personne::createperson($data2)){
				    Session::set('success','Reservation ajoute');
					Redirect::to('profil');
				}else {
					print("error");
				}
					Redirect::to('profil');

			}
		
	}
	public function deleteReservation(){
		if(isset($_POST['reservationId'])){
			$data['reservationId'] = $_POST['reservationId'];
			$result = Reservation::delete($data);
			if($result === 'ok'){
				Session::set('success','Reservation Supprimé');
				Redirect::to('profil');
			}else{
				echo $result;
			}
		}
	}


}



?>