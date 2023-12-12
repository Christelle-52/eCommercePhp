<nav class="navbar">
  <div class="container-fluid">
    <ul class="nav justify-content-between align-items-center w-100">
      <div class="nav-brand">
        <a href="../index.php"><img src="../images/logo.png"></a>
      </div>
			<div class="d-flex">
        
       <li class="nav-item d-flex align-items-center">
        <div class="d-flex align-items-center">
          <?php if (isset($_SESSION['userPrenom'])) { ?>
          <span class="text-success py-0 my-0 gy-0">Connecté en tant que <?=$_SESSION['userPrenom']?></span>
          <a class="nav-link" href="../deconnexionReq.php"> Déconnexion </a>
        </div>

        <?php  } else { ?>
					<div class="d-flex align-items-center">
        <span class="text-danger py-0 my-0 gy-0">Vous n'êtes pas connecté.</span>
			</div>
        <?php  } ?>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../menus.php">Menus</a>
        </li>

        <?php if(isset($_SESSION['userPrenom']) && ($_SESSION['userStatut']=="vip" OR $_SESSION['userStatut']=="admin")) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../menusvip.php">Menus VIP</a>
        </li>

        <?php } if (isset($_SESSION['userStatut']) AND ($_SESSION['userStatut']=="admin")) { ?>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Administrateur</a>
        </li>

        <?php } ?>
			</div>
    </ul>
		</div>
</nav>