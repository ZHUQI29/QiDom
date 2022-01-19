<script type="text/javascript">
  // extract first classname from 'add new'-Button, which will be 'news', 'tickets' or 'personal_data'.
  // assign onclick-function to url to open it.
  var addBtn = document.getElementById("addBtn");
  addBtn.onclick = function() {
    window.location.assign(
      window.location.href.split('=')[0] + '=' + addBtn.className.split(' ')[0]);
  }
</script>
