<div id='confirm_delete' class='confirm-modal'>
  <div class='modal-content'>
    <div>
      <h2>Confirm delete?</h2>
      <button class='material-icons' id='close_modal'>close</button>
    </div>
    <button id='confirm_modal'>Delete</button>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("confirm_delete");

// Get the button that opens the modal
// var del_row = document.getElementById("delete_row");
var del_row = document.getElementsByName("delete_row");

// Get the <Close-Button> element that closes the modal
var cls_btn = document.getElementById("close_modal");

// Get the <Confirm-Button> element that refreshes the page with added $_GET['del']
var cnfm_btn = document.getElementById("confirm_modal");

var extension = "&del=";

// When the user clicks on the button, open the modal
for (var i = 0; i < del_row.length; i++) {
  del_row[i].onclick = function() {
    modal.style.display = "block";
    extension = "&del="
    extension = extension.concat(this.classList[0]);
  }
}

// When the user clicks on <Close-Button> (x), close the modal
cls_btn.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// When the user clicks on <Confirm-Button>, refresh page with $_GET['del']
cnfm_btn.onclick = function() {
  modal.style.display = "none";

  var url = window.location.href;
  url = url.concat(extension);
  window.location.href = url;
}
</script>
