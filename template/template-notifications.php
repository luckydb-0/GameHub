<div class="col-md-7 rounded offset-md-1 px-0">
    <?php 
        if(count($templateParams["notifications"]) > 0):
    ?>        
    <ul class="list-group mx-0 my-4">
        <li class="list-group-item bg-dark">
            <?php foreach($templateParams['notifications'] as $notification): ?>
            <div class="row">
                <div class="col-11">
                    <p><?php echo $notification["timeReceived"]." - ".$notification["description"]; ?></p>
                </div>
                <div class="col-1 text-right">
                    <button type="button" class="close mt-auto" aria-label="Close">
                        <div aria-hidden="true">&times;</div>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </li>
    </ul>
    <?php else: ?>
        <div class="bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Non hai notifiche da leggere<h2>
        </div>
    <?php endif; ?>
</div>