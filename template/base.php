<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/index.css" />
    <title><?php echo $templateParams["title"]; ?></title>
    <!-- Per ora questo sotto è inutile. Sarebbe da mettere al posto degli <script> sopra. E analogamente andrebbe fatto per gli stylesheet. -->
    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
</head>
<body class="bg-light">
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="index.php"><h1>GameHub</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto my-auto">
            <?php if(isLoggedIn()): 
              if(isUserLoggedIn()) {
                $newNotifies = $dbr->getUnreadNotifies(substr($_SESSION['userId'],2)) > 0;
              } else {
                $newNotifies = $dbr->getUnreadNotifiesSeller(substr($_SESSION['userId'],2)) > 0;
              }  
            ?>
            <li class="nav-item dropdown active mr-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Profilo <?php if($newNotifies) echo '<span class="badge badge-pill"><i class="fa fa-bell"></i></span>'; ?>
              </a>
              <?php if(isUserLoggedIn()): ?>
              <div class="dropdown-menu bg-dark py-0">
                <a class="dropdown-item text-light" href="profile.php">Dati personali</a>
                <a class="dropdown-item text-light" href="profile.php?page=orders">I miei ordini</a>
                <a class="dropdown-item text-light" href="profile.php?page=wishlist">La mia lista dei desideri</a>
                <a class="dropdown-item justify-content-between d-flex align-items-center text-light" href="profile.php?page=notifications">Notifiche
                    <?php if($newNotifies): ?>
                    <span class="badge badge-pill"><?php echo $dbr->getUnreadNotifies(substr($_SESSION['userId'],2));?></span></a>
                    <?php endif;?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-light" href="login.php?logout">Esci</a>
              </div>
              <?php else: ?>
                <div class="dropdown-menu bg-dark py-0">
                <a class="dropdown-item text-light" href="seller.php">Dati venditore</a>
                <a class="dropdown-item text-light" href="seller.php?page=catalogue">Catalogo</a>
                <a class="dropdown-item text-light" href="seller.php?page=orders">Ordini in sospeso</a>
                <a class="dropdown-item justify-content-between d-flex align-items-center text-light" href="seller.php?page=notifications">Notifiche
                    <?php if($newNotifies): ?>
                    <span class="badge badge-pill"><?php echo $dbr->getUnreadNotifiesSeller(substr($_SESSION['userId'],2));?></span></a>
                    <?php endif;?>
                <div class="dropdown-divider m-0"></div>
                <a class="dropdown-item text-light" href="login.php?logout">Esci</a>
              </div>
            </li>
            <?php endif; else:?>
            <li class="nav-item active mr-2">
              <a class="nav-link" href="login.php">Accedi</a>
            </li>
            <?php endif; ?>
            <?php if(isUserLoggedIn()):?>
            <li class="nav-item active">
              <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Carrello</a>
            </li>
            <?php endif; ?>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-md-3 mr-lg-5" action="search.php" method="GET">
            <input class="form-control mr-1 col-11 col-md-9" name="name" type="search" placeholder="Cerca..." aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
    </nav>   
    <main>      
    <?php
        if(isset($templateParams["name"])){
            require($templateParams["name"]);
        }
    ?>
    </main>
    <footer>
        <div class="row bg-dark py-2 mt-5 mx-0">
            <div class="col text-center"><p>GameHub</p></div>
        </div>
    </footer>
</div>
</body>
</html>