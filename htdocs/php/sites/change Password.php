<div class="container-fluid login-container">
  <form class="qd-bg-light reg-form-con d-lg-flex justify-content-center"name="change Password" action="db-change password.php" method="POST">
    <div class="d-flex flex-column align-items-center justify-content-between">
<fieldset class="mx-3">
        <legend>Change Password</legend>
        <br>
        <br>
        <label for="old_password">Old Password: </label>
        <br>
        <input type="password" id="old_password" name="old_password" value="">
        <br>
        <label for="new_password">New password: </label>
        <br>
        <input type="password" id="new_password" name="new_password" value="" >
        <br>
        <label for="new_password_conf">Wiederholen: </label>
        <br>
        <input type="password" id="new_password_conf" name="new_password_conf" value="" >
        <br>
        <input class="submit-button mt-3 mb-5 mb-lg-auto" type="submit" id="submit" name="submit" value="change Password">
        </fieldset>
