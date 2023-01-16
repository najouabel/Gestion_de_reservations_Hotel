<?php
if(isset($_POST['terminer'])){
    $reservation= new ReservationController();
    $reservation->addReservation();
}
?>
    
       <div class="booking">
       
        
     <form id="ajouterreservation" >
        <!-- start step indicators -->
        <div class="form-header d-flex mb-4">
            <span class="stepIndicator">select date</span>
            <span class="stepIndicator">select room</span>
            <span class="stepIndicator">confirm</span>
        </div>
        <!-- end step indicators -->
    
        <!-- step one -->
        <div class="step">
            
            <div class="mb-3">
                <input type="date" placeholder="date arrive :" oninput="this.className = ''" name="datearrive">
            </div>
            <div class="mb-3">
                <input type="date" placeholder="date depart" oninput="this.className = ''" name="datedepart">
            </div>
            <div class="mb-3">
                <input type="number" placeholder="nombre Guests:" min="1" max="6" step="1" value="1" oninput="this.className = ''" name="guest">
            </div>
        </div>
    
        <!-- step two -->
        <div class="step">
           
         
        </div>
        
    
        <!-- step three -->
        <div class="step">
            
            
        </div>
    
        <!-- start previous / next buttons -->
        <div class="form-footer d-flex">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
        <!-- end previous / next buttons -->
    </form>
    </div>