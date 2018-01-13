<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="{{asset('imagenes/icono.png')}}" />

        <title>Login Inquifarmed</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap2.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{asset('css/signin.css')}}">
    </head>

  <body>

    <div class="container">

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h2 align="center"><i class="fa fa-flask"></i> Inquifarmed</h2><br>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-danger btn-block" type="submit"><i class="fa fa-sign-in"></i><span> Iniciar Sesion</span></button>
            </div>
        </form>
    </div>
  </body>

</html>