// Get the modal
var modal = document.getElementById("cfModal");

// Get the button that opens the modal
var btn = document.getElementById("cfBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var exitBtn = document.getElementById("exitBtn");
var okBtn = document.getElementById("okBtn");

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
  event.preventDefault();
  modal.style.display = "block";
}

exitBtn.onclick = () => modal.style.display = "none";
okBtn.onclick = () => modal.style.display = "none";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$.get( "../../action/student/GetAccountDetail.php", function( data ) {
  console.log(data);
});
