    <!DOCTYPE html>
    <html lang="en">
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="css\stilus.css" />
    <script src="js\konyvtarAjax.js"></script>
    
    <script src="js\konyvtarActions.js"></script>
    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Könyvtári nyilvántartás</title>
    </head>
   
<body>
        <div class="container">
                    <header>
                        <h1>Könyvtári könyvek</h1>
                    </header>

        <main>
                <form action="{{ route('konyvtar.create') }}" method="POST" id="form-group">
                        @csrf
                        <div>
                            <label for="szerzo">Szerző:</label>
                            <input type="text" name="szerzo" id="szerzo" required>
                        </div>
                        <div>
                            <label for="cim">Cím:</label>
                            <input type="text" name="cim" id="cim" required>
                        </div>
                        <div>
                            <label for="kiado">Kiadó:</label>
                            <input type="text" name="kiado" id="kiado" required>
                        </div>
                        <div>
                            <label for="reszleg">Részleg:</label>
                            <input type="text" name="reszleg" id="reszleg" required>
                        </div>
                        <div>
                            <button type="submit" class="hozzaadasButton">Hozzáadás</button>
                        </div>
                    </form>
                
                        <table class="table-content">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Szerző</th>
                                <th>Cím</th>
                                <th>Kiadó</th>
                                <th>Részleg</th>
                            </tr>
                        </thead>
                        <tbody id="konyvtar-table-body">
                        @foreach($konyvtars as $konyvtar)
                            <tr>
                                <td>{{ $konyvtar->id }}</td>
                                <td>{{ $konyvtar->szerzo }}</td>
                                <td>{{ $konyvtar->cim }}</td>
                                <td>{{ $konyvtar->kiado }}</td>
                                <td>{{ $konyvtar->reszleg }}</td>
                                <td>
                                <button class="delete-button" data-id="{{ $konyvtar->id }}">Törlés</button>
                            </td>
                            </tr>
                            @endforeach

                    
                        </tbody>
                    </table>

        </main>


        <footer><h3>konytar © 2023</h3></footer>
    </div>
</body>
</html>