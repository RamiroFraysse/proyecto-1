<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  boostrap y datatable con el stylo de boostrap  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!--Boostrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <title>Futboleros</title>
</head>
<body>

        <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Listas de Usuarios</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.create') }}">Crear Lista</a>
                          </li>
                  </ul>

                </div>
        </nav>




    @if($lists->isNotEmpty())
         <div class="list-group">
             @foreach ($lists as $list)
                <a href="#" class="ver list-group-item list-group-item-action list-group-item-dark">{{$list->name}} creada por {{ $user->name}}</a>
                <table></table>
            @endforeach



    @else
        <p>No se han creado listas todavía</p>
    @endif



    <script type="text/javascript">


        //Codigo jquery para agregar mas filas
        $('.ver').on('click',function(){
            ver();
        });
        function ver ()
        {
            var table=' <table class="table table-sm table-dark table-hover">'+
                        '<thead>'+
                        '<tr>'+
                        '<th scope="col">#</th>'+
                        '<th scope="col">Club</th>'+
                        '<th scope="col">Estadio</th>'+
                        '<th scope="col">Capacidad</th>'+
                        '<th scope="col">Pais</th>'+
                        '</tr>'+
                        '</thead>'+
                        '</table>';
            $('table').append(table);
        };

        //codigo para sacar filas
        $('.remove').live('click',function(){
            var last=$('tbody tr').length;
            if(last==1){
                alert("you can not remove last row");
            }
            else{
                 $(this).parent().parent().remove();
            }

        });
    </script>

    <!--Boostrap core JavaScript
        =============================================================-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
