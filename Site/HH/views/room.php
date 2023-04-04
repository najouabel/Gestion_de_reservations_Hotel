<?php
$data = new RoomController();
$rooms = $data->getsearch();

?>

 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="home">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
 <!-- Rooms Section Begin -->
 <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                
            <?php foreach($rooms as $room):?>
               
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                    <img src="./views/upload/<?php echo $room['imageroom'];?>" alt="">
                        <div class="ri-text">
                       
                            <h3><?php echo $room['prix'];?></h3>
                            <table>
                                <tbody>
                                    
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion <?php echo $room['nombrepers'];?></td>
                                    </tr>
                                
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="POST" class="me-1" action="detail">
                        <input type="hidden" name="ChambreId" value="<?php echo $room['ChambreId'];?>">
                        <button> <a class="primary-btn">BOOK NOW</a></button>
                        
                    </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
        </div>
    </section>
<!-- Rooms Section End -->