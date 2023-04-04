<?php
$data = new ReservationController();
$reservations = $data->getAllReservations();
$dataro = new RoomController();
$rooms = $dataro->getAllroom();
$dataad = new AdminController();
$admin = $dataad->getAlladmin();
?>
<div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="padding: 2rem;">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" >
  <label class="btn btn-outline-primary" for="btnradio1"> 
                <a href="<?php echo BASE_URL;?>addro"class="nav-link px-3">
                  <span>ADD ROOM</span>
                </a>
              </label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio2">
    <a href="#listroom"class="nav-link px-3">
                  <span>LIST ROOM</span>
                </a></label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="btnradio3">
  <a href="#listreserv"class="nav-link px-3">
                  <span>LIST RESERVATION</span>
                </a>
  </label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio4"> 
    <a href="<?php echo BASE_URL;?>logout"class="nav-link px-3">
                  
                  <span>LOGOUT</span>
                </a>
              </label>
  
               
</div>
 
      <!-- offcanvas -->
      <main class="mt-5 pt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h4>Dashboard</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-header" id="listreserv">
                  <span><i class="bi bi-table me-2"></i></span> RESERVATION TABLE 
                </div>
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
                          <th>type chambre</th>
                        </tr>
                      </thead>
          <?php foreach($reservations as $reservation):?>

                      <tbody>
                        <tr>
                          <td><?php echo $reservation['datearrive'];?></td>
                          <td><?php echo $reservation['datedepart'];?></td>
                          
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
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-header" id="listroom">
                  <span><i class="bi bi-table me-2"></i></span> ROOM TABLE
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table
                      id="example"
                      class="table table-striped data-table"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th>type chambre</th>
                          <th>nombre pers</th>
                          <th>prix</th>
                          <th>imageroom</th>
                          <th>update/delete</th>


                        </tr>
                      </thead>
                      <?php foreach($rooms as $room):?>

                      <tbody>
                        <tr>
                          <td><?php echo $room['typechambre']." ".$room['typedetype'];?></td>
                          <td><?php echo $room['nombrepers'];?></td>
                          <td><?php echo $room['prix'];?></td>
                          <td><?php echo $room['imageroom'];?></td>
                          <td>
                          <div class="d-flex">

                            <form method="POST" class="me-1" action="updatero">
                        <input type="hidden" name="ChambreId" value="<?php echo $room['ChambreId'];?>">
                        <button class="btn btn-sm btn-warning"><i class="fa fa-eidt"> edit</i></button>
                        
                    </form>
                    <form method="POST" class="me-1" action="deletero">
                        <input type="hidden" name="ChambreId" value="<?php echo $room['ChambreId'];?>">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash">delete</i></button>
                    </form></div></td>

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
      </main>


