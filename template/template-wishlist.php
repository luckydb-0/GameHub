<div class="col-md-7 offset-md-1 px-0">
    <?php 
        if(count($templateParams["games"]) > 0):
    ?>
    <table class="table table-dark table-striped my-4">
        <thead>
            <tr>
                <th id="Immagine">Immagine</th>
                <th id="Nome">Nome</th>
                <th id="Piattaforma">Piattaforma</th>
                <th id="Prezzo consigliato">Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($templateParams["games"] as $game): 
                $gameId = $copy["gameId"];
            ?>
            <tr> 
                <td headers="Immagine" data-label="Immagine"><img src="img/<?php echo $templateParams["g"."$gameId"][0]["image"]; ?>" alt="God of War - PS4" class="img-thumbnail"></td>
                <td headers="Titolo" data-label="Titolo"><?php echo $templateParams["g"."$gameId"][0]["title"]; ?></td>
                <td headers="Piattaforma" data-label="Piattaforma"><?php echo $templateParams["g"."$gameId"][0]["platform"]; ?></td>
                <td headers="Prezzo consigliato" data-label="Prezzo"><?php echo $templateParams["g"."$gameId"][0]["price"]."€"; ?></form></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>La tua lista dei desideri è vuota<h2>
        </div>
    <?php endif; ?>
</div>
