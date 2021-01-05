<?php $game = $templateParams["game"]; ?>
<div class="row justify-content-center my-5 mx-0">
    <div class="col-md-7 bg-dark rounded p-3">
        <div class="row">
            <div class="col text-center">
                <header>
                    <h2><?php echo $game["title"]." - ".$game["name"]; ?></h2>
                </header>
            </div>
        </div>
        <div class="row justify-content-between mt-3 p-3">
            <div class="col-12 col-md-4 col-lg-7 mb-4 text-center">
                <img class="img-fluid img-thumbnail" src="<?php echo IMG_DIR.$game["image"]; ?>" alt="" />
            </div>
            <div class="col-12 col-md-8 col-lg-5 pl-5">
                <div class="row my-2">
                    <div class="col">
                        <p>Generi:</p>
                        <ul class="genres">
                            <?php foreach($templateParams["genres"] as $genre) {
                                $name = $genre["categoryName"];
                                echo "<li><a href=\"search.php?name=&cat-$name=$name\">$name</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col">
                        Data di rilascio: <?php echo reverseDate($game["releaseDate"]); ?>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                    <?php if(!($templateParams["copy"][0]["seller"] == NULL)): ?>
                        Prezzo più basso: <a href="#" data-toggle="popover" data-trigger="hover" data-content="Venditore: <?php echo $templateParams["copy"][0]["seller"]; ?>"><?php echo $templateParams["copy"][0]["lowestPrice"]." €"; ?></a>
                    </div>   
                </div>
                <div class="row my-4">
                    <div class="col">
                        <?php if(!isUserLoggedIn() && !isLoggedIn()): ?>
                            <p id="logCheck"> Devi effettuare l'accesso per poter aggiungere al carrello </p>
                        <?php elseif(isUserLoggedIn()): ?>
                        <form action="#" method="POST" class ="mt-5">
                            <input type="hidden" id="addToCart" name="addToCart" value="<?php echo $_GET["game"]; ?>">
                            <input type="submit" class="btn btn-light" value="Aggiungi al carrello"/>
                        </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="my-5"> Non sono presenti copie del gioco disponibili </p>
                    <?php endif; ?>
                    <?php if(isUserLoggedIn()): ?>
                    <form action="#" method="POST" class="my-5">
                        <input type="hidden" id="addToCart" name="addToWishlist" value="<?php echo $_GET["game"]; ?>">
                        <input type="submit" class="btn btn-light" value="Aggiungi alla lista dei desideri"/>
                    </form>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo $game["description"]; ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 offset-md-1 mt-5 mt-md-0">
        <aside>
            <div class="container bg-dark py-3 rounded">
                <div class="row text-center">
                    <div class="col-12">
                        <h2>Consigliati</h2>
                    </div>
                </div>
                <div id="consigliati" class="carousel slide text-center" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php   
                            $current = 0;
                            foreach($templateParams["suggested"] as $suggested): 
                        ?>
                        <li data-target="#consigliati" data-slide-to="<?php echo $current; ?>" <?php if($current == 0) echo 'class="active"'; ?> ></li>
                        <?php $current++; endforeach; ?>
                    </ul>
                
                    <!-- The slideshow -->
                    <div class="carousel-inner my-3">
                        <?php  
                            $isFirst = true;
                            foreach($templateParams["suggested"] as $suggested): 
                        ?>
                        <div class="carousel-item <?php if($isFirst){ echo "active"; $isFirst = !$isFirst;}; ?>">
                            <a href="article.php?game=<?php echo $suggested["gameId"]; ?>">
                                <img src="<?php echo IMG_DIR.$suggested["image"]; ?>" alt="" class="img-thumbnail">
                                <p class="my-3"><?php echo $suggested["title"]; ?></p>
                            </a>  
                        </div>
                        <?php endforeach; ?>
                    </div>
                
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#consigliati" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#consigliati" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </aside>
    </div>
</div>
<div class="row mx-0 justify-content-center">
    <div class="col-11 bg-dark rounded p-3">
        <?php if(empty($templateParams["reviews"])): ?>
        <div class="row text-center p-3">
            <div class="col-12">
            <h2> Non sono presenti recensioni per questo gioco </h2>
            </div>
        </div>
                
        <?php else: ?>
        <div class="row">
            <div class="col-12 ml-3">
                <h2 class="mb-0 mt-2"> Recensioni </h2>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach($templateParams["reviews"] as $review): ?>
            <li class="list-group-item bg-dark">
                <div class="row">
                    <div class="col-12">
                        <h3> <?php echo $review["name"]." ".$review["surname"]; ?> </h3>
                    </div>
                    <div class="col-4 my-auto">  
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <h4> <?php echo $review["title"]; ?> </h4>
                    </div>
                    <div class="col">
                        <?php for($i = 0; $i < $review["rating"]; $i++) {
                        echo '<i class="fa fa-star"></i> ';
                        };
                        ?>  
                    </div>
                </div>
                <div class="row">
                <div class="col-2">
                        <p> <?php echo $review["description"]; ?> </p>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>

<?php if(!isLoggedIn()): ?>
<div class="row mx-0 my-5 justify-content-center">
    <div class="col-11 bg-dark p-4 rounded">
        <?php if(!isUserLoggedIn()): ?>
            <div class="row text-center">
                <div class="col-12">
                <h2> Accedi per lasciare una recensione </h2>
                </div>
            </div>
        <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-11">
                <h2> Lascia una recensione: </h2>
                <form action="#" method="POST" >
                    <div class="form-group text-left">
                        <label for="title">Titolo: </label>
                        <input type="text" class="form-control w-50" id="title" name="title" required />
                    </div>
                    <div class="form-group text-left">
                        <label for="title">Valutazione (da 0 a 5): </label>
                        <!-- //TODO
                        <div class="ratings row ">
                            <span class="fa fa-star fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                            <span class="fa fa-star fa-2x"></span>
                        </div>
                        -->
                        <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" style="width: 5%" required/>
                    </div>
                    <div class="form-group text-left">
                        <label for="title">Recensione: </label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Inserisci recensione..." required></textarea>
                    </div>
                    <div class="text-right my-4">
                        <input type="submit" class="btn btn-light" name="sendReview" value="Invia recensione"/>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>