<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use vendor\autoload;
use Moip;
class MoipIntegration extends Model
{
	
	public static function pagamentoCreditCard($base64)
	{
		dd($base64);
		$moip = Moip::start();
		$hash = base64_decode($base64);

		try {
			$customer = $moip->customers()->setOwnId(uniqid())
			->setFullname('Fulano de Tal')
			->setEmail('fulano@email.com')
			->setBirthDate('1988-12-30')
			->setPhone(11, 66778899)
			->setTaxDocument('22222222222')
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


	public static function getPagamentoBoleto(){

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
			$codBoleto = $payment->getLineCodeBoleto();
			$idBoleto = $payment->getId();

			$print = str_replace(' <link rel="icon" type="image/png" href="https://s3.amazonaws.com/assets.moip.com.br/boleto/images/moip-icon.png" />', '<link href="{{ asset("site/css/style.css") }}" rel="stylesheet">', $url);
			//PAYMENT_ID
			//$payment = $moip->payments()->get("PAY-SVSD4VAAGKM5");
			//$payment = json_encode($payment);
			$data = [
				'idBoleto' => $idBoleto,
				'codBoleto' => $codBoleto,
				'print' => $print
			];

			return $data;
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

			return $print;

		} catch (Exception $e) {
			dd($e->__toString());
		}
	}

	public static function test(){

		$moip = Moip::start();

		// $notification = $moip->notifications()->delete('NPR-7PG2BKR3T42M');
		// $notification = $moip->notifications()->delete('NPR-FX00FPQ5VMJP');
		// $notification = $moip->notifications()->delete('NPR-JN2XJU76LRO3');

		// $notification = $moip->notifications()->getList();
		//  dd($notification);
		// $payment = $moip->payments()->get("PAY-DZ8ME9LE0GUA");
		// 
		// 		$json = file_get_contents('php://input');
		// // Converte os dados recebidos
		// 		$response = json_decode($json, true);
		// 		dd($json);

		// $notification = $moip->notifications()->delete("NPR-UCHE076YIHAO");
		// dd($notification);

		// $notification = $moip->notifications()->getList();;
		// dd($notification);

		$notification = $moip->notifications()
		->addEvent('PAYMENT.AUTHORIZED')
		->addEvent('PAYMENT.CANCELLED')
		->setTarget('http://msalvaai.proxy.beeceptor.com/')
		->create();

		dd($notification);
		// https://sandbox.moip.com.br/v2/payments/ORD-JZ7XQFDOOSUJ
	}

	public static function testt(){

		$um = '{"date":"","env":"","event":"PAYMENT.AUTHORIZED","resource":{"payment":{"_links":{"order":{"href":"https://sandbox.moip.com.br/v2/orders/ORD-H6N0DLEQWS20","title":"ORD-H6N0DLEQWS20"},"self":{"href":"https://sandbox.moip.com.br/v2/payments/PAY-7IXLPRHCE6N5"}},"acquirerDetails":{"authorizationNumber":"031119","taxDocument":{"number":"01425787000104","type":"CNPJ"}},"amount":{"currency":"BRL","fees":618,"gross":10000,"liquid":9382,"refunds":0,"total":10000},"createdAt":"2018-08-03T14:42:24.000-03","delayCapture":false,"events":[{"createdAt":"2018-08-03T14:42:25.330-03","type":"PAYMENT.AUTHORIZED"},{"createdAt":"2018-08-03T14:42:24.000-03","type":"PAYMENT.CREATED"},{"createdAt":"2018-08-03T14:42:24.000-03","type":"PAYMENT.IN_ANALYSIS"}],"fees":[{"amount":618,"type":"TRANSACTION"}],"fundingInstrument":{"creditCard":{"brand":"HIPERCARD","first6":"606282","holder":{"birthDate":"1988-12-30","birthdate":"1988-12-30","fullname":"Fulano de Tal","taxDocument":{"number":"22222222222","type":"CPF"}},"id":"CRC-VN5ABPB85ARU","last4":"4001","store":true},"method":"CREDIT_CARD"},"id":"PAY-7IXLPRHCE6N5","installmentCount":1,"receivers":[{"amount":{"currency":"BRL","fees":618,"refunds":0,"total":10000},"feePayor":true,"moipAccount":{"fullname":"VINICIUS LEDO BARRETO","id":"MPA-48991CFD3B9D","login":"msa@mesalvaai.com"},"type":"PRIMARY"}],"status":"AUTHORIZED","updatedAt":"2018-08-03T14:42:25.330-03"}}}';


		$dois = '{"date":"","env":"","event":"PAYMENT.AUTHORIZED","resource":{"payment":{"_links":{"order":{"href":"https://sandbox.moip.com.br/v2/orders/ORD-H6N0DLEQWS20","title":"ORD-H6N0DLEQWS20"},"self":{"href":"https://sandbox.moip.com.br/v2/payments/PAY-7IXLPRHCE6N5"}},"acquirerDetails":{"authorizationNumber":"031119","taxDocument":{"number":"01425787000104","type":"CNPJ"}},"amount":{"currency":"BRL","fees":618,"gross":10000,"liquid":9382,"refunds":0,"total":10000},"createdAt":"2018-08-03T14:42:24.000-03","delayCapture":false,"events":[{"createdAt":"2018-08-03T14:42:25.330-03","type":"PAYMENT.AUTHORIZED"},{"createdAt":"2018-08-03T14:42:24.000-03","type":"PAYMENT.CREATED"},{"createdAt":"2018-08-03T14:42:24.000-03","type":"PAYMENT.IN_ANALYSIS"}],"fees":[{"amount":618,"type":"TRANSACTION"}],"fundingInstrument":{"creditCard":{"brand":"HIPERCARD","first6":"606282","holder":{"birthDate":"1988-12-30","birthdate":"1988-12-30","fullname":"Fulano de Tal","taxDocument":{"number":"22222222222","type":"CPF"}},"id":"CRC-VN5ABPB85ARU","last4":"4001","store":true},"method":"CREDIT_CARD"},"id":"PAY-7IXLPRHCE6N5","installmentCount":1,"receivers":[{"amount":{"currency":"BRL","fees":618,"refunds":0,"total":10000},"feePayor":true,"moipAccount":{"fullname":"VINICIUS LEDO BARRETO","id":"MPA-48991CFD3B9D","login":"msa@mesalvaai.com"},"type":"PRIMARY"}],"status":"AUTHORIZED","updatedAt":"2018-08-03T14:42:25.330-03"}}}';


		$bol = '{"date":"","env":"","event":"PAYMENT.AUTHORIZED","resource":{"payment":{"_links":{"order":{"href":"https://sandbox.moip.com.br/v2/orders/ORD-X6Z8LFNPM9T3","title":"ORD-X6Z8LFNPM9T3"},"self":{"href":"https://sandbox.moip.com.br/v2/payments/PAY-VXASZEFLNR0A"}},"amount":{"currency":"BRL","fees":349,"gross":10000,"liquid":9651,"refunds":0,"total":10000},"createdAt":"2018-08-03T13:39:06.000-03","delayCapture":false,"events":[{"createdAt":"2018-08-03T14:53:55.126-03","type":"PAYMENT.AUTHORIZED"},{"createdAt":"2018-08-03T13:39:06.000-03","type":"PAYMENT.CREATED"},{"createdAt":"2018-08-03T13:39:06.000-03","type":"PAYMENT.WAITING"}],"fees":[{"amount":349,"type":"TRANSACTION"}],"fundingInstrument":{"boleto":{"expirationDate":"2018-08-03","instructionLines":{"first":"INSTRUÇÃO 1","second":"INSTRUÇÃO 2","third":"INSTRUÇÃO 3"},"lineCode":"00190.00009 01014.051005 00000.787176 7 72370000001000","logoUri":"https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png"},"method":"BOLETO"},"id":"PAY-VXASZEFLNR0A","installmentCount":1,"receivers":[{"amount":{"currency":"BRL","fees":349,"refunds":0,"total":10000},"feePayor":true,"moipAccount":{"fullname":"VINICIUS LEDO BARRETO","id":"MPA-48991CFD3B9D","login":"msa@mesalvaai.com"},"type":"PRIMARY"}],"status":"AUTHORIZED","updatedAt":"2018-08-03T14:53:55.126-03"}}}';

		$de = json_decode($bol);

		// $json = file_get_contents('php://input');
		// $response = json_decode($json, true);

		// dd($de->resource->payment->status);
		// dd($de->resource->payment->id);

		// dd($de->event == "PAYMENT.AUTHORIZED");
		$moip = Moip::start();
		dd($de);
		$webhooks = $moip->webhooks()->get();
		dd($webhooks);
	}

}
