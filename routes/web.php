<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('cliente.index');
});

Route::get('/productos', 'VistaClienteController@index');
Route::get('/productos/{id}', 'VistaClienteController@listarProductos');

Route::get('/registrarse', 'VistaClienteController@registro');
Route::post('/registrarse', 'VistaClienteController@registrarCliente');



Route::get('/nosotros', function () {
    return view('cliente.nosotros');
});


Route::get('/contactenos', function () {
    return view('cliente.contactenos');
});

Route::post('mensaje', function () {
    $data = request()->all();
    Mail::send('emails.mensaje', $data, function ($message) use ($data){
        $message->from($data['email'], $data['nombre'])
            ->to('rodrigo.abasto21@gmail.com', 'Rodrigo')
            ->subject($data['asunto']);
    });
    return back()->with('flash',$data['nombre'].', su mensaje ha sido recibido.');
}) -> name('mensaje');

// ----------------------------- Rutas Carrito ----------------------------------------

Route::get('/carrito','CarritoController@show');
Route::get('/carrito/add/{id}','CarritoController@add');
Route::get('/carrito/destroy','CarritoController@destroy');
Route::get('/carrito/delete/{id}','CarritoController@delete');
Route::patch('/carrito/update/{id}','CarritoController@update');


/* ----------------------------------- PAYPAL ----------------------------------------- */

Route::get('payment', 'PaypalController@postPayment');
Route::get('payment/status', 'PaypalController@getPaymentStatus');










/* ***************************************** ADMIN ************************************************** */

Route::get('/adm', function () {
    if (Auth::check()){
        if (Auth::user() -> tipo == 'Cliente'){
            return view('cliente.index');
        }else{
            return view('home');
        }
    }else{
        return view('auth.login');
    }

}) -> name('adm');

Route::get('/home', function () {
    return view('home');
}) -> name('home');

Route::resource('adm/proveedores', 'ProveedorController');
Route::resource('adm/categorias', 'CategoriaController');
Route::resource('adm/clientes', 'ClienteController');
Route::resource('adm/empleados', 'EmpleadoController');
Route::resource('adm/productos', 'ProductoController');
Route::resource('adm/ventas', 'VentaController');
Route::resource('adm/compras', 'CompraController');


Auth::routes();


