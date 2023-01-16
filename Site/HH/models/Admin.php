<?php
class Admin{

    public static function login($data){
        $AdminEmail = $data['AdminEmail'];
        try{
            $query = 'SELECT * FROM admin WHERE AdminEmail=:AdminEmail';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":AdminEmail" => $AdminEmail));
            $admin = $stmt->fetch(PDO::FETCH_OBJ);
            return $admin;
            if($stmt->execute()){
                return 'ok';
            } 
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

   static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM Admin WHERE rolee="user" ');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}

    static public function createadmin($data){
        $data['rolee']="user";
		$stmt = DB::connect()->prepare('INSERT INTO admin (AdminName,AdminEmail,AdminPassword,imageadmin,rolee )
			VALUES (:AdminName,:AdminEmail,:AdminPassword,:imageadmin,:rolee)');
		$stmt->bindParam(':AdminName',$data['AdminName']);
		$stmt->bindParam(':AdminEmail',$data['AdminEmail']);
		$stmt->bindParam(':AdminPassword',$data['AdminPassword']);
		$stmt->bindParam(':imageadmin',$data['imageadmin']);
		$stmt->bindParam(':rolee',$data['rolee']);


		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}
    static public function createperson($data){
		$stmt = DB::connect()->prepare('INSERT INTO admin (AdminName,prenom,daten,rolee)
			VALUES (:AdminName,:prenom,:daten,:rolee)');
		$stmt->bindParam(':AdminName',$data['AdminName']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':daten',$data['daten']);
		$stmt->bindParam(':rolee',"person");


		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}

    static public function updateperson($data){
        $AdminId = $data['AdminId'];
            $stmt = DB::connect()->prepare('UPDATE admin SET AdminName= :AdminName,prenom=:prenom,daten=:daten,rolee=:rolee WHERE AdminId=:AdminId');
            $stmt->bindParam(':AdminId',$data['AdminId']);
            $stmt->bindParam(':AdminName',$data['AdminName']);
            $stmt->bindParam(':prenom',$data['prenom']);
            $stmt->bindParam(':daten',$data['daten']);
            $stmt->bindParam(':rolee',"person");
                
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            // $stmt->close();
            $stmt = null;
            
        
        }

        static public function getperson($data){
            $AdminId = $data['AdminId'];
            $rolee="person";
                $query = 'SELECT * FROM admin WHERE AdminId=:AdminId && rolee=:rolee' ;
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":AdminId" => $AdminId));
                $user = $stmt->fetchAll();
                return $user;
        
        }
        static public function getadmin($data){
            $AdminId = $data['AdminId'];
            $rolee="user";
                $query = 'SELECT * FROM admin WHERE AdminId=:AdminId && rolee=:rolee' ;
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":AdminId" => $AdminId,":rolee" => $rolee));
                $user = $stmt->fetchAll();
                return $user;
        
        }
}
