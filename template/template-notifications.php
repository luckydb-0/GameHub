<form class="col-md-7 rounded offset-md-1 px-0" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
    <input type="hidden" name="page" value="notifications"/>
    <?php 
        if(count($templateParams["notifications"]) > 0):
    ?>        
    <ul class="list-group mx-0 my-4">
        <li class="list-group-item bg-dark">
            <?php foreach($templateParams['notifications'] as $notification): ?>
            <div class="row">
                <div class="col-9 col-sm-8 col-md-7">
                    <p><?php echo $notification["timeReceived"]." - ".$notification["description"]; ?></p>
                </div>
                <div class="col-3 col-sm-4 col-md-5 col-lg-4 text-right offset-lg-1">
                    <div class="row d-flex justify-content-end">
                            <?php if(!$notification['isRead'])
                                    echo '<button class="remove" name="read" value="'.$notification['notificationId'].'"><i class="fa fa-envelope" aria-hidden="true"></i></button>';
                                else
                                    echo '<button class="remove" name="unread" value="'.$notification['notificationId'].'"><i class="fa fa-envelope-open" aria-hidden="true"></i></button>';
                                echo '<button class="remove" name="delete" value="'.$notification['notificationId'].'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                                ?>
                    </div>
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
</form>