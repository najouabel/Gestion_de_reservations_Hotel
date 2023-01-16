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

	public function addReservation(){
		if(isset($_POST["submit"])){
        
            $data = array(
                "reservationId" =>  $_SESSION["reservationId"] ,
				"datearrive" => $_POST["datearrive"],
				"datedepart" => $_POST["datedepart"],
				"UserId" => $_POST["UserId"],
				"ChambreId" => $_POST["ChambreId"],

			);
			$result = Reservation::add($data);
			
		}
	}


	
	public function deleteReservation(){
		if(isset($_POST['reservationId'])){
			$data['reservationId'] = $_POST['reservationId'];
			$result = Reservation::delete($data);
			if($result === 'ok'){
				Session::set('success','Reservation Supprimé');
				Redirect::to('reservations');
			}else{
				echo $result;
			}
		}
	}


}



?>