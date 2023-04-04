<?php
if(isset($_POST['submit'])){
    $newroom = new RoomController();
    $newroom->addRoom();
}
?>
<div class="booking">
<div class="container mt-3">
    <div class="card-header">ADD room</div>
   
   <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="typechambre">typechambre</label>
    <input type="text" name="typechambre" class="form-control" placeholder="typechambre">   
    <label for="nombrepers">max nombre personnes</label>
    <input type="number" name="nombrepers" class="form-control" placeholder="nombrepers">
    <label for="prix">prix</label>
    <input type="text" name="prix" class="form-control" placeholder="prix">
    <label for="typedetype">type de type</label>
    <input type="text" name="typedetype" class="form-control" placeholder="typedetype">   
    <label for="imageroom"> IMAGE</label>
    <input type="file" name="file" class="form-control" >
    <button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</button>
    
    </div>
   </form>
   </div> 
</div>


