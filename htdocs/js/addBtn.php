<script type="text/javascript">
  var addBtn = document.getElementById("addBtn");
  addBtn.onclick = function() {
    console.log(addBtn.className.split(' ')[0]);
    window.location.assign(
      window.location.href.split('=')[0] + '=' + addBtn.className.split(' ')[0]);
  }
</script>
