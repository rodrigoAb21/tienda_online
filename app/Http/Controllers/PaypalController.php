<?php

namespace App\Http\Controllers;

use App\DetalleV;
use App\Producto;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        /* Setup PayPal api context */

        $paypal_conf =  Config::get('paypal');
        $this -> _api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this -> _api_context -> setConfig($paypal_conf['settings']);
    }

    public function postPayment(){

        $payer = new Payer();
        $payer -> setPaymentMethod('paypal');

        $items = array();
        $subtotal = 0;
        $carrito = Session::get('carrito');
        $currency = 'BOB';

        foreach ($carrito as $producto){
            $item = new Item();
            $item -> setName($producto -> nombre)
                -> setCurrency($currency)
                -> setDescription($producto -> descripcion)
                -> setQuantity($producto -> cantidad)
                -> setPrice($producto -> precio);

            $items[] = $item;
            $subtotal = $subtotal + ($producto -> cantidad * $producto -> precio);
        }

        $item_list = new ItemList();
        $item_list -> setItems($items);

        $envio = 100;

        $details = new Details();
        $details -> setSubtotal($subtotal)
            -> setShipping($envio);

        $total = $subtotal + $envio;

        $amount = new Amount();
        $amount -> setCurrency($currency)
            -> setTotal($total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction -> setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pedido de prueba');

        $redirect_urls = new RedirectUrls();
        $redirect_urls -> setReturnUrl(URL::route('payment/status'))
            -> setCancelUrl(URL::route('payment/status'));

        $payment = new Payment();
        $payment -> setIntent('Sale')
            -> setPayer($payer)
            -> setRedirectUrls($redirect_urls)
            -> setTransactions(array($transaction));

        try{
            $payment -> create($this -> _api_context);
        }catch (PayPalConnectionException $exception){
            if (Config::get('app.debug')){
                echo "Exception ". $exception -> getMessage(). PHP_EOL;
                $err_data = json_decode($exception -> getData(), true);
                exit;
            }else{
                die('Ups!, algo salio mal');
            }
        }

        foreach ($payment -> getLinks() as $link){
            if ($link -> getRel() == 'approval_url'){
                $redirect_url = $link -> getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment -> getId());

        if (isset( $redirect_url)){
            return redirect() -> away($redirect_url);

        }

        return redirect() -> to('/carrito') -> with('message', 'Ups!, Error desconocido.');


    }

    public function getPaymentStatus(){
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // Clear the session payment ID

        $payerId = Input::get('PayerID');
        $token = Input::get('token');

        if (empty($payerId) || empty($token)){
            return redirect('/') -> with('message', 'Hubo un problema al intentar pagar.');
        }

        $payment = Payment::get($payment_id, $this -> _api_context);

        $execution = new PaymentExecution();
        $execution -> setPayerId(Input::get('PayerID'));

        $result = $payment -> execute($execution, $this -> _api_context);

        if ($result -> getState() == 'approved'){

            /* Como ya se aprobo el pago, se pasa a guardar en la DB la compra */
            try {
                DB::beginTransaction();
                $carrito = Session::get('carrito');
                $datos = Session::get('datos');

                $ventas = new Venta();
                $ventas -> nit = $datos -> nit;
                $ventas -> nombre = $datos -> nombre;
                $ventas -> precioTotal = $datos -> total;
                $ventas -> idCliente = Auth::user() -> idCliente;
                $ventas -> idEmpleado = 1;
                $ventas -> estado = 'Activa';
                $my_time = Carbon::now('America/La_Paz');
                $ventas -> fecha = $my_time -> toDateTimeString();
                $ventas -> save();



                while ($cont < count($idProd)) {
                    $detalle = new DetalleV();
                    $detalle -> idVenta = $ventas -> id;
                    $detalle -> idProducto = $idProd[$cont];
                    $detalle -> cantidad = $cant[$cont];
                    $detalle -> subtotal = $subTotal[$cont];
                    if ($detalle -> save()){
                        $producto = Producto::findOrFail($detalle -> idProducto);
                        $producto -> stock = $producto -> stock - $detalle -> cantidad;
                        $producto -> update();
                    }
                    $cont = $cont + 1;
                }

                DB::commit();

                return redirect('/') -> with('message', 'Compra realizada de forma correcta.');

            } catch (Exception $e) {

                DB::rollback();

            }

        }

        return redirect('/') -> with('message', 'La compra fue cancelada.');




    }



























}
