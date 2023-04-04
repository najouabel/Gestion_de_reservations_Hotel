<?php 

class RoomController{

	public function getAllroom(){
		$room = Room::getAll();
		return $room;
	}
	public function getAllroomsuite(){
		$room = Room::getAllsuite();
		return $room;
	}
	public function getAllroomsimple(){
		$room = Room::getAllsimple();
		return $room;
	}
	

public function getsearch(){ 
			$data = array(
				'rtype' => $_POST['rtype'],
				'stype' => $_POST['stype'],
				'checkin' => $_POST['checkin'],
				'checkout' => $_POST['checkout'],

			);
			$_SESSION['checkin']=$_POST['checkin'];
			$_SESSION['checkout']=$_POST['checkout'];

		// die(print_r($data));
		$room = Room::getAllsearch($data);
		return $room;
	} 

public function getOneRoom(){
			$data = array(
				'ChambreId' => $_POST['ChambreId']
			);
			$Room = Room::getRoom($data);
			$_SESSION['ChambreId']=$_POST['ChambreId'];

			return $Room;
		
	}

public function updateRoom(){
		if(isset($_POST['submit'])){
			
			$file_name=$_FILES['file']['name'];
            $file_tmp=$_FILES['file']['tmp_name'];
            $file_size=$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
            $location= "./views/upload/".$file_name;
            move_uploaded_file($file_tmp,$location);

			$data = array(
				'ChambreId' => $_POST['ChambreId'],
				'typechambre' => $_POST['typechambre'],
				'prix' => $_POST['prix'],
				'nombrepers' => $_POST['nombrepers'],
				'imageroom' => $file_name=$_FILES['file']['name'],
				'typedetype' => $_POST['typedetype'],

				
			
			);
			$result = Room::update($data);
			if($result === 'ok'){
				Session::set('success',' RoomModifié');
				Redirect::to('room');
			}else{
				echo $result;
			}
		}
	}

	public function addRoom(){
		if(isset($_POST['submit'])){
			
            $file_name=$_FILES['file']['name'];
            $file_tmp=$_FILES['file']['tmp_name'];
            $file_size=$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
            $location= "./views/upload/".$file_name;
			$data = array(
				'typechambre' => $_POST['typechambre'],
				'prix' => $_POST['prix'],
				'nombrepers' => $_POST['nombrepers'],
				'typedetype' => $_POST['typedetype'],

				'imageroom' =>$_FILES['file']['name'], 
			);
			$result = Room::add($data);
			if($result === 'ok'){
                move_uploaded_file($file_tmp,$location);
				Session::set('success','Room Ajouté');
				Redirect::to('room');
			}else{
				echo $result;
			}
		}
	}




	

public function deleteRoom(){
		if(isset($_POST['ChambreId'])){
			$data['ChambreId'] = $_POST['ChambreId'];
			$result = Room::delete($data);
			if($result === 'ok'){
				Session::set('success','Room Supprimé');
				Redirect::to('room');
			}else{
				echo $result;
			}
		}
	}

	















	}



?>