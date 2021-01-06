<?php if(!isset($_POST['success']) && !isset($_GET['id']) && !isset($_POST['id'])): ?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h2>Recupera password</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="email" class="col-11 text-left mt-2">Email:</label>
                    <input type="email" class="form-control col-11" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserisci email" required />
                    <label for="email"  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['email-error']))echo$_POST['email-error'];?></label>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="hidden" name="subscriptionType" value="seller" />
                <button type="submit" name="fields" value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<?php elseif(isset($_POST['success'])): ?>
    <div class="row m-5 text-center">
        <div class="col-11 col-sm-10 p-3 p-sm-5 bg-dark rounded offset-sm-1">
            <h2><?php echo $_POST['success']; ?></h2>
        </div>
    </div>
<?php else: ?>
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8 my-4">
        <form class="bg-dark mt-4 mb-4 px-5 py-4 rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h2>Reimposta password</h2>
            <div class="form-row">
                <div class="form-group col-md-6 my-4">
                    <label for="password"  class="col-11 text-left mt-2">Password (minimo 8 caratteri):</label>
                    <input type="password" class="form-control col-11" id="password" name="password" placeholder="Inserisci password" required />
                    <label for=""  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
                <div class="form-group col-md-6 my-4">
                    <label for="repeat_password" class="col-11 text-left mt-2">Ripeti password:</label>
                    <input type="password" class="form-control col-11" id="repeat_password" name="repeat_password" placeholder="Inserisci password" required />
                    <label for="repeat_password"  class="col-11 text-left mt-2 error-label"><?php if(isset($_POST['password-error']))echo$_POST['password-error'];?></label>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <input type="hidden" name="id" value="<?php if(isset( $_GET['id'])) echo $_GET['id']; elseif(isset( $_POST['id'])) echo $_POST['id']; ?>" />
                <button type="submit" name="fields" value="true" class="btn btn-light">Invia</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>
