<?php
  // news upload only for admins
  if($_COOKIE['level'] < 3 && $_GET['site'] == 'news') {
    // echo "<script>window.location.href='index.php?site=news-view';</script>";
  }
 ?>

<div class="container-fluid">
  <div class="d-flex justify-content-center my-4">
    <form action='photo-upload.php?site=<?php echo $_GET['site'] ?>' name="upload" method=post enctype="multipart/form-data">
      <legend style="text-transform: capitalize"><?php echo $_GET['site'] ?>-Upload</legend>
      <label for="title">Title: </label>
      <br>
      <input type="text" id="title" name="title" value="">
      <br>
      <label for="text">Text: </label>
      <br>
      <textarea type="text" id="text" name="text" cols="30" rows="15"></textarea>
      <br>
      <label class="mx-3" for="photo">Photo: </label>
      <input class="" type="file" id="photo" name="photo[]" value="" multiple>
      <br>
      <input class="my-3" type="submit" value="Upload" name="upload">
    </form>
  </div>
</div>
