<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use vendor\autoload;
use App\Helpers\FormatTime;
use App\Helpers\MyFunctions;
use \Carbon\Carbon;
use Moip;
class MoipIntegration extends Model
{
	
	public static function getPagamentoCreditCard($request)
	{
		$current_time = Carbon::now()->toDateTimeString();
		$phone = self::getPhone($request['phone']);
		$total_amount = self::getTotalAmount($request['total_amount']);
		$date_of_birth =FormatTime::FormatDataDB($request['date_of_birth']);
		$moip = Moip::start();
		//$hash = base64_decode($request->keyMoip);
		$hash = $request->keyMoip;
		

		try {
			$customer = $moip->customers()->setOwnId(uniqid())
			->setFullname($request->full_name)
			->setEmail($request->email)
			->setBirthDate($date_of_birth)
			->setPhone($phone['ddd'], $phone['numero'])
			->setTaxDocument($request['cpf'])
			->addAddress('SHIPPING',
				'Rua de teste do SHIPPING', 101,
				'Bairro de Capoeiruçu', 'Bahia', 'BA',
				'44.300-000', 197)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}
		try {
            //set OwnId único, adiciona item [doação, a quantidade, detalhe, e valor no ex. 100 R$]
			$order = $moip->orders()->setOwnId(uniqid())
			->addItem("Doação",1, "sku1", $total_amount)
			->setCustomer($customer)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}

		try {

			$payment = $order->payments()->setCreditCardHash($hash, $customer)
			->execute();
			if ($payment->getStatus() === 'IN_ANALYSIS') {
				$donation = new Donation();
				$donation->full_name = $request['full_name'];
				$donation->email = $request['email'];
				$donation->date_of_birth = $date_of_birth;
				$donation->phone = $request['phone'];
				$donation->cpf = $request['cpf'];
				$donation->total_amount = MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
				$donation->donation_date = $current_time;
				$donation->type_payment = $request['type_payment'];
				$donation->payment_id = $payment->getId();
				$donation->order_id = $order->getId();
				$donation->payment_status = $payment->getStatus();
				$donation->status = 1;
				$donation->details = 'Pagamento no cartão';
				$save = $donation->save();

				if ($save) {
					$campaign_donation = new CampaignDonation();
					$campaign_donation->campaign_id = $request['campaign_id'];
					$campaign_donation->donation_id = $donation->id;
					$campaign_donation->donation_amount = MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
					$campaign_donation->type_payment = $payment->getFundingInstrument()->method;
					$campaign_donation->payment_id = $payment->getId();
					$campaign_donation->order_id = $order->getId();
					$campaign_donation->payment_status = $payment->getStatus();
					$campaign_donation->details = 'Pagamento no cartão';
					$saveCampaingDonation  = $campaign_donation->save();

					/*if ($saveCampaingDonation) {
						$campaign = Campaign::where('id', $request->input('campaign_id'))->first();
					    $campaign->funds_received = $campaign->funds_received + MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
					    $campaign->update();
					}*/
				}

				$data = [
					'idCard' => $payment->getId(),
					'statusPago' => $payment->getStatus()
				];

				return $data;
			}

			return $payment->getId();

		} catch (Exception $e) {
			dd($e->__toString());
		}	
	}

