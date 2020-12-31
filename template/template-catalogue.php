<div class="col-md-8">
    <div class="row">
        <div class="col-md-12 my-4 offset-md-1 pl-md-4 pl-lg-4 pl-xl-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th id="Immagine">Immagine</th>
                        <th id="Cod.Articolo">Cod. Articolo</th>
                        <th id="Nome">Nome</th>
                        <th id="Piattaforma">Piattaforma</th>
                        <th id="Prezzo">Prezzo (Euro €)</th>
                        <th id="Copie-disponibili">Copie disponibili</th>
                        <th id="Copie-vendute">Copie vendute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td headers="Immagine" data-label="Immagine"><img src="img/GoW.jpg" alt="God of War - PS4" class="img-thumbnail"></td>
                        <td headers="Cod.Articolo" data-label="Cod.Articolo">1</td>
                        <td headers="Titolo" data-label="Titolo">God Of War</td>
                        <td headers="Piattaforma" data-label="Piattaforma">PS4</td>
                        <td headers="Prezzo" data-label="Prezzo"><form><input type="number" id="price" value="69.99"></form></td>
                        <td headers="Copie-disponibili" data-label="Copie-disponibili"><form><input type="number" id="copies" value="9"></form></td>
                        <td headers="Copie-vendute" data-label="Copie-vendute">11</td>
                    </tr>
                    <tr>
                        <td headers="Immagine" data-label="Immagine"><img src="img/GoW.jpg" alt="God of War - PS4" class="img-thumbnail"></td>
                        <td headers="Cod.Articolo" data-label="Cod.Articolo">1</td>
                        <td headers="Titolo" data-label="Titolo">God Of War</td>
                        <td headers="Piattaforma" data-label="Piattaforma">PS4</td>
                        <td headers="Prezzo" data-label="Prezzo"><form><input type="number" id="price" value="69.99"></form></td>
                        <td headers="Copie-disponibili" data-label="Copie-disponibili"><form><input type="number" id="copies" value="9"></form></td>
                        <td headers="Copie-vendute" data-label="Copie-vendute">11</td>
                    </tr>
                    <tr>
                        <td headers="Immagine" data-label="Immagine"><img src="img/GoW.jpg" alt="God of War - PS4" class="img-thumbnail"></td>
                        <td headers="Cod.Articolo" data-label="Cod.Articolo">1</td>
                        <td headers="Titolo" data-label="Titolo">God Of War</td>
                        <td headers="Piattaforma" data-label="Piattaforma">PS4</td>
                        <td headers="Prezzo" data-label="Prezzo"><form><input type="number" id="price" value="69.99"></form></td>
                        <td headers="Copie-disponibili" data-label="Copie-disponibili"><form><input type="number" id="copies" value="9"></form></td>
                        <td headers="Copie-vendute" data-label="Copie-vendute">11</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 offset-md-1">
            <div class="form-group text-right mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Aggiungi articolo
                    </button>
                
                    <!-- The Modal -->
                    <div class="modal fade text-dark" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Aggiungi articolo</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form>
                                <div class="form-row">
                                    <label for="img" class="col-11 text-left mt-2">Immagine:</label>
                                    <input type="file" class="form-control-file col-11" id="name" placeholder="Inserisci immagine">
                                </div>
                                <div class="form-row">
                                    <label for="title" class="col-11 text-left mt-2">Titolo:</label>
                                    <input type="text" class="form-control col-11" id="name" placeholder="Inserisci titolo">
                                </div>
                                <div class="form-row">
                                    <label for="platform" class="col-11 text-left mt-2">Piattaforma:</label>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">Xbox ONE
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">PS4
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">Nintendo Switch
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">PS5
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">Xbox Series X
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">Xbox Series S
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="price" class="col-11 text-left mt-2">Prezzo:</label>
                                    <input type="number" class="form-control col-11" id="price" placeholder="Inserisci prezzo">
                                </div>
                                <div class="form-row">
                                    <label for="copies" class="col-11 text-left mt-2">Copie disponibili:</label>
                                    <input type="number" class="form-control col-11" id="copies" placeholder="Inserisci copie disponibili">
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">Salva</button>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                <button type="submit" class="btn btn-light">Salva modifiche</button>
            </div>
        </div>
    </div>
</div>
