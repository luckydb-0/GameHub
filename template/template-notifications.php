<div class="col-md-7 rounded offset-md-1 px-0">
    <?php 
        if(count($templateParams["notifications"]) > 0):
    ?>        
    <ul class="list-group mx-0 my-4">
        <li class="list-group-item bg-dark">
            <div class="row">
                <div class="col-9 col-sm-8 col-md-7">
                    <p><?php echo $templateParams["timeReceived"]." - ".$templateParams[0]["description"]; ?></p>
                </div>
                <div class="col-3 col-sm-4 col-md-5 col-lg-4 text-right offset-lg-1">
                    <div class="row d-flex justify-content-end">
                        <button type="button" class="close mr-1" aria-label="Close">
                            <div aria-hidden="true">&times;</div>
                        </button>
                    </div>
                </div>
            </div>  
        </li>
    </ul>
    <?php else: ?>
        <div class="bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Non hai notifiche da leggere<h2>
        </div>
    <?php endif; ?>
</div>