	public static function getPagamentoBoleto($request){
		$current_time = Carbon::now()->toDateTimeString();
		$phone = self::getPhone($request['phone']);
		$total_amount = self::getTotalAmount($request['total_amount']);
		$date_of_birth =FormatTime::FormatDataDB($request['date_of_birth']);

		//dd(MyFunctions::FormatCurrencyForDataBase($request['total_amount']));
		$moip = Moip::start();
		try {
			$customer = $moip->customers()->setOwnId(uniqid())
			->setFullname($request['full_name'])
			->setEmail($request['email'])
			->setBirthDate($date_of_birth)
			->setTaxDocument($request['cpf'])
			->setPhone($phone['ddd'], $phone['numero'])
			->addAddress('SHIPPING',
				'Rua de teste do SHIPPING', 101,
				'Bairro de Capoeiruçu', 'Bahia', 'BA',
				'44.300-000', 197)
			->create();
		} catch (Exception $e) {
			dd($e->__toString());
		}

		try {
            //set OwnId único, adiciona item [doação, a quantidade, detalhe, e valor no ex. 100 R$]
			$order = $moip->orders()->setOwnId(uniqid())
			->addItem("Doação",1, "sku1", $total_amount)
			->setCustomer($customer)
			->create();

		} catch (Exception $e) {
			dd($e->__toString());
		}

		try {
			$logo_uri = 'https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png';
			$expiration_date = new Carbon(date('Y-m-d', strtotime('+4 days')));

			$instruction_lines = ['INSTRUÇÃO 1', 'INSTRUÇÃO 2', 'INSTRUÇÃO 3'];

			$payment = $order->payments()  
			->setBoleto($expiration_date, $logo_uri, $instruction_lines)
			->execute();

			//dd($payment->getFundingInstrument()->method);
			if ($payment->getStatus() === 'WAITING') {
				$donation = new Donation();
				$donation->full_name = $request['full_name'];
				$donation->email = $request['email'];
				$donation->date_of_birth = $date_of_birth;
				$donation->phone = $request['phone'];
				$donation->cpf = $request['cpf'];
				$donation->total_amount = MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
				$donation->donation_date = $current_time;
				$donation->type_payment = $request['type_payment'];
				$donation->payment_id = $payment->getId();
				$donation->order_id = $order->getId();
				$donation->payment_status = $payment->getStatus();
				$donation->status = 1;
				$donation->details = 'Pagamento no boleto';
				$save = $donation->save();

				if ($save) {
					$campaign_donation = new CampaignDonation();
					$campaign_donation->campaign_id = $request['campaign_id'];
					$campaign_donation->donation_id = $donation->id;
					$campaign_donation->donation_amount = MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
					$campaign_donation->type_payment = $payment->getFundingInstrument()->method;
					$campaign_donation->payment_id = $payment->getId();
					$campaign_donation->order_id = $order->getId();
					$campaign_donation->payment_status = $payment->getStatus();
					$campaign_donation->details = 'Pagamento no boleto';
					$saveCampaingDonation  = $campaign_donation->save();

					/*if ($saveCampaingDonation) {
						$campaign = Campaign::where('id', $request->input('campaign_id'))->first();
					    $campaign->funds_received = $campaign->funds_received + MyFunctions::FormatCurrencyForDataBase($request['total_amount']);
					    $campaign->update();
					}*/
				}

				$url = file_get_contents($payment->getHrefPrintBoleto());
				$codBoleto = $payment->getLineCodeBoleto();
				$idBoleto = $payment->getId();
				$urlBoleto = $payment->getHrefPrintBoleto();
				$hrefBoleto = explode('/', $payment->getHrefBoleto());
				$hrefBoleto = array_last($hrefBoleto);
				$total_amount = $payment->getAmount()->total;
				$print = str_replace(' <link rel="icon" type="image/png" href="https://s3.amazonaws.com/assets.moip.com.br/boleto/images/moip-icon.png" />', '<link href="{{ asset("site/css/style.css") }}" rel="stylesheet">', $url);

				$data = [
					'idBoleto' => $idBoleto,
					'orderId' => $payment->getOrder()->getId(),
					'codBoleto' => $codBoleto,
					'urlBoleto' => $urlBoleto,
					'hrefBoleto' => $hrefBoleto,
					'total_amount' => $total_amount,
					'full_name' => $request->full_name,
					'print' => $print
				];

				return $data;
			}
			
		} catch (Exception $e) {
			dd($e->__toString());
		}
	}

	public static function getPhone($phone)
	{
		$removeCarateres = preg_replace("/[^0-9]/", "", $phone);
		$pegarDosPrimeirosDigitos = substr( $removeCarateres, 0, 2 );
		$pegarUltimosDigitos = substr( $removeCarateres, 2, 9 );
		$data = [
			'ddd' => $pegarDosPrimeirosDigitos,
			'numero' => $pegarUltimosDigitos,
		];
		return $data;
	}

	public static function getTotalAmount($total_amount)
	{
		$amount = preg_replace("/[^0-9]/", "", $total_amount);
		return intval($amount);
	}

	public static function pagamentoCreditCard($base64)
	{
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

			$payment = $order->payments()  
			->setBoleto($expiration_date, $logo_uri, $instruction_lines)
			->execute();
			//Status => CREATED, WAITING, IN_ANALYSIS, PRE_AUTHORIZED, AUTHORIZED, CANCELLED, REFUNDED, REVERSED, SETTLED.
			//dd($payment->getStatus());
			$url = file_get_contents($payment->getHrefPrintBoleto());

			$print = str_replace(' <link rel="icon" type="image/png" href="https://s3.amazonaws.com/assets.moip.com.br/boleto/images/moip-icon.png" />', '<link href="{{ asset("site/css/style.css") }}" rel="stylesheet">', $url);

			return $print;

		} catch (Exception $e) {
			dd($e->__toString());
		}
	}

	public static function getStatusCreditCard($idMoip)
	{
		//PAY-B3ZO5RY5K3KT cartao
		//PAY-BBJ3J4031QVP Boleto
		try {
		    $moip = Moip::start();
			$payment = $moip->payments()->get('PAY-B3ZO5RY5K3KT');
			//$payment = $moip->orders()->get($idMoip);
			//$payment->getStatus()
			//$payment->getId()
			return $payment->getStatus();
			//$payment->getOrder()->getCustomer()->getfullname()
			//$payment->getOrder()->getId() //obter order id
			//Com Json
			//$payment = $moip->orders()->get($idMoip);
			//$data = json_encode($payment);
			//$data = json_decode($data);
			//$precio = $data->items[0]->price;
			//$total = $data->amount->total;
			//$total = $data->status;
			//return $data->status;
			
		} catch (Exception $e) {
		    printf($e->__toString());
		}
	}

	public static function getStatusBoleto($idMoip)
	{
		//PAY-B3ZO5RY5K3KT
		//{"ownId":"5b888fbb5810c","amount":{"currency":"BRL","subtotals":{"shipping":0,"addition":0,"discount":0,"items":200000050},"total":200000050,"fees":0,"refunds":0,"liquid":0,"otherReceivers":0},"items":[{"product":"Doa\u00e7\u00e3o","detail":"sku1","quantity":1,"price":200000050}],"receivers":[{"moipAccount":{"id":"MPA-48991CFD3B9D","login":"msa@mesalvaai.com","fullname":"VINICIUS LEDO BARRETO"},"type":"PRIMARY","amount":{"total":200000050,"currency":"BRL","fees":0,"refunds":0},"feePayor":true}],"checkoutPreferences":{"redirectUrls":{},"installments":[]},"id":"ORD-UAN0O4CLPQKE","customer":{"id":"CUS-87O6IRFADSZT","ownId":"5b888fb621c69","fullname":"Eber Ortiz Mas","email":"ortizmas111@gmail.com","phone":{"countryCode":"55","areaCode":"75","number":"92438993"},"birthDate":"1984-08-14","taxDocument":{"type":"CPF","number":"86316584563"},"addresses":[],"shippingAddress":{"zipCode":"44.300-000","street":"Rua de teste do SHIPPING","streetNumber":"101","complement":"197","city":"Bahia","district":"Bairro de Capoeiru\u00e7u","state":"BA","country":"BRA"},"billingAddress":null,"fundingInstrument":null,"_links":{"self":{"href":"https:\/\/sandbox.moip.com.br\/v2\/customers\/CUS-87O6IRFADSZT"},"hostedAccount":{"redirectHref":"https:\/\/hostedaccount-sandbox.moip.com.br?token=152ba2da-5a28-4d85-9eb8-d4aeeca3a28e&id=CUS-87O6IRFADSZT&mpa=MPA-48991CFD3B9D"}}},"payments":[{"installmentCount":1,"fundingInstrument":{"boleto":{"expirationDate":"2018-09-04","lineCode":"00190.00009 01014.051005 00000.787176 7 72370000001000","logoUri":"https:\/\/cdn.moip.com.br\/wp-content\/uploads\/2016\/05\/02163352\/logo-moip.png","instructionLines":{"first":"INSTRU\u00c7\u00c3O 1","second":"INSTRU\u00c7\u00c3O 2","third":"INSTRU\u00c7\u00c3O 3"}},"method":"BOLETO"},"id":"PAY-0IXRLJELGFLH","status":"WAITING","delayCapture":false,"amount":{"total":200000050,"currency":"BRL"},"payments":null,"escrows":null,"fees":[{"type":"TRANSACTION","amount":0}],"refunds":null,"_links":{"self":{"href":"https:\/\/sandbox.moip.com.br\/v2\/payments\/PAY-0IXRLJELGFLH"},"order":{"href":"https:\/\/sandbox.moip.com.br\/v2\/orders\/ORD-UAN0O4CLPQKE","title":"ORD-UAN0O4CLPQKE"},"payBoleto":{"printHref":"https:\/\/sandbox.moip.com.br\/v2\/boleto\/BOL-9235UJAZAUOD\/print","redirectHref":"https:\/\/sandbox.moip.com.br\/v2\/boleto\/BOL-9235UJAZAUOD"}},"createdAt":{"date":"2018-08-30 21:45:53.000000","timezone_type":1,"timezone":"-03:00"},"updatedAt":{"date":"2018-08-30 21:45:53.000000","timezone_type":1,"timezone":"-03:00"}}],"refunds":[],"entries":[],"events":[{"type":"ORDER.WAITING","createdAt":"2018-08-30T21:45:53.000-03","description":""},{"type":"ORDER.CREATED","createdAt":"2018-08-30T21:45:48.000-03","description":""}],"createdAt":"2018-08-30T21:45:48.000-03","status":"WAITING","_links":{"self":{"href":"https:\/\/sandbox.moip.com.br\/v2\/orders\/ORD-UAN0O4CLPQKE"},"checkout":{"payCheckout":{"redirectHref":"https:\/\/checkout-new-sandbox.moip.com.br?token=3ce5fa4e-e76b-48ab-80e8-84489a3cfc93&id=ORD-UAN0O4CLPQKE"},"payCreditCard":{"redirectHref":"https:\/\/checkout-new-sandbox.moip.com.br?token=3ce5fa4e-e76b-48ab-80e8-84489a3cfc93&id=ORD-UAN0O4CLPQKE&payment-method=credit-card"},"payBoleto":{"redirectHref":"https:\/\/checkout-new-sandbox.moip.com.br?token=3ce5fa4e-e76b-48ab-80e8-84489a3cfc93&id=ORD-UAN0O4CLPQKE&payment-method=boleto"},"payOnlineBankDebitItau":{"redirectHref":"https:\/\/checkout-sandbox.moip.com.br\/debit\/itau\/ORD-UAN0O4CLPQKE"}}}}
		
		try {
		    $moip = Moip::start();
			//$payment = $moip->payments()->get($idMoip);
			$payment = $moip->orders()->get($idMoip);
			return $payment->getStatus();
			//$payment->getOrder()->getCustomer()->getfullname()
			//$payment->getOrder()->getId() //obter order id
			//Com Json
			//$payment = $moip->orders()->get($idMoip);
			//$data = json_encode($payment);
			//$data = json_decode($data);
			//$precio = $data->items[0]->price;
			//$total = $data->amount->total;
			//$total = $data->status;
			//return $data->status;
			
		} catch (Exception $e) {
		    printf($e->__toString());
		}
	}

	public static function getDadosBoleto($idMoip, $idOrder)
	{

		
		try {
		    $moip = Moip::start();

			$payment = $moip->payments()->get($idMoip);
			$orders = $moip->orders()->get($idOrder);
			$url = file_get_contents($payment->getHrefPrintBoleto());
			$codBoleto = $payment->getLineCodeBoleto();
			$idBoleto = $payment->getId();
			$urlBoleto = $payment->getHrefPrintBoleto();
			$hrefBoleto = explode('/', $payment->getHrefBoleto());
			$hrefBoleto = array_last($hrefBoleto);
			$print = str_replace(' <link rel="icon" type="image/png" href="https://s3.amazonaws.com/assets.moip.com.br/boleto/images/moip-icon.png" />', '<link href="{{ asset("site/css/style.css") }}" rel="stylesheet">', $url);
			//dd($orders->getCustomer()->getFullName());
			$data = [
				'idBoleto' => $idBoleto,
				'full_name' => $orders->getCustomer()->getFullName(),
				'total_amount' => MyFunctions::AddDecimalPointForMoney($payment->getAmount()->total),
				'codBoleto' => $codBoleto,
				'urlBoleto' => $urlBoleto,
				'hrefBoleto' => $hrefBoleto,
				'print' => $print
			];

			return $data;
			
		} catch (Exception $e) {
		    printf($e->__toString());
		}
	}

	public static function test(){

		$moip = Moip::start();

		/*Criar notificação*/
		/*$notification = $moip->notifications()
		->addEvent('PAYMENT.AUTHORIZED')
		->addEvent('PAYMENT.CANCELLED')
		->setTarget('http://msalvaai.proxy.beeceptor.com/')
		->create();*/

		/*Lista de notificações criadas */
		//$notification = $moip->notifications()->getList();
		
		/*Excluir notificação */
		//$notification = $moip->notifications()->delete("NPR-2K4MR6122GX4");
		
		/* Obter pagamento por id PAY-EVICHTET82MY */
		$payment = $moip->payments()->get("PAY-H2VLCCH77YUM");
		//$payment->getFundingInstrument()->method; //obter method BOLETO, CREDIT_CARD, LINE_BANK_DEBIT, WALLET
		//$json = file_get_contents('php://input');
		// Converte os dados recebidos
		//$response = json_decode($json, true);
		dd($payment->getFundingInstrument()->method);

	}

	public static function testt(){
		$moip = Moip::start();

		$bol = '{"date":"","env":"","event":"PAYMENT.AUTHORIZED","resource":{"payment":{"_links":{"order":{"href":"https://sandbox.moip.com.br/v2/orders/ORD-X6Z8LFNPM9T3","title":"ORD-X6Z8LFNPM9T3"},"self":{"href":"https://sandbox.moip.com.br/v2/payments/PAY-VXASZEFLNR0A"}},"amount":{"currency":"BRL","fees":349,"gross":10000,"liquid":9651,"refunds":0,"total":10000},"createdAt":"2018-08-03T13:39:06.000-03","delayCapture":false,"events":[{"createdAt":"2018-08-03T14:53:55.126-03","type":"PAYMENT.AUTHORIZED"},{"createdAt":"2018-08-03T13:39:06.000-03","type":"PAYMENT.CREATED"},{"createdAt":"2018-08-03T13:39:06.000-03","type":"PAYMENT.WAITING"}],"fees":[{"amount":349,"type":"TRANSACTION"}],"fundingInstrument":{"boleto":{"expirationDate":"2018-08-03","instructionLines":{"first":"INSTRUÇÃO 1","second":"INSTRUÇÃO 2","third":"INSTRUÇÃO 3"},"lineCode":"00190.00009 01014.051005 00000.787176 7 72370000001000","logoUri":"https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png"},"method":"BOLETO"},"id":"PAY-VXASZEFLNR0A","installmentCount":1,"receivers":[{"amount":{"currency":"BRL","fees":349,"refunds":0,"total":10000},"feePayor":true,"moipAccount":{"fullname":"VINICIUS LEDO BARRETO","id":"MPA-48991CFD3B9D","login":"msa@mesalvaai.com"},"type":"PRIMARY"}],"status":"AUTHORIZED","updatedAt":"2018-08-03T14:53:55.126-03"}}}';

		$de = json_decode($bol);

		// $json = file_get_contents('php://input');
		// $response = json_decode($json, true);
		
		//dd($de->resource->payment->status);
		//dd($de->resource->payment->id);
		//dd($de->event == "PAYMENT.AUTHORIZED");
		//dd($de);
	}

}
