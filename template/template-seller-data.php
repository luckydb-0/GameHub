<?php $sellerData = $templateParams["seller"]; ?>

<div class="col-md-7 my-4 bg-dark rounded offset-md-1">
    <div class="py-3">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h2>Dati venditore</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" name="name" class="form-control col-11" id="name" aria-describedby="" value="<?php echo $sellerData["name"]; ?>">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" name="email" id="email" aria-describedby="emailHelp" disabled  value="<?php echo $sellerData["email"]; ?>">
                </div>        
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="phone_number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" class="form-control col-11" name="phone_number" id="phone_number" aria-describedby="" value="<?php echo $sellerData["phone"]; ?>">
                </div>    
                <div class="form-group col-md-6 my-4">
                    <label for="p_iva" class="col-11 text-left mt-2">Partita IVA:</label>
                    <input type="text" name="p_iva" class="form-control col-11" id="p_iva" aria-describedby="" value="<?php echo $sellerData["p_iva"]; ?>" disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password:</label>
                    <input type="password" name="password" class="form-control col-11" required id="password" placeholder="Modifica password">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat_password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" name="repeat_password" class="form-control col-11" required id="repeat_password" aria-describedby="" placeholder="Modifica password">
                </div>    
            </div>
            <div class="form-group text-right mt-3">
                <button type="submit" value="perform" name="modifies" class="btn btn-light">Salva modifiche</button>
            </div>
        </form>
    </div>
    <?php if(isset($templateParams["error"])) {
        echo $templateParams["error"];
    }; ?>
</div>