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
			// ->setCreditCard(12, 21, '4073020000000002', '123')
			->addAddress('SHIPPING',
				'Rua de teste do SHIPPING', 123,
				'Bairro do SHIPPING', 'Sao Paulo', 'SP',
				'01234567', 8)
			->create();
			// dd($customer);
		} catch (Exception $e) {
			dd($e->__toString());
		}




		try {

//set OwnId único, adiciona item [doação, a quantidade, detalhe, e valor no ex. 100 R$]

			$order = $moip->orders()->setOwnId(uniqid())
			->addItem("Doação",1, "sku1", 10000)
			->setCustomer($customer)
			->create();

			//dd($order);
		} catch (Exception $e) {
			dd($e->__toString());
		}


		
		// try {
		// 	$payment = $order->payments()->setCreditCard(12, 21, '4073020000000002', '123', $customer)
		// 	 ->execute();


		//  	// dd($payment);
		// } catch (Exception $e) {
		// 	dd($e->__toString());
		// }

		$hash = "aOC1jHRnujnHB2Jgx7rslF3MKkS62pZH0DXhkDgSWYKexahKoE/2adVpye4YldSQK/O/0pFtLoU1ZuLBxnE5LWvd/3Lkh9kVSlNjS3o2WTb93rTk5jWk9aVIr0WaAFNEswOIqIVp676e1J+Lyd8kHBXVheeAegimy08iP1g1+YiamfbEcmWVZSj4AZBvoIMCqyBtESMCMmw49k24ty7Bx8YcT5YCljEk2+Mvs6Z+Rj1btxzudGr9xVBoKl/zTpz9lx8PMlo8vaLxX0+IISaHOKaEkYwlyt0fcIcou3mMu5/Xfq72uHdeT+KiNefIu81YpsBhrnG4uh0NamXZya2gqg==";
		$payment = $order->payments()->setCreditCardHash($hash, $customer)
		// ->setInstallmentCount(3)
		// ->setStatementDescriptor('teste de pag')
		  ->execute();
		//dd($payment);
		 return "ok";
	}


}
