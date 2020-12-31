<div class="row justify-content-center mx-0">
    <div class="col-*-12 my-3">
        <h2>Ultime Uscite</h2>
    </div>
</div>
<div class="row justify-content-center mx-0">
    <div class="container bg-dark py-3">
        <!-- Fare altro carousel per schermi piccoli-->
        <div id="ultime-uscite" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#ultime-uscite" data-slide-to="0" class="active"></li>
            <li data-target="#ultime-uscite" data-slide-to="1"></li>
            <li data-target="#ultime-uscite" data-slide-to="2"></li>
            </ul>
        
            <!-- The slideshow -->
            <div class="carousel-inner my-3">
                <div class="carousel-item active">

                    <div class="row text-center">
                        <div class="col-md-6">
                            <div>
                                <a href="article.php">
                                    <img src="img/GoW.jpg" alt="God of War PS4" class="img-thumbnail">
                                    <p>God of War</p>
                                </a>
                            </div>        
                        </div>
                        <div class="col-md-6 clearfix">
                            <div>
                                <a href="article.php">
                                    <img src="img/DG.jpg" alt="Days Gone PS4" class="img-thumbnail">
                                    <p>Days Gone</p>
                                </a>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#ultime-uscite" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#ultime-uscite" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
        
        </div>
    </div>
</div>
        <div class="row mx-0">
            <div class="col-*-12">
                <h2>Preordina</h2>
            </div>
        </div>
        <div class="row bg-dark mx-0">
            <?php foreach($templateParams["preorder"] as $game): ?>
            <div class="col-m*-12 my-auto">
                <a href=#>
                    <img src="<?php echo IMG_DIR.$game["imageName"]; ?>" alt="<?php echo $game["alt"]; ?>" class="img-thumbnail m-3"/>
                    <figcaption><?php echo $game["name"]." - ".$game["price"]."€"; ?></figcaption>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row mx-0">
            <div class="col-*-12">
                <h2>I più venduti</h2>
            </div>
        </div>
        <div class="row bg-dark mx-0">
            <?php foreach($templateParams["mostSold"] as $game): ?>
            <div class="col-m*-12 my-auto">
                <a href=#>
                    <img src="<?php echo IMG_DIR.$game["imageName"]; ?>" alt="<?php echo $game["alt"]; ?>" class="img-thumbnail m-3"/>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
