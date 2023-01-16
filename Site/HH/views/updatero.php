<?php
if(isset($_POST['ChambreId'])){
    $exitroom= new RoomController();
    $room= $exitroom->getOneRoom();
}

if(isset($_POST['submit'])){
    $exitroom = new RoomController();
    $exitroom->updateRoom();
}

?>
<div class="booking">
<div class="container mt-3">
    <div class="card-header">Update room</div>
   
   <form method="POST" enctype="multipart/form-data" >
    <div class="form-group">
    <label for="typechambre">typechambre</label>
    <input value="<?php echo $room['typechambre']; ?>"  type="text" name="typechambre" class="form-control" placeholder="typechambre">  
    <label for="nombrepers">nombrepers</label>
    <input value="<?php echo $room['nombrepers']; ?>"  type="number" name="nombrepers" class="form-control" placeholder="nombrepers">
    <label for="prix">prix</label>
    <input value="<?php echo $room['prix']; ?>"  type="text" name="prix" class="form-control" placeholder="prix">
    <label for="typedetype">type de type</label>
    <input value="<?php echo $room['typedetype']; ?>"  type="text" name="typedetype" class="form-control" placeholder="typedetype">  
    <label for="image"> IMAGE</label>
    <input value="<?php echo $room['imageroom']; ?>"  type="file" name="file" class="form-control" >
    <button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</button>
   
   </form>
   </div>
   </div> 
</div>

