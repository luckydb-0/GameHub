<div class="row mt-4 mx-0">
    <div class="col-12 col-md-7 offset-md-4 pl-0">
        <h2><?php echo $templateParams["header"]; ?></h2>
    </div>
</div>
<div class="row mx-0">
    <button class="btn d-md-none mb-0 mx-3 btn-block" type="button" data-toggle="collapse" data-target="#dashboard">
        Dashboard
    </button>
    <div id="dashboard" class="collapse show col-md-3 mb-md-0 mb-3 my-md-4">
        <ul class="list-group pl-0 mt-0">
            <li class="list-group-item bg-dark"><a href="seller.php">Dati venditore</a></li>
            <li class="list-group-item bg-dark"><a href="seller.php?page=catalogue">Catalogo</a></li>
            <li class="list-group-item bg-dark"><a href="seller.php?page=orders">Ordini in sospeso</a></li>
            <li class="list-group-item bg-dark"><a href="seller.php?page=notifications">Notifiche</a></li>
        </ul>
    </div>
    <?php
        switch($templateParams["page"]) {
            case "seller-data":
                require("template-seller-data.php");
                break;
            case "catalogue":
                require("template-catalogue.php");
                break;
            case "orders":
                require("template-seller-orders.php");
                break;
            case "notifications":
                require("template-notifications.php");
                break;
        }
    ?>
</div>
