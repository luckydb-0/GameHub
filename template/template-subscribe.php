<?php ?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="#" method="POST">
            <h2>Seleziona tipologia</h2>
            <button name="subscriptionType" value="seller" type="submit" class="btn btn-outline-white">
                <i class="fa fa-address-card fa-5x" aria-hidden="true"></i>
                <label>Venditore</label>
            </button>
            <button name="subscriptionType" value="customer" type="submit" class="btn btn-outline-white ml-5">
                <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                <label>Cliente</label>
            </button>
        </form>
    </div>
</div>

<?php if(!empty($_POST['subscriptionType'])): if($_POST['subscriptionType'] == "customer"):?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="#" method="POST">
            <h2>Registrati - Cliente</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" name="name" aria-describedby="" placeholder="Inserisci nome" required>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="surname" class="col-11 text-left mt-2">Cognome:</label>
                    <input type="text" class="form-control col-11" name="surname" aria-describedby="" placeholder="Inserisci cognome" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="birthdate" class="col-11 text-left mt-2">Data di nascita:</label>
                    <input type="date" class="form-control col-11" name="birthdate" aria-describedby="">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="phone-number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" class="form-control col-11" name="phone-number" aria-describedby="" placeholder="Inserisci numero di telefono" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" name="email" aria-describedby="emailHelp" placeholder="Inserisci email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password:</label>
                    <input type="password" class="form-control col-11" name="password" placeholder="Inserisci password" required>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat-password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" name="repeat-password" aria-describedby="" placeholder="Inserisci password" required>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="text" style="display:none;" name="subscriptionType" value="customer">
                <button type="submit" name="fields"  value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<!---
Form for Seller!
//TODO
--->
<?php elseif($_POST['subscriptionType'] == "seller"):?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="#" method="POST">
            <h2>Registrati - Venditore</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" name="name" aria-describedby="" placeholder="Inserisci nome" required>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="surname" class="col-11 text-left mt-2">P.IVA:</label>
                    <input type="text" class="form-control col-11" name="p_iva" aria-describedby="" placeholder="00000000000" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="phone-number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" class="form-control col-11" name="phone-number" aria-describedby="" placeholder="Inserisci numero di telefono" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" name="email" aria-describedby="emailHelp" placeholder="Inserisci email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password:</label>
                    <input type="password" class="form-control col-11" name="password" placeholder="Inserisci password"required>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat-password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" name="repeat-password" aria-describedby="" placeholder="Inserisci password" required>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="text" style="display:none;" name="subscriptionType" value="seller">
                <button type="submit" name="fields" value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<?php endif; endif;?>
