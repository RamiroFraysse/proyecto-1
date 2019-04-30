<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!--Boostrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />

    <title>Crear Usuario</title>
</head>
<body>

    <div class="card">
        <h4 class="card-header"> Crear Usuario </h4>
        <div class="card-body">
                        <!--Laravel pasa automaticamente la variable errors a la vista-->
                @if ($errors->any())
                <div class="alert alert-danger">
                        <h6>Por favor corrige los siguientes errores debajo:</h6>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{ $error}}
                            </li>
                            @endforeach
                        </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('usuarios/crear') }}">
                {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <!--Uso Boostrap-->
                <div class="form-group">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Juan Perez" value="{{ old('name') }}">
                </div>
                <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="juanperez@example.com" value="{{ old('email') }}">
                </div>
                <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres" ><br>
                </div>
                        <button type="submit" class = "btn btn-primary">Crear usuario</button>
                </div>
            </form>
                    </div>
              </div>



</body>
</html>
