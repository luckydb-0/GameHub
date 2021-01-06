<div class="col-md-7 offset-md-1 px-0">
    <?php 
        if(count($templateParams["orders"]) > 0):
    ?>
    <table class="table table-dark table-striped my-4">
        <thead>
            <tr>
                <th id="Cod.Ordine">Cod. Ordine</th>
                <th id="Immagine">Immagine</th>
                <th id="Titolo">Titolo</th>
                <th id="Piattaforma">Piattaforma</th>
                <th id="Prezzo">Prezzo</th>
                <th id="Totale">Totale</th>
                <th id="Consegnatoil">Consegnato il: </th>
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
                    }
                ?>
                <td headers="Immagine" data-label="Immagine"><img src="img/<?php echo $templateParams["c"."$copyId"][0]["image"]; ?>" alt="God of War - PS4" class="img-thumbnail"></td>
                <td headers="Titolo" data-label="Titolo"><?php echo $templateParams["c"."$copyId"][0]["title"]; ?></td>
                <td headers="Piattaforma" data-label="Piattaforma"><?php echo $templateParams["c"."$copyId"][0]["platform"]; ?></td>
                <td headers="Prezzo" data-label="Prezzo"><?php echo $templateParams["c"."$copyId"][0]["price"]; ?></td>
                <?php if($isFirstRow): $isFirstRow = false; ?>
                <td headers="Totale" data-label="Totale" rowspan="<?php echo count($templateParams["o"."$orderId"]); ?>"><?php echo $order["total"]; ?></td>
                <td headers="Consegnatoil" data-label="Consegnato il" rowspan="<?php echo count($templateParams["o"."$orderId"]); ?>">
                <?php 
                    if($order["deliverDate"] == NULL){
                        echo "L'ordine non è ancora stato consegnato";
                    } else {
                        echo reverseDate($order["deliverDate"]);
                    } 
                ?>
                </td>
                <?php endif; ?> 
            </tr>
            <?php endforeach; endforeach;?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Non hai ordini effettuati<h2>
        </div>
    <?php endif; ?>
</div>