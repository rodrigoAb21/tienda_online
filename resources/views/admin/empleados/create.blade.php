@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="header">
                <h3>Nuevo Empleado</h3>
            </div>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            <div class="content">
                {!!Form::open(array('url'=>'adm/empleados','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="ci">Carnet de Identidad</label>
                        <input type="number" name="ci" class="form-control" required autofocus >
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required >
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nacimiento">F. Nacimiento</label>
                        <input type="date" name="nacimiento" class="form-control"  required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control"  required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" class="form-control"  required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"  required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"  required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label  for="tipo">Tipo</label>
                        <select class="form-control" name="tipo">
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo}}">{{$tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>

                {!!Form::close()!!}

            </div>

		</div>
	</div>
	</div>
@endsection