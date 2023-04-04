<?php 

class AdminController{
  
    public function getAlladmin(){
		$admin = Admin::getAll();
		return $admin;
	}
    public function auth(){
     
        if(isset($_POST['submit'])){
            $data['AdminEmail']=$_POST['AdminEmail'];
            $result = Admin::login($data);
            if($result->rolee === "admin" ){
                if($result->AdminEmail === $_POST['AdminEmail'] && $result->AdminPassword === $_POST['AdminPassword'] ){
                    $_SESSION['loggedd'] = true;
                    $_SESSION['AdminEmail'] = $result->AdminEmail;
                    $_SESSION['AdminId'] = $result->AdminId;

                    Redirect::to('dashbord');
                } else {

                    Session::set('error','email or password not valid');
                    Redirect::to('login');
                }
        }else if($result->rolee === "user"){
                if($result->AdminEmail === $_POST['AdminEmail'] && $result->AdminPassword === $_POST['AdminPassword'] ){
                    $_SESSION['logged'] = true;
                    $_SESSION['AdminEmail'] = $result->AdminEmail;
                    $_SESSION['AdminId'] = $result->AdminId;

                    Redirect::to('profil');
                } else {
                    Session::set('error','email or password not valid');
                    Redirect::to('login');
                }
        }else {
                    
                    Session::set('error','email or password not valid');
                    Redirect::to('login');
                }
    }
    }
    static public function logout(){
        session_destroy();
    }

    public function registeradmin(){
		if(isset($_POST['submit'])){
			
			$data = array(
				'AdminName' => $_POST['AdminName'],
				'AdminEmail' => $_POST['AdminEmail'],
				'AdminPassword' => $_POST['AdminPassword'],
				'imageadmin' => $_POST['imageadmin'],

			);
			$result = Admin::createadmin($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}

	public function getadmin(){
		if(isset($_POST['submit'])){
			$data = array(
				'AdminId' => $_SESSION['AdminId'] ,
				
			);
			$result = Admin::getadmin($data);
			if($result === 'ok'){
				Session::set('success','compte');
				Redirect::to('profil');
			}else{
				echo $result;
			}
		}
	}
    
   

}