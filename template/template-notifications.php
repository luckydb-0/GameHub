<div class="col-md-7 offset-md-1 px-0">
    <?php 
        if(count($templateParams["notifications"]) > 0):
    ?>
    <table class="table table-dark table-striped my-4">
        <thead>
            <tr>
                <th id="DataOra">Data e Ora</th>
                <th id="Descrizione">Descrizione</th>
                <th id="Azioni"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($templateParams['notifications'] as $notification): ?>
            <tr> 
                <td headers="DataOra" data-label="Data e Ora" ><?php echo $notification["timeReceived"]; ?></td>
                <td headers="Descrizione" data-label="Descrizione"><?php echo $notification["description"]; ?></td>
                <td headers="Azioni" data-label="Azioni"><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="hidden" name="page" value="notifications"/>
                    <?php if(!$notification['isRead'])
                        echo '<button class="remove" name="read" value="'.$notification['notificationId'].'"><span class="fa fa-envelope" aria-hidden="true"></span></button>';
                    else
                        echo '<button class="remove" name="unread" value="'.$notification['notificationId'].'"><span class="fa fa-envelope-open" aria-hidden="true"></span></button>';
                    echo '<button class="remove" name="delete" value="'.$notification['notificationId'].'"><span class="fa fa-trash" aria-hidden="true"></span></button>';
                    ?>
                    </form>
                </td>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Non hai notifiche da leggere<h2>
        </div>
    <?php endif; ?>
</div>