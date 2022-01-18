<script type="text/javascript">
  var addBtn = document.getElementById("addBtn");
  addBtn.onclick = function() {
    // extract first classname from 'add new'-Button, which will be 'news', 'tickets' or 'personal_data'.
    //assing onclick-function to url to open it.
    window.location.assign(
      window.location.href.split('=')[0] + '=' + addBtn.className.split(' ')[0]);
  }
</script>
