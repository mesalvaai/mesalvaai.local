<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use vendor\autoload;
use Moip;

class MoipCreditCard extends Model
{

	public static function test($hash)
	{


		$hash = base64_decode($hash);


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

			$payment = $order->payments()->setCreditCardHash($hash, $customer)
			->execute();
			return "ok";

		} catch (Exception $e) {
			dd($e->__toString());
		}
		
	}


}
