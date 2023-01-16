<?php
if(isset($_POST['ChambreId'])){
    $exitroom = new RoomController();
    $exitroom->deleteRoom();
}

?>