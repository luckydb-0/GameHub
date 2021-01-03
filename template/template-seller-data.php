<?php $sellerData = $templateParams["seller"]; ?>

<div class="col-md-7 my-4 bg-dark rounded offset-md-1">
    <div class="py-3">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded">
            <h2>Dati venditore</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" disabled id="name" aria-describedby="" placeholder="<?php echo $sellerData["name"]; ?>">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" id="email" aria-describedby="emailHelp" placeholder="<?php echo $sellerData["email"]; ?>">
                </div>        
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="phone-number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" class="form-control col-11" id="phone-number" aria-describedby="" placeholder="<?php echo $sellerData["phone"]; ?>">
                </div>    
                <div class="form-group col-md-6 my-4">
                    <label for="iva" class="col-11 text-left mt-2">Partita IVA:</label>
                    <input type="text" class="form-control col-11" id="iva" aria-describedby="" placeholder="<?php echo $sellerData["p_iva"]; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password:</label>
                    <input type="password" class="form-control col-11" id="password" placeholder="Modifica password">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat-password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" id="repeat-password" aria-describedby="" placeholder="Modifica password">
                </div>    
            </div>
            <div class="form-group text-right mt-3">
                <button type="submit" class="btn btn-light">Salva modifiche</button>
            </div>
        </form>
    </div>
</div>