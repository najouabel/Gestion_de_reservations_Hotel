<?php
if(isset($_POST['submit'])){
    $loginAdmin = new AdminController();
    $loginAdmin->auth();
}

?>
	
    <div class="login-page">
    <!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="register" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <!-- Pills navs -->
  
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <?php include "./views/includes/alerts.php" ?>
     
      
        <div class="text-center mb-3">
          <p>Sign in with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
  
        <p class="text-center">or:</p>
       <form  method="POST"> 
        <!-- Email input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="loginName" >Email </label>
          <input type="email"  id="AdminEmail" name="AdminEmail" class="form-control" />
        </div>
  
        <!-- Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="loginPassword" >Password</label>
          <input type="password" name="AdminPassword" id="AdminPassword" class="form-control" />
        </div>

        <!-- Submit button -->
        <button type="submit" name="submit"  class="btn btn-primary btn-block mb-4">Sign in</button>
     
        
      </form>
    </div>
   
  </div>
</div >
  <!-- Pills content -->
    
 