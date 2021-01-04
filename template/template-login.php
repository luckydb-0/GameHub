<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-8">
        <form action="#" method="POST" class="bg-dark mt-4 mb-4 px-5 py-4 rounded">
            <h2>Login</h2>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <div class="form-group row my-4">
                <label for="email" class="col-2 text-left offset-1 mt-2">Email:</label>
                <input type="email" class="form-control col-6" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserisci email">
            </div>
            <div class="form-group row">
                <label for="password"  class="col-2 text-left offset-1 mt-2">Password:</label>
                <input type="password" class="form-control col-6" id="password" name="password" placeholder="Inserisci password">
            </div>
            <div class="form-group text-right">
                <input type="submit" name="Invia" value="Invia" class="btn btn-light" />
            </div>
            <p> Non sei iscritto? <a href="subscribe.php">Registrati</a></p>           
        </form>
    </div>
</div>
