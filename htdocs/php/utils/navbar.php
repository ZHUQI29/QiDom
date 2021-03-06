<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
  $username = (isset($_COOKIE['user'])) ? $_COOKIE['user'] : 'Profil';


  // set depending on user level, different navbar-items
  $dashItems = null;
  switch ($_COOKIE['level']) {
    case 0:
      $navItems = ['News' => 'smallview',
                    'Kontakt' => 'contact',
                    'Login' => 'login'];
      break;

    case 1:
      $navItems = ['News' => 'smallview',
                    'Kontakt' => 'contact',
                    'Tickets' => 'ticketsview',
                    $username => 'profile',
                    'Logout' => 'logout'];
      break;

    case 2:
      $navItems = ['News' => 'smallview',
                    'Kontakt' => 'contact',
                    'Tickets' => 'ticketsview',
                    $username => 'profile',
                    'Logout' => 'logout'];
      $dashItems = ['D-Tickets' => 'tickets'];
      break;

    case 3:
      $navItems = ['News' => 'smallview',
                    'Kontakt' => 'contact',
                    'Tickets' => 'ticketsview',
                    $username => 'profile',
                    'Logout' => 'logout'];
      $dashItems = ['D-Users' => 'personal_data',
                    'D-News' => 'news',
                    'D-Tickets' => 'tickets'];
      break;


    default:
      break;
  }
?>

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
        <?php
          foreach ($dashItems as $key => $value) {
            echo "<li class='nav-item'><a href='index.php?site=dashboard&view=".$value."' class='nav-link qd-btn-hover' style='text-transform: capitalize'>".$key." </a></li>";
          }
          foreach ($navItems as $key => $value) {
            echo "<li class='nav-item'><a href='index.php?site=".$value."' class='nav-link qd-btn-hover' style='text-transform: capitalize'>".$key." </a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
