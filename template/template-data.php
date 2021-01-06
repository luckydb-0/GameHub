<?php $user = $templateParams["user"][0]; ?>

<div class="col-md-7 my-4 bg-dark rounded offset-md-1">
    <div class="py-3">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="name" class="col-11 text-left mt-2">Nome:</label>
                    <input type="text" name="name" class="form-control col-11" id="name" aria-describedby="" value="<?php echo $user["name"];?>" required>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="surname" class="col-11 text-left mt-2">Cognome:</label>
                    <input type="text" name="surname" class="form-control col-11"  id="surname" aria-describedby="" value="<?php echo $user["surname"];?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="birthdate" class="col-11 text-left mt-2">Data di nascita:</label>
                    <input type="text" class="form-control col-11" disabled id="birthdate" aria-describedby="" value="<?php echo reverseDate($user["birthDate"]);?>">
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="phone_number" class="col-11 text-left mt-2">Telefono:</label>
                    <input type="tel" name="phone_number" class="form-control col-11" id="phone_number" aria-describedby="" value="<?php echo $user["phone"] ?>" required>
                </div>    
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" name="email" class="form-control col-11" id="email" aria-describedby="emailHelp" value="<?php echo $user["email"];?>" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password:</label>
                    <input type="password" name="password" class="form-control col-11" id="password" placeholder="Modifica password" required>
                    <?php if(isset($_POST['password_error']))
                        echo '<label for="password"  class="col-11 text-left mt-2 error">'.$_POST['password_error'].'</label>';
                    ?>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat_password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" name="repeat_password" class="form-control col-11" id="repeat_password" aria-describedby="" placeholder="Modifica password"required>
                    <?php if(isset($_POST['password_error']))
                        echo '<label for="repeat_password"  class="col-11 text-left mt-2 error">'.$_POST['password_error'].'</label>';
                    ?>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <button type="submit" value="perform" name="modifies"class="btn btn-light">Salva modifiche</button>
            </div>
        </form>
    </div>
    <?php if(isset($templateParams["error"])) {
        echo $templateParams["error"];
    }; ?>
</div>