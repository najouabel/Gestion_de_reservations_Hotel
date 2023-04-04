
function changeselect(value){
    var i= document.getElementById("selectsuite");
    
    if(value=='suite'){
     
       i.classList.remove("d-none");
    }else{
        i.classList.add("d-none");
    }

}
function addRows() {

    var select = document.getElementById("guetsss");
    var number = select.options[select.selectedIndex].value;
    var table = document.getElementById("table22");

    // Remove existing rows
    while (table.rows.length > 1) {
      table.deleteRow(1);
    }

    // Add new rows
    for (var i = 1; i <= number; i++) {
      var row = table.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = i;
      cell2.innerHTML = '<input type="text" name="name[]" class="form-control">';
      cell3.innerHTML = '<input type="date" name="age[]" class="form-control">';
    }
  }
  