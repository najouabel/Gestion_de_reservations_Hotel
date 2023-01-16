<?php
$data = new ReservationController();
$reservations = $data->getAllReservations();
$dataro = new RoomController();
$rooms = $dataro->getAllroom();
$dataa = new AdminController();
$admin=$dataa->getadmin();
?>
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="imgprofil"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">profil name</h5>
            <label class="btn btn-outline-primary" for="btnradio4"> 
               <a href="<?php echo BASE_URL;?>logout"class="nav-link px-3">
                  
                 logout
                </a>
              </label>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Les Reservations</span> 
                </p>
                <main class="mt-5 pt-3">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="example"
                      class="table table-striped data-table"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th>datearrive</th>
                          <th>datedepart</th>
                          <th>user email</th>
                          <th>type chambre</th>
                        </tr>
                      </thead>
         <?php foreach($reservations as $reservation):?>
                          
                      <tbody>
                        <tr>
                          <td><?php echo $reservation['datearrive'];?></td>
                          <td><?php echo $reservation['datedepart'];?></td>
                          
                          <td><?php foreach($admin as $admin):?>
                          <?php if($reservation['AdminId']=== $admin['AdminId']) {
                              echo $admin['AdminEmail'];}?>
                              <?php endforeach; ?></td>
                          <td><?php foreach($rooms as $room):?>
                            <?php if($reservation['ChambreId']=== $room['ChambreId']) {
                              echo $room['typechambre']." ".$room['typedetype'];}?>
                              <?php endforeach; ?></td>
                        </tr>
                      
                      
                      </tbody>
          <?php endforeach; ?>

                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
          </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>