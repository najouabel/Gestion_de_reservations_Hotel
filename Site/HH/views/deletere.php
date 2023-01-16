<?php
if(isset($_POST['reservationId'])){
    $exitreservation = new ReservationController();
    $exitreservation->deleteReservation();
}

?>