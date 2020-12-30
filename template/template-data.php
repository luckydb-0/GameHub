<?php $user = $templateParams["user"];?>

<div class="col-md-7 my-4 bg-dark rounded offset-md-1">
    <div class="py-3">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded">
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" class="form-control col-11" disabled id="name" aria-describedby="" placeholder="<?php echo $user[0]["name"];?>">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="surname" class="col-11 text-left mt-2">Cognome:</label>
                    <input type="text" class="form-control col-11" disabled id="surname" aria-describedby="" placeholder="<?php echo $user[0]["surname"];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="birthdate" class="col-11 text-left mt-2">Data di nascita:</label>
                    <input type="text" class="form-control col-11" disabled id="birthdate" aria-describedby="" placeholder="<?php echo reverseDate($user[0]["birthDate"]);?>">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="phone-number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" class="form-control col-11" id="phone-number" aria-describedby="" placeholder="3339012309">
                </div>    
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" id="email" aria-describedby="emailHelp" placeholder="<?php echo $user[0]["email"];?>">
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