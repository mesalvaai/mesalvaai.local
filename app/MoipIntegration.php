<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use vendor\autoload;
use Moip;
class MoipIntegration extends Model
{
	
	public static function pagamentoCreditCard($base64)
	{

		$moip = Moip::start();

		$hash = base64_decode($base64);


		try {
			$customer = $moip->customers()->setOwnId(uniqid())
			->setFullname('Fulano de Tal')
			->setEmail('fulano@email.com')
			->setBirthDate('1988-12-30')
			->setTaxDocument('22222222222')
			->setPhone(11, 66778899)
			->addAddress('SHIPPING',
				'Rua de teste do SHIPPING', 123,
				'Bairro do SHIPPING', 'Sao Paulo', 'SP',
				'01234567', 8)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}



		try {

            //set OwnId único, adiciona item [doação, a quantidade, detalhe, e valor no ex. 100 R$]
			
			$order = $moip->orders()->setOwnId(uniqid())
			->addItem("Doação",1, "sku1", 10000)
			->setCustomer($customer)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}


		try {

			$payment = $order->payments()->setCreditCardHash($hash, $customer)
			->execute();

			return "Doação Realizada com sucesso";

		} catch (Exception $e) {
			dd($e->__toString());
		}
		
	}


	public static function PagamentoBoleto(){

		$moip = Moip::start();


		try {
			$customer = $moip->customers()->setOwnId(uniqid())
			->setFullname('Fulano de Tal')
			->setEmail('fulano@email.com')
			->setBirthDate('1988-12-30')
			->setTaxDocument('22222222222')
			->setPhone(11, 66778899)
			->addAddress('SHIPPING',
				'Rua de teste do SHIPPING', 123,
				'Bairro do SHIPPING', 'Sao Paulo', 'SP',
				'01234567', 8)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}



		try {

            //set OwnId único, adiciona item [doação, a quantidade, detalhe, e valor no ex. 100 R$]
			
			$order = $moip->orders()->setOwnId(uniqid())
			->addItem("Doação",1, "sku1", 10000)
			->setCustomer($customer)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}


		try {


			$logo_uri = 'https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png';
			$expiration_date = \Carbon\Carbon::now();

			// $now = new \DateTime();

			$instruction_lines = ['INSTRUÇÃO 1', 'INSTRUÇÃO 2', 'INSTRUÇÃO 3'];

             // dd($instruction_lines);

			$payment = $order->payments()  
			->setBoleto($expiration_date, $logo_uri, $instruction_lines)
			->execute();

			$url = file_get_contents($payment->getHrefPrintBoleto());



			$print = str_replace(' <link rel="icon" type="image/png" href="https://s3.amazonaws.com/assets.moip.com.br/boleto/images/moip-icon.png" />', '<link href="{{ asset("site/css/style.css") }}" rel="stylesheet">', $url);

			

			return view('visualizarBoleto', compact('print'));

			echo ("");

		} catch (Exception $e) {
			dd($e->__toString());
		}
		
	}

}
