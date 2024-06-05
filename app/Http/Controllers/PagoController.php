<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;

class PagoController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            try{
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'items' => array(
                        array(
                            'name' => 'Course Subcription',
                            'price' => $request->input('amount'),
                            'description' => 'Get access to premium courses.',
                            'quantity' => 1
                        )
                    ),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();

                if($response->isRedirect()) {
                    $response->redirect();
                } else {
                    return $response->getMessage();
                }
            } catch(Exception $e){
                return $e->getMessage();
            
            }
        }
    }

    public function success(Request $request)
    {
        if($request->input('paymentId') && $request->input('PayerID')) {
           $transaction = $this->gateway->completePurchase(array(
               'payer_id'                => $request->input('PayerID'),
               'transactionReference'    => $request->input('paymentId'),
           ));

           $response = $transaction->send();

           if($response->isSuccessful()) {
              // The customer has successfully paid
              $arr_body = $response->getData();

              // Insert transaction data into the database
              $payment = new Payment;
              $payment->payment_id = $arr_body['id'];
              $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
              $payment->payer_email = $arr_body['payer']['payer_info']['email'];
              $payment->amount = $arr_body['transaction'][0]['amount']['total'];
              $payment->currency = env('PAYPAL_CURRENCY');
              $payment->payment_status = $arr_body['state'];
              $payment->save();

              return "Pago Exitoso. El codigo de su transacción es: ". $arr_body['id'];
           } else {
                return $response->getMessage();
           }
        } else {
            return 'Transacción Fallida';
        }
    }

    public function error()
    {
        return 'Usuario canceló el pago.';
    }
}
