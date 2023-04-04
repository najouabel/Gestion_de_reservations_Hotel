<?php
class personne{

  

   static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM personne');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}

   
    static public function createperson($data){
        $stmtt = DB::connect()->query('SELECT reservationId FROM reservation WHERE reservationId = (SELECT MAX(reservationId) FROM reservation);');
       $a=$stmtt->fetch();
        for ($i = 0; $i < $data['num']; $i++) {
            
        	$stmt = DB::connect()->prepare('INSERT INTO personne (reservationId,p_name,daten)
			VALUES (:reservationId,:p_name,:daten)');
		$stmt->bindParam(':reservationId',$a['reservationId']);
		$stmt->bindParam(':p_name',$data['name'][$i]);
		$stmt->bindParam(':daten',$data['age'][$i]);

		return $stmt->execute();
	}}
    

    static public function updateperson($data){
        $personneId = $data['personneId'];
            $stmt = DB::connect()->prepare('UPDATE admin SET p_name= :p_name,p_prenom=:p_prenom,daten=:daten  WHERE personneId=:personneId');
            $stmt->bindParam(':personneId',$data['personneId']);
            $stmt->bindParam(':p_name',$data['p_name']);
            $stmt->bindParam(':p_prenom',$data['p_prenom']);
            $stmt->bindParam(':daten',$data['daten']);
                
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            // $stmt->close();
            $stmt = null;
            
        
        }

        static public function getperson($data){
            $personneId = $data['personneId'];
            $rolee="person";
                $query = 'SELECT * FROM admin WHERE personneId=:personneId ' ;
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":personneId" => $personneId));
                $user = $stmt->fetchAll();
                return $user;
        
        }
        
}
