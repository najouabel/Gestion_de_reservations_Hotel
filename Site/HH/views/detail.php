<?php

        $data = new RoomController();
        $rooms = $data->getOneRoom();
    
    
?>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="views/public/img/gallery/gallery-2.jpg" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3><?= $rooms['typechambre'].$rooms['typedetype']; ?></h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <h2><?php echo $rooms['prix'];?>$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion <?php echo $rooms["nombrepers"];?></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">Motorhome or Trailer that is the question for you. Here are some of the
                                advantages and disadvantages of both, so you will be confident when purchasing an RV.
                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth
                                wheeler? The advantages and disadvantages of both are studied so that you can make your
                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an
                                achievement of a lifetime. It can be similar to sojourning with your residence as you
                                search the various sites of our great land, America.</p>
                            <p>The two commonly known recreational vehicle classes are the motorized and towable.
                                Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth
                                wheel has the attraction of getting towed by a pickup or a car, thus giving the
                                adaptability of possessing transportation for you when you are parked at your campsite.
                            </p>
                        </div>
                    </div>
                    
                   
                </div>
                <div class="col-lg-4">
                <div class="booking-form ">
                        <h3> Your Reservation</h3>
                        <form  method="POST" action="gests">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="date" name="checkin" class="date-input" id="date-in" value="<?php echo $_SESSION['checkin'];?>" readonly>
                                
                            </div>
                            <div class="check-date">
                                <l.carousel-itemabel for="date-out">Check Out:</label>
                                <input type="date" name="checkout" class="date-input" id="date-out" value="<?php echo $_SESSION['checkout'];?>" readonly>
                                
                            </div>
                    
                            <select class="form-select mt-3 mb-5 text-center" name="guestnum" id ="guetsss" aria-label="Default select example" onchange="addRows()">


                            <option selected value="1">One</option>
                            <?php if($rooms['typechambre'] == 'suite') { ?>
                                <?php if($rooms['nombrepers']>=2) {?>
                            <option value="2">Two</option><?php } ?>
                            <?php if($rooms['nombrepers']>=3){  ?>
                            <option value="3">Three</option><?php } ?>
                            <?php if($rooms['nombrepers']>=4){?>
                            <option value="4">Four</option><?php } ?>
                            <?php if($rooms['nombrepers']>=5){  ?>
                            <option value="5">Five</option><?php } ?>

                            <?php }
                        ?>
                        </select>

                            <table class="table table-striped table-dark mt-5 mb-5 " id="table22">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col " style=" text-align: center;"> Name</th>
                            <th scope="col " style=" text-align: center;">Birth Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="text" name="name[]" class="form-control"></td>
                            <td><input type="date" name="age[]" class="form-control " style="text-align: center;"></td>
                        </tr> 
                        </tbody>
                    </table>
                           
                            <button type="submit" name="addre"> add </button>
                        
                        </form>
                               </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
