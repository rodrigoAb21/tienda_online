<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
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

        return redirect() -> to('/carrito') -> with('error', 'Ups!, Error desconocido.');


    }






}
