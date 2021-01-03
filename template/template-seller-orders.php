<div class="col-md-7 my-4 offset-md-1" id="seller-order-recap">
    <?php
        $counter = 0;
        foreach($templateParams["seller-orders"] as $order):
            $counter++;
    ?>
    <div class="row bg-dark rounded px-5 py-3 mb-3">
        <div class="col">
            <div class="row py-3">
                <h3>Codice ordine <?php echo $counter; ?></h3>
            </div>
            <div class="row">
                <ul class="list-group m-0">
                    <?php 
                        $user = $dbr->getUserData($order["userId"])[0];
                        $userAddress = $dbr->getUserAddress($order["userId"])[0];
                    ?>
                    <li class="list-group-item bg-dark">Cliente: <?php echo $user["name"]." ".$user["surname"]; ?></li>
                    <li class="list-group-item bg-dark">Email: <?php echo $user["email"]; ?></li>
                    <li class="list-group-item bg-dark">Indirizzo: <?php echo $userAddress["street"].", ".$userAddress["city"]." ".$userAddress["postCode"].", ".$userAddress["country"]; ?></li>
                    <li class="list-group-item bg-dark">Telefono: <?php echo $user["phone"]; ?></li>
                </ul>
            </div>
            <div class="row my-3">
                <div class="col px-0">
                <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th id="Immagine">Immagine</th>
                        <th id="Cod.Articolo">Cod. Articolo</th>
                        <th id="Nome">Nome</th>
                        <th id="Piattaforma">Piattaforma</th>
                        <th id="Prezzo">Prezzo (Euro €)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $gameCopies = $dbr->getCopiesInOrder($order["orderId"]);
                        foreach($gameCopies as $gameCopy):
                            $game = $dbr->getGameFromCopy($gameCopy["copyId"])[0];
                    ?>
                    <tr>
                        <td headers="Immagine" data-label="Immagine"><img src="<?php echo IMG_DIR.$game["image"]; ?>" alt="<?php echo $game["name"]." - ".$game["platform"]; ?>" class="img-thumbnail"></td>
                        <td headers="Cod.Articolo" data-label="Cod.Articolo">1</td>
                        <td headers="Titolo" data-label="Titolo"><?php echo $game["title"]; ?></td>
                        <td headers="Piattaforma" data-label="Piattaforma"><?php echo $game["platform"]; ?></td>
                        <td headers="Prezzo" data-label="Prezzo"><?php echo $game["price"]; ?></td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                </tbody>
            </table>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <h4>Totale: <?php echo $order["total"]." €";?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col text-right my-3">
            <button type="button" class="btn btn-primary">
                Spedisci
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>

