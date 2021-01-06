<div class="row mx-0 mt-4">
    <div class="col">
        <button class="btn mb-0 btn-block" type="button" data-toggle="collapse" data-target="#advanced-search">
            Ricerca avanzata
        </button>
        <div id="advanced-search" class="collapse col bg-dark">
            <div class="row">
                <form class="p-3" action="search.php">
                    <div class="form-row">
                        <label for="id-name" class="col-12 text-left mt-2">Titolo:</label>
                        <label class="form-check-label">
                            <input id="id-name" class="form-control mr-2 col-10" name="name" type="search" placeholder="Inserisci titolo" aria-label="Search">
                        </label>
                    </div>
                    <div class="form-row">
                        <label for="platform" class="col-12 text-left mt-2">Console:</label>
                        <?php 
                            $platforms = $dbr->getPlatforms();
                            foreach($platforms as $platform):
                        ?>
                        <div class="form-check mx-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="plt-<?php echo $platform["name"]; ?>" value="<?php echo $platform["name"]; ?>" id="id-<?php echo $platform["name"]; ?>">
                                <label for="id-<?php echo $platform["name"]; ?>"><?php echo $platform["name"]; ?></label>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-row">
                        <label for="category" class="col-12 text-left mt-2">Categorie:</label>
                        <?php
                            $categories = $dbr->getCategories();
                            foreach($categories as $category):
                        ?>
                        <div class="form-check mx-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="cat-<?php echo $category["categoryName"]; ?>" value="<?php echo $category["categoryName"]; ?>" id="id-<?php echo $category["categoryName"]; ?>">
                                <label for="id-<?php echo $category["categoryName"]; ?>"><?php echo $category["categoryName"]; ?></label>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-row">
                        <label for="developer" class="col-12 text-left mt-2">Sviluppatore:</label>
                        <?php
                            $developers = $dbr->getDevelopers();
                            foreach($developers as $developer):
                        ?>
                        <div class="form-check mx-2">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="developer" value="<?php echo $developer["name"]; ?>" id="id-<?php echo $developer["name"]; ?>">
                                <label for="id-<?php echo $developer["name"]; ?>"><?php echo $developer["name"]; ?></label>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <label for="price" class="col-12 text-left mt-2">Prezzo massimo:</label>
                        <div class="col-11 text-left">
                            <div class="row slidecontainer ml-1">
                                <div class="col-9">
                                    <input type="range" min="1" max="1000" value="1000" class="slider" id="myRange" name="price">
                                </div>
                                <div class="col-3">
                                <div id="demo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-right">
                            <input type="submit" class="btn btn-light ml-3" value="Cerca">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mx-3">
    <?php if(count($templateParams["games"]) > 0): ?>
        <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th id="Immagine">Immagine</th>
                    <th id="Titolo">Titolo</th>
                    <th id="Piattaforma">Piattaforma</th>
                    <th id="Prezzo">Prezzo Consigliato (Euro €)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($templateParams["games"])):
                        foreach($templateParams["games"] as $gameId):
                            $game = $dbr->getGameById($gameId)[0];
                            $suggestedPrice = $dbr->getGameLowestPriceAndSeller($gameId)[0];
                            if($suggestedPrice["lowestPrice"] == NULL) {
                                $suggestedPrice["lowestPrice"] = $game["suggestedPrice"];
                            }
                ?>
                <tr>
                    <td headers="Immagine" data-label="Immagine">
                        <a href="<?php echo "article.php?game=$gameId";?>">
                            <img src="<?php echo IMG_DIR.$game["image"]?>" alt="<?php echo $game["title"]?> - PS4" class="img-thumbnail">
                        </a>
                    </td>
                    <td headers="Titolo" data-label="Titolo"><?php echo $game["title"]; ?></td>
                    <td headers="Piattaforma" data-label="Piattaforma"><?php echo $game["name"]; ?></td>
                    <td headers="Prezzo" data-label="Prezzo"><?php echo $suggestedPrice["lowestPrice"]; ?></td>
                </tr>
                
                <?php 
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>
    <?php else: ?>
    <div class="row m-3 bg-dark rounded justify-content-center">
        <div class="col-6 text-center">
            <h2 class="p-5">Non ci sono risultati</h2>        
        </div>
    </div>
    <?php endif; ?>
</div>
