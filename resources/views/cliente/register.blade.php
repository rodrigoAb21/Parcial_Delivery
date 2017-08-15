<!DOCTYPE html>
<html style="width: 100%" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="width: 100%; background-color: rgba(110,120,154,0.46)">
<div class="container" style="top: 100px; position: absolute; left: 0; right:0;";>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="ci" class="col-md-4 control-label">CI</label>
                            <div class="col-md-6">
                                <input id="ci" class="form-control" type="number" name="ci" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" class="form-control" name="nombre" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input id="apellido" class="form-control" name="apellido" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-md-4 control-label">Direccion</label>
                            <div class="col-md-6">
                                <input id="direccion" class="form-control" name="direccion" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefono1" class="col-md-4 control-label">Telefono</label>
                            <div class="col-md-6">
                                <input id="telefono1" type="number" class="form-control" name="telefono1" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
                            <div class="col-md-6">
                                <input id="nacimiento" class="form-control" type="date" name="nacimiento" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app1.js') }}"></script>
</body>
</html>
