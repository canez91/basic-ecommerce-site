<?php

namespace App;

use URL;
use Config;

use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPal\Core\SandboxEnvironment; //ProductionEnvironment para ambiente de producción.

class PayPal{
	public $client, $environment;

	public function __construct(){
		$client_id = Config::get("services.paypal.client");
		$secret_id = Config::get("services.paypal.secret");

		$this->environment = new SandboxEnvironment( $client_id, $secret_id );

		$this->client = new PayPalHttpClient( $this->environment );
    }

    //SOLICITUD DE COBRO
    public function buildPaymentRequest($amount){
    	$request = new PaymentCreateRequest();

    	$body = [
    	  "intent" => "sale",
    	  "transactions" => [
    	    [
    	      "amount" => ["total" => $amount, "currency" => "MXN"]
    	    ]
    	  ],
    	  "payer" => [
    	    "payment_method" => "paypal",
    	  ],
    	  "redirect_urls" => [
    	  	"cancel_url" => URL::route("shopping_cart.show"),
    	  	"return_url" => URL::route("payments.successReturn")
    	  ]
    	];

    	$request->body = $body;

    	return $request;
    }

    //EJECUCION DE COBRO

    public function charge($amount){
      return $this->client->execute( $this->buildPaymentRequest( $amount ) );
    }

    public function executePayment($paymentId, $payerId){
      $paymentExecute = new PaymentExecuteRequest( $paymentId );
      $paymentExecute->body = [
 	    "payer_id" => $payerId		
      ];

      return $this->client->execute( $paymentExecute );
    }
}