<?php $game = $templateParams["game"]; ?>
<div class="row justify-content-center my-5">
    <div class="col-md-7">
        <section class="bg-dark ml-0 pl-0 pl-sm-3">
            <div class="row ml-4">
                <div class="col text-center">
                    <header>
                        <h2><?php echo $game["title"]." - ".$game["name"]; ?></h2>
                    </header>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col mb-4 text-center">
                    <img class="img-fluid img-thumbnail" src="<?php echo IMG_DIR.$game["image"]; ?>" alt="" />
                </div>
                <div class="col-lg-4 pl-5">
                    <div class="row">
                        <div class="col">
                            <p>Generi:</p>
                            <ul class="genres">
                                <?php foreach($templateParams["genres"] as $genre) {
                                    $name = $genre["categoryName"];
                                    echo "<li>$name</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Data di rilascio: <?php echo reverseDate($game["releaseDate"]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Prezzo più basso: <a href="#" data-toggle="popover" data-trigger="hover" data-content="Venditore: <?php echo $templateParams["price"][0]["seller"]; ?>"><?php echo $templateParams["price"][0]["lowestPrice"]." €"; ?></a>
                        </div>   
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <?php if(!isUserLoggedIn()): ?>
                                <p id="logCheck"> Devi effettuare l'accesso per poter aggiungere al carrello </p>
                            <?php else: ?>
                            <form action="#" method="POST">
                                <input type="hidden" id="addToCart" name="addToCart" value="<?php echo $_GET["game"]; ?>">
                                <input type="submit" class="btn btn-light" value="Aggiungi al carrello"/>
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
        </section>
    </div>
    <div class="col-md-3 ml-md-5">
        <aside>
            <div class="container bg-dark py-3">
                <div class="row text-center">
                    <div class="col-12">
                        <h2>Consigliati</h2>
                    </div>
                </div>
                <div id="consigliati" class="carousel slide text-center" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                    <li data-target="#consigliati" data-slide-to="0" class="active"></li>
                    <li data-target="#consigliati" data-slide-to="1"></li>
                    <li data-target="#consigliati" data-slide-to="2"></li>
                    </ul>
                
                    <!-- The slideshow -->
                    <div class="carousel-inner my-3">
                        <div class="carousel-item active">
                            <a class="" href="article.html">
                                <img src="img/GoW.jpg" alt="Los Angeles" class="img-thumbnail">
                                <p class="my-3">God Of War - 69.99 euro</p>
                            </a>  
                        </div>
                        <div class="carousel-item">
                            <img src="img/DG.jpg" alt="Chicago" class="img-thumbnail">
                            <div class="my-3">Days Gone - 69.99 euro</div> 
                        </div>
                        <div class="carousel-item">
                            <img src="img/Halo4.jpg" alt="New York" class="img-thumbnail">
                            <div class="my-3">Halo 4 - 69.99 euro</div> 
                        </div>
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