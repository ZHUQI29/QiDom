<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Welcome</title>
</head>

<body>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="qd-btn-hover px-3 logo" href='index.php?site=home'>
        <strong>QiÐom</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href='index.php?site=news' class="nav-link qd-btn-hover">News </a>
          </li>
          <li class="nav-item">
            <a href='index.php?site=contact' class="nav-link qd-btn-hover">Contact </a>
          </li>
          <li class="nav-item">
            <a href='index.php?site=login' class="nav-link qd-btn-hover">Login </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="banner">
    <img src="../img/banner.png" alt="cool banner" class="img-fluid">
  </div>

  <div class="container-fluid box-1">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="upload" method=post enctype="multipart/form-data">
      <legend>Pressemitteilungssystem</legend>
      <label for="title">Title: </label>
      <br>
      <input type="text" id="title" name="title" value="">
      <br>
      <label for="text">Text: </label>
      <br>
      <textarea type="text" id="text" name="text" cols="25" rows="10"></textarea>
      <br>
      <label for="photo">Photo: </label>
      <br>
      <input type="file" id="photo" name="photo" value="">
      <br>
      <input type="submit" value="hochladen" name="upload">

    </form>
  </div>

<?php include('_BIN/console.php'); ?>
<?php
  error_reporting(-1); // ALL messages
  ini_set('display_errors', 'On');
  $var = 'dsgasdgag';
  console_log($var);
 ?>

<?php

if (isset($_POST['upload'])) {
  include('photo-upload.php');
}
?>


</body>

</html>
