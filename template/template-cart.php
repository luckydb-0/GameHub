<div class="row mx-3">
    <div class="offset-1 my-3"><h2>Carrello</h2></div>
</div>  
<div class="row mx-0"> 
    <?php 
        if(count($templateParams["copies"]) > 0):
    ?>    
    <div class="col-md-7 offset-md-1 px-0">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th id="Immagine">Immagine</th>
                    <th id="Nome">Nome</th>
                    <th id="Piattaforma">Piattaforma</th>
                    <th id="Prezzo">Prezzo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["copies"] as $copy): 
                    $copyId = $copy["copyId"];
                ?>
                <tr> 
                    <td headers="Immagine" data-label="Immagine"><img src="img/<?php echo $templateParams["c"."$copyId"][0]["image"]; ?>" alt="God of War - PS4" class="img-thumbnail"></td>
                    <td headers="Titolo" data-label="Titolo"><?php echo $templateParams["c"."$copyId"][0]["title"]; ?></td>
                    <td headers="Piattaforma" data-label="Piattaforma"><?php echo $templateParams["c"."$copyId"][0]["platform"]; ?></td>
                    <td headers="Prezzo" data-label="Prezzo"><?php echo $templateParams["c"."$copyId"][0]["price"]."€"; ?></form></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="col-5 col-sm-4 col-md-3 col-lg-2 mt-5 mt-md-5 bg-dark offset-md-1 p-3 rounded mx-auto h-50">
        <?php
            $sum = 0; 
            foreach($templateParams["copies"] as $copy):
                $copyId = $copy["copyId"];
                $sum += $templateParams["c"."$copyId"][0]["price"];
        ?>
        <p class="cart-price"><?php echo $templateParams["c"."$copyId"][0]["price"]."€"; ?></p>
        <?php endforeach; ?>
        <p class="cart-total mr-0">Totale: <?php echo $sum?>€</p>
        <div class="form-group text-right mb-auto mt-5">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#orderModal">Ordina ora</button>
            
            <!-- The Modal -->
            <div class="modal fade text-dark" id="orderModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ordina ora</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <?php
                        if(count($templateParams["creditCards"]) == 0):
                    ?>
                    <h2> Non hai metodi di pagamento associati </h2>
                    <form id="orderForm" role="form" action="#" method="POST">
                        <h3>Aggiungi un metodo di pagamento</h3>
                            <div class="form-group text-left">
                                <label for="accountHolder">Titolare della carta: </label>
                                <input type="text" class="form-control w-50" id="accountHolder" name="accountHolder"/>
                            </div>
                            <div class="form-group text-left">
                                <label for="ccnumber">Numero della carta: </label>
                                <input type="text" class="form-control w-50" id="ccnumber" maxlength="20" size="20" name="ccnumber" />
                            </div>
                            <div class="form-group text-left">
                                <label for="expiration">Expiration: </label>
                                <input type="month" class="form-control w-50" id="expiration" name="expiration" />
                            </div>
                            <div class="form-group text-left">
                                <label for="cvv">CVV: </label>
                                <input type="text" class="form-control w-25" id="cvv" maxlength="3" size="3" name="cvv" />
                            </div>
                            <div class="checkbox text-left">
                                <label><input type="checkbox" value="payment_method"> Salva metodo di pagamento </label>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
						        <input type="submit" class="btn btn-success" id="submit">
                            </div>
                    </form>
                    <?php endif; ?>
                </div>
                
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="col-10 offset-md-1 bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Il tuo carrello è vuoto<h2>
        </div>
    <?php endif; ?>
</div>