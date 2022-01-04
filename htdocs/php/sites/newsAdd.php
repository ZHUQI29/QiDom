<div class="container-fluid news-container">
  <form class="qd-bg-light"name="newsAdd" action="db-newsAdd.php" method="POST">
    <fieldset>
      <legend>Pressemitteilungssystem</legend>
      <label for="titel">Titel: </label>
      <br>
      <input type="text" id="titel" name="titel" value="">
      <br>
      <label for="newsText">Text: </label>
      <br>
      <textarea name="newsText" id="newsText" cols="30" rows="10"></textarea>
      <form method="post" action="upload.php" enctype="multipart/form-data">
        <input name='uploads[]' type="file" multiple>
        <input type="submit" name="uploadpic" value="upload">
      </form>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"])) {
          $nameErr = "Titel ist erforderlich";
        } else {
          $name = test_input($_POST["title"]);
        }
        if (empty($_POST["newsText"])) {
            $nameErr = "newsText ist erforderlich";
          } else {
            $name = test_input($_POST["newsText"]);
          }
      }
      ?>
