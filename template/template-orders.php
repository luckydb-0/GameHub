
<div class="col-md-7 my-4 offset-md-1 px-0">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th id="Cod.Ordine">Cod. Ordine</th>
                <th id="Immagine">Immagine</th>
                <th id="Nome">Nome</th>
                <th id="Piattaforma">Piattaforma</th>
                <th id="Prezzo">Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($templateParams["orders"] as $order): 
                $orderId = $order["orderId"];
                $isFirstRow = true;
            ?>
            <tr> 
                <td headers="Cod.Ordine" data-label="Cod.Ordine" rowspan="<?php echo count($templateParams["o"."$orderId"]); ?>"><?php echo $orderId; ?></td>
                <?php foreach($templateParams["o"."$orderId"] as $copy):
                    $copyId = $copy["copyId"]; 
                    if(!$isFirstRow) {
                        echo "<tr>";
                    } else {
                        $isFirstRow = false;
                    }
                ?>
                <td headers="Immagine" data-label="Immagine"><img src="img/<?php echo $templateParams["c"."$copyId"][0]["image"]; ?>" alt="God of War - PS4" class="img-thumbnail"></td>
                <td headers="Titolo" data-label="Titolo"><?php echo $templateParams["c"."$copyId"][0]["title"]; ?></td>
                <td headers="Piattaforma" data-label="Piattaforma"><?php echo $templateParams["c"."$copyId"][0]["platform"]; ?></td>
                <td headers="Prezzo" data-label="Prezzo"><?php echo $templateParams["c"."$copyId"][0]["price"]; ?></form></td>
            </tr>
            <?php endforeach; endforeach;?>
        </tbody>
    </table>
</div>