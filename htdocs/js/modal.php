<div id='confirm_delete' class='confirm-modal'>
  <div class='modal-content'>
    <div>
      <h2>Confirm delete?</h2>
      <button class='material-icons b-button' id='close_modal'>close</button>
    </div>
    <button id='confirm_modal' class='xb-button'>Delete</button>
  </div>
</div>

<script>
// DELETE ENTRY
// Get the modal
var modal = document.getElementById("confirm_delete");

// Get the button that opens the modal
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
    // first class name is inserted by php, when loading the page
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

// EDIT ENTRY, same as "delete"
var edit_row = document.getElementsByName("edit_row");
for (var i = 0; i < edit_row.length; i++) {
  edit_row[i].onclick = function() {
    extension = window.location.href.split("=")[0];

    switch (this.classList[1]) {
      case 'news':
        extension = extension.concat("=newsview&id=" + this.classList[0])
        break;

      case 'tickets':
        extension = extension.concat("=ticketview&id=" + this.classList[0])
        break;

      case 'personal_data':
        extension = extension.concat("=profile&id=" + this.classList[0])
        break;

      default:
      break;

    }
    window.location.href = extension;
  }
}
</script>
