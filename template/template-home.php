<div class="row justify-content-center mx-0">
    <div class="col-*-12 my-3">
        <h2>Ultime Uscite</h2>
    </div>
</div>
<div class="row justify-content-center mx-0">
    <div class="container bg-dark py-4 pt-lg-5 rounded">
        <div id="lastReleased" class="carousel slide" data-ride="carousel">
            <?php 
                $n = 6;
                $values = $dbr->getNewestGames($n);
            ?>    

            <!-- Indicators -->
            <ul class="carousel-indicators">
                 <?php   
                    for($current = 0; $current < 3; $current++): 
                ?>
                <li data-target="#lastReleased" data-slide-to="<?php echo $current; ?>" <?php if($current == 0) echo 'class="active"'; ?> ></li>
                <?php endfor; ?>
            </ul>
        
            <!-- The slideshow -->
            <div class="carousel-inner my-auto">
                <?php
                    $isFirst = true;
                    for($counter = 0; $counter < $n; $counter++):
                        $game = $values[$counter];
                ?>
                <div class="carousel-item my-auto <?php if($isFirst){ echo "active"; $isFirst = !$isFirst;}; ?>">
                    <div class="row text-center my-auto justify-content-center">
                        <div class="col-12 col-md-5 my-auto text-center">
                            <div class="my-auto">
                                <a href="article.php?game=<?php echo $game["gameId"]; ?>">
                                    <img src="<?php echo IMG_DIR.$game["image"]; ?>" class="img-thumbnail mb-2" alt="<?php echo $game["title"]; ?>">
                                </a>
                                    <p><?php echo $game["title"]; ?></p>
                            </div>
                        </div>
                        <?php $game = $values[++$counter]; ?>
                        <div class="col-12 col-md-5 my-auto text-center">
                            <div class="my-auto">
                                <a href="article.php?game=<?php echo $game["gameId"]; ?>">
                                    <img src="<?php echo IMG_DIR.$game["image"]; ?>" alt="<?php echo $game["title"]; ?>" class="img-thumbnail mb-2">
                                </a>
                                    <p><?php echo $game["title"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#lastReleased" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#lastReleased" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
        
        </div>
    </div>
</div>
<div class="row mx-0">
    <div class="col-*-12 mt-3 ml-4">
        <h2>Preordina</h2>
    </div>
</div>
<div class="row bg-dark mx-0">
    <?php 
        $preorders = $dbr->getGamesToPreorder(6);
        foreach($preorders as $game):
    ?>
    <div class="col-6 col-md-3 col-lg-2 my-auto p-2 text-center">
        <a href="article.php?game=<?php echo $game["gameId"]; ?>">
            <img src="<?php echo IMG_DIR.$game["image"]; ?>" alt="<?php echo $game["title"]; ?>" class="img-thumbnail mb-2"/>
        </a>
            <p><?php echo $game["title"]; ?></p>
    </div>
    <?php endforeach; ?>
</div>
<div class="row mx-0">
    <div class="col-*-12 mt-3 ml-4">
        <h2>I più venduti</h2>
    </div>
</div>
<?php
    $mostSold = $dbr->getMostSoldGames(12);
    $chunks = array_chunk($mostSold, 6, false); 
    foreach($chunks as $row):
?>
<div class="mb-5">
<div class="row bg-dark mx-0">
    <?php foreach($row as $game): ?>
    <div class="col-6 col-md-3 col-lg-2 my-auto p-2 text-center">
        <a href="article.php?game=<?php echo $game["gameId"]; ?>">
            <img src="<?php echo IMG_DIR.$game["image"]; ?>" alt="<?php echo $game["title"]; ?>" class="img-thumbnail mb-2"/>
        </a>
            <p><?php echo $game["title"]; ?></p>
    </div>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
</div>  
