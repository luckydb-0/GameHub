<?php ?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h2>Registrati come: </h2>
        <button name="subscriptionType" value="seller" type="submit" class="btn btn-outline-white">
            <span class="fa fa-address-card fa-5x" aria-hidden="true"></span>
        <label>Venditore</label>
        </button>
        <button name="subscriptionType" value="customer" type="submit" class="btn btn-outline-white ml-5">
            <span class="fa fa-user-circle-o fa-5x" aria-hidden="true"></span>
            <label>Cliente</label>
        </button>
        </form>
    </div>
</div>

<?php if(!empty($_POST['subscriptionType'])): if($_POST['subscriptionType'] == "customer"):?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h2>Registrati - Cliente</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" id="name" name="name" placeholder="Inserisci nome" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['name-error']))echo$_POST['name-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="surname" class="col-11 text-left mt-2">Cognome:</label>
                    <input type="text" class="form-control col-11" id="surname" name="surname" placeholder="Inserisci cognome" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['surname-error']))echo$_POST['surname-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="birthdate" class="col-11 text-left mt-2">Data di nascita:</label>
                    <input type="date" class="form-control col-11" id="birthdate" name="birthdate" aria-describedby="">
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['birthdate-error']))echo$_POST['birthdate-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="phone_number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="text" class="form-control col-11" id="phone_number" name="phone_number" minlength="10" maxlength="10" aria-describedby="" placeholder="Inserisci numero di telefono" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['phone-error']))echo$_POST['phone-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserisci email" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['email-error']))echo$_POST['email-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password (minimo 8 caratteri):</label>
                    <input type="password" class="form-control col-11" id="password" name="password" placeholder="Inserisci password" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat_password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" id="repeat_passowrd" name="repeat_password" aria-describedby="" placeholder="Inserisci password" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="hidden" name="subscriptionType" value="customer">
                <button type="submit" name="fields"  value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<!---
Form for Seller!
--->
<?php elseif($_POST['subscriptionType'] == "seller"):?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h2>Registrati - Venditore</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" id="name" name="name" aria-describedby="" placeholder="Inserisci nome" required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['name-error']))echo$_POST['name-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="p_iva" class="col-11 text-left mt-2">P.IVA:</label>
                    <input type="text" class="form-control col-11" id="p_iva" name="p_iva" aria-describedby="" minlength="11" maxlength="11" placeholder="00000000000" required>
                    <label class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['p_iva-error']))echo$_POST['p_iva-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="phone_number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="text" class="form-control col-11" id="phone_number" name="phone_number" minlength="10" maxlength="10" aria-describedby="" placeholder="Inserisci numero di telefono" required>
                    <label for="" class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['phone-error']))echo$_POST['phone-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserisci email" required>
                    <label for="email"  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['email-error']))echo$_POST['email-error'];?></label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password (minimo 8 caratteri):</label>
                    <input type="password" class="form-control col-11" id="password" name="password" placeholder="Inserisci password"required>
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat_password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" id="repeat_password" name="repeat_password" aria-describedby="" placeholder="Inserisci password" required>
                    <label for="repeat_password"  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="hidden" name="subscriptionType" value="seller">
                <button type="submit" name="fields" value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<?php endif; endif;?>
