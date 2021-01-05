<div class="row mt-4 mx-0">
    <div class="col-12 col-md-7 offset-md-4 p-0">
        <h2>
        <?php 
            echo $templateParams["header"];
        ?>
        </h2>
    </div>
</div>
<div class="row mx-0">
    <button class="btn d-md-none mb-0 mx-3 btn-block" type="button" data-toggle="collapse" data-target="#dashboard">
        Dashboard
    </button>
    <div id="dashboard" class="collapse show col-md-3 mb-md-0 mb-3 my-md-4">
        <ul class="list-group pl-0 mt-0">
            <li class="list-group-item bg-dark"><a href="profile.php">Dati personali</a></li>
            <li class="list-group-item bg-dark"><a href="profile.php?page=orders">I miei ordini</a></li>
            <li class="list-group-item bg-dark"><a href="profile.php?page=wishlist">La mia lista dei desideri</a></li>
            <li class="list-group-item bg-dark justify-content-between d-flex align-items-center"><a href="profile.php?page=notifications">Notifiche</a>
                <span class="badge badge-light badge-pill"><?php echo $dbr->getUnreadNotifies($userId); ?></span></li>
        </ul>
    </div>
    <?php
        switch($templateParams["page"]) {
            case "data":
                require("template-data.php");
                break;
            case "orders":
                require("template-orders.php");
                break;
            case "wishlist":
                require("template-wishlist.php");
                break;
            case "notifications":
                require("template-notifications.php");
                break;
        }
    ?>
    
</div>