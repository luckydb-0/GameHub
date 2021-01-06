<div class="col-md-8">
    <div class="row">
        <div class="col-md-12 my-auto offset-md-1 pl-md-4 pl-lg-4 pl-xl-5">
            <?php if(empty(($dbr->getSellerCatalogue($templateParams["sellerId"])))): ?>
                <div class="bg-dark my-5 py-5 px-3 rounded text-center">
                <h2>Il tuo catalogo è vuoto<h2>
                </div>
            <?php else: ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th id="Immagine">Immagine</th>
                        <th id="Cod.Articolo">Cod. Articolo</th>
                        <th id="Titolo">Nome</th>
                        <th id="Piattaforma">Piattaforma</th>
                        <th id="Prezzo">Prezzo (Euro €)</th>
                        <th id="Copie-disponibili">Copie disponibili</th>
                        <th id="Copie-vendute">Copie vendute</th>
                        <th id="Modifica"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $catalogueId = $templateParams["sellerId"];
                        $catalogueItems= $dbr->getSellerCatalogue($catalogueId);
                        $_POST["catalogueId"] = $catalogueId;
                        foreach($catalogueItems as $item):
                    ?>
                    <tr>
                        <td headers="Immagine" data-label="Immagine"><img src="<?php echo IMG_DIR.$item["image"]; ?>" alt="<?php echo $item["title"]." - ".$item["name"]; ?>" class="img-thumbnail"></td>
                        <td headers="Cod.Articolo" data-label="Cod.Articolo"><?php echo $item["gameId"]; ?></td>
                        <td headers="Titolo" data-label="Titolo"><?php echo $item["title"]; ?></td>
                        <td headers="Piattaforma" data-label="Piattaforma"><?php echo $item["name"]; ?></td>
                        <td headers="Prezzo" data-label="Prezzo"><?php echo $item["price"]; ?></td>
                        <td headers="Copie-disponibili" data-label="Copie-disponibili"><?php echo $item["copies"]; ?></td>
                        <td headers="Copie-vendute" data-label="Copie-vendute"><?php echo $item["sold"]; ?></td>
                        <td headers="Modifica" data-label="Modifica">
                            <form>
                                <button class="btn btn-primary" data-price="<?php echo $item['price'] ?>" data-copies="<?php echo $item['copies'];  ?>" data-id="<?php echo $item['gameId'];?>" data-image="<?php echo IMG_DIR.$item['image'] ?>" type="button" data-toggle="modal" data-target="#modifyArticle">
                                    <span class="fa fa-edit"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>


    <div class="modal fade text-dark" id="modifyArticle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-3">
                <div class="modal-header">
                    <h3 class="modal-title">Modifica articolo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <img id="id-image" src="img/GoW.jpg" alt="Gioco selezionato">
                <form action="#" method="POST">
                    <div class="modal-body ml-3">
                            <div class="row">
                                Prezzo:
                            </div>
                            <div class="row">
                                <label for="id-price" class="sr-only">Nuovo prezzo</label>
                                <input type="number" name="mod-price" step="0.01" id="id-price" />
                            </div>
                            <div class="row">
                                Copie Disponibili:
                            </div>
                            <div class="row">
                                <label for="id-copies" class="sr-only">Nuove copie</label>
                                <input class="" min="0" type="number" name="mod-copies" id="id-copies"/>
                            </div>
                        <input type="hidden" name="mod-gameId" id="id-id" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="modifies" class="btn btn-primary">Salva modifiche</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 offset-md-1">
            <div class="form-group text-right mt-3">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#newArticle">
                    Aggiungi articolo
                </button>
                
                    <!-- The Modal -->
                    <div class="modal fade text-dark" id="newArticle">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Aggiungi articolo</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" action="seller.php?page=catalogue">
                                <fieldset>
                                <legend class="sr-only">Seleziona:</legend>
                                <div class="form-row">
                                    <h4>Seleziona videogioco:</h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="pl-0">
                                                <th id="Selezione" class="px-4"></th>
                                                <th id="Codice">Codice</th>
                                                <th id="NuovaImmagine">Immagine</th>
                                                <th id="NuovoTitolo">Nome</th>
                                                <th id="NuovaPiattaforma">Piattaforma</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $games = $dbr->getGames();
                                                foreach($games as $game):
                                            ?>
                                            <tr>
                                                <td class="px-4"><label class="sr-only" for="id-<?php echo $game["gameId"]; ?>"><?php echo $game["title"]." - ".$game["name"]; ?></label><input type="radio" class="form-check-input" name="gameId" id="id-<?php echo $game["gameId"]; ?>" value="<?php echo $game["gameId"]; ?>" /></td>
                                                <td headers="Codice"><?php echo $game["gameId"]; ?></td>
                                                <td headers="NuovaImmagine" data-label="NuovaImmagine"><img src="<?php echo IMG_DIR.$game["image"]; ?>" alt="<?php echo $game["title"]." - ".$game["name"]; ?>" class="img-thumbnail"></td>
                                                <td headers="NuovoTitolo" data-label="Titolo"><?php echo $game["title"]; ?></td>
                                                <td headers="NuovaPiattaforma" data-label="NuovaPiattaforma"><?php echo $game["name"]; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-row">
                                    <label for="price" class="col-11 text-left mt-2">Prezzo:</label>
                                    <input type="number" step="0.01" min="0" class="form-control col-11" id="price" name="price" placeholder="Inserisci prezzo" />
                                </div>
                                <div class="form-row">
                                    <label for="copies" class="col-11 text-left mt-2">Copie disponibili:</label>
                                    <input type="number" class="form-control col-11" id="copies" name="copies" placeholder="Inserisci copie disponibili" />
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                                        <button class="btn btn-primary" data-dismiss="modal">Annulla</button>
                                    </div>
                                </div>
                                </fieldset>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
