<div class="row justify-content-center mx-0">
    <div class="col-*-12 my-3">
        <h2>Ultime Uscite</h2>
    </div>
</div>
<div class="row justify-content-center mx-0">
    <div class="container bg-dark py-3">
        <!-- Fare altro carousel per schermi piccoli-->
        <div id="ultime-uscite" class="carousel slide" data-ride="carousel">
            <?php 
                $n = 6;
                $values = $dbr->getNewestGames($n);
            ?>    

            <!-- Indicators -->
            <ul class="carousel-indicators">
                 <?php   
                    for($current = 0; $current < 3; $current++): 
                ?>
                <li data-target="#ultime-uscite" data-slide-to="<?php echo $current; ?>" <?php if($current == 0) echo 'class="active"'; ?> ></li>
                <?php endfor; ?>
            </ul>
        
            <!-- The slideshow -->
            <div class="carousel-inner my-3">
                <?php
                    $isFirst = true;
                    $couples = array_chunk($values, 2, true);
                    for($counter = 0, $secondCounter = 0; $counter < $n; $counter++):
                        $game = $couples[$secondCounter][$counter];
                ?>
                <div class="carousel-item <?php if($isFirst){ echo "active"; $isFirst = !$isFirst;}; ?>">
                    <div class="row text-center justify-content-center">
                        <div class="col-md-5">
                            <div>
                                <a href="article.php?game=<?php echo $game["gameId"]; ?>">
                                    <img src="<?php echo IMG_DIR.$game["image"]; ?>" class="img-thumbnail">
                                    <p><?php echo $game["title"]; ?></p>
                                </a>
                            </div>
                        </div>
                        <?php $game = $couples[$secondCounter][++$counter]; $secondCounter++; ?>
                        <div class="col-md-5">
                            <div>
                                <a href="article.php?game=<?php echo $game["gameId"]; ?>">
                                    <img src="<?php echo IMG_DIR.$game["image"]; ?>" class="img-thumbnail">
                                    <p><?php echo $game["title"]; ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
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
