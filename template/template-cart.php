<div class="row mx-3">
    <div class="offset-1 my-3"><h2>Carrello</h2></div>
</div>  
<?php 
        if(count($templateParams["copies"]) > 0):
?>   
<div class="row mx-0">     
    <div class="col-md-7 offset-md-1 px-0">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th id="Immagine">Immagine</th>
                    <th id="Titolo">Titolo</th>
                    <th id="Piattaforma">Piattaforma</th>
                    <th id="Prezzo">Prezzo</th>
                    <th id="Rimuovi"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["copies"] as $copy): 
                    $copyId = $copy["copyId"];
                ?>
                <tr> 
                    <td headers="Immagine" data-label="Immagine"><img src="img/<?php echo $templateParams["c"."$copyId"][0]["image"]; ?>" alt="<?php echo $templateParams["c"."$copyId"][0]["title"]; ?>" class="img-thumbnail"></td>
                    <td headers="Titolo" data-label="Titolo"><?php echo $templateParams["c"."$copyId"][0]["title"]; ?></td>
                    <td headers="Piattaforma" data-label="Piattaforma"><?php echo $templateParams["c"."$copyId"][0]["platform"]; ?></td>
                    <td headers="Prezzo" data-label="Prezzo"><?php echo $templateParams["c"."$copyId"][0]["price"]."€"; ?></td>
                    <td headers="Rimuovi" data-label="Rimuovi">
                        <form action="#" method="POST">
                            <button type="submit" name="remove" value="<?php echo $copyId?>" class="mt-0 pt-0 remove"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="col-5 col-sm-4 col-md-3 col-lg-2 mt-5 mt-md-5 bg-dark offset-md-1 p-3 rounded mx-auto h-50">
        <?php
            $total = 0; 
            foreach($templateParams["copies"] as $copy):
                $copyId = $copy["copyId"];
                $total += $templateParams["c"."$copyId"][0]["price"];
        ?>
        <p class="cart-price"><?php echo $templateParams["c"."$copyId"][0]["price"]."€"; ?></p>
        <?php endforeach; ?>
        <p class="cart-total mr-0">Totale: <?php echo $total?>€</p>
    </div>
</div>
<div class="row mx-0 my-3 justify-content-center">
    <div class="col-12 col-md-10 bg-dark p-3 rounded">
        <?php 
            if(count($templateParams["creditCards"]) > 0 && count($templateParams["addresses"]) > 0):
        ?>
            <form action="#" method="POST">
            <h2> Seleziona metodo di pagamento: </h2>
            <fieldset id="creditCard">
        <?php
            $isFirst = true;
            foreach($templateParams["creditCards"] as $creditCard):
        ?>
                <div class="form-check text-left">
                    <label class="form-check-label" for="<?php echo $creditCard["ccnumber"]; ?>">
                    <input type="radio" class="form-check-input" id="<?php echo $creditCard["ccnumber"]; ?>" name="creditCard" value="<?php echo $creditCard["ccnumber"]; ?>" <?php if($isFirst) echo "checked"; $isFirst = false; ?> />
                    <?php echo $creditCard["accountHolder"]." - Termina con ".substr($creditCard["ccnumber"], 12, 4) ; ?>
                    </label>                    
                </div>
        <?php endforeach; ?>
            </fieldset>
            <fieldset id="address">
                <h2> Seleziona indirizzo di spedizione: </h2>
                <?php 
                    $isFirst = true;
                    foreach($templateParams["addresses"] as $address):
                ?>
                        <div class="form-check text-left">
                            <label class="form-check-label" for="<?php echo $address["city"]."-".$address["street"]; ?>">
                            <input type="radio" class="form-check-input" id="<?php echo $address["city"]."-".$address["street"]; ?>" name="addressId" value="<?php echo $address["addressId"] ?>" <?php if($isFirst) echo "checked"; $isFirst = false; ?> />
                            <?php echo $address["city"]." - ".$address["street"]." - ".$address["postCode"]; ?>
                            </label>
                            
                        </div>
                <?php endforeach; 
                    if(isset($templateParams["error"])) {
                        echo $templateParams["error"];
                    }
                ?>
            </fieldset>
            <div class="row">
                <div class="col-12 text-right">
                    <input type="hidden" id="total" name="total" value="<?php echo $total?>" />
                    <input type="submit" class="btn btn-light" value="Ordina" name="placeOrder" />
                </div>                
            </div>                
        </form>
        <div class="row text-center">
            <div class="col-12">
                <h3> oppure </h3>
            </div>
        </div>
        <?php
            else: 
                if(count($templateParams["creditCards"]) == 0){
                    echo "<h2> Non hai metodi di pagamento associati </h2>";
                };
                if(count($templateParams["addresses"]) == 0){
                    echo "<h2> Non hai indirizzi di spedizione associati </h2>";
                };
            endif;
        ?>
        <div class="row">
            <div class="col-12">
            <button type="button" class="btn btn-light my-3" data-toggle="collapse" data-target="#addCard">Aggiungi un metodo di pagamento</button>
                <div id="addCard" class="collapse mt-3">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="form-group text-left">
                            <label for="accountHolder">Titolare della carta: </label>
                            <input type="text" class="form-control w-50" id="accountHolder" name="accountHolder" required />
                        </div>
                        <div class="form-group text-left">
                            <label for="ccnumber">Numero della carta: </label>
                            <input type="text" class="form-control w-50" id="ccnumber" minlength="16" maxlength="16" name="ccnumber" required />
                        </div>
                        <div class="form-group text-left">
                            <label for="expiration">Expiration: 
                                <select name="exp_year" size="99" required>
                                    <?php
                                    for ($i=intval(substr(date("Y"),2)); $i<=99; $i++)
                                    {
                                        ?>
                                        <option value="<?php echo substr(date("Y"),0,2) . $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select name="exp_month" size="12" required>
                                    <?php
                                    for ($i=1 ; $i<=12; $i++)
                                    {
                                        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </label>  
                        </div>
                        <div class="form-group text-left">
                            <label for="cvv">CVV: </label>
                            <input type="text" class="form-control w-25" id="cvv" minlength="3" maxlength="3" name="cvv" required />
                        </div>
                            <input type="hidden" name="saveMethod">
                        <div class="text-right">
                            <input type="submit" class="btn btn-light" value="Salva modifiche"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-light my-3" data-toggle="collapse" data-target="#addShipping">Aggiungi un indirizzo di spedizione</button>
                <div id="addShipping" class="collapse mt-3">
                    <form action="#" method="POST">
                        <div class="form-group text-left">
                            <label for="country"> Nazione: </label>
                            <input type="text" class="form-control w-50" id="country" name="country" required />
                        </div>
                        <div class="form-group text-left">
                            <label for="city">Città: </label>
                            <input type="text" class="form-control w-50" id="city" name="city" required />
                        </div>
                        <div class="form-group text-left">
                            <label for="street">Via: </label>
                            <input type="text" class="form-control w-50" id="street" name="street" required/>
                        </div>
                        <div class="form-group text-left">
                            <label for="postCode"> CAP: </label>
                            <input type="text" class="form-control w-25" id="postCode" minlength="5" maxlength="5" name="postCode" required />
                        </div>
                        <input type="hidden" name="saveAddress">
                        <div class="text-right">
                            <input type="submit" class="btn btn-light" value="Salva modifiche"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php else: ?>
    <div class="row">
        <div class="col-10 offset-md-1 bg-dark my-5 py-5 px-3 rounded text-center">
            <h2>Il tuo carrello è vuoto<h2>
        </div>
</div>
<?php endif; ?>
