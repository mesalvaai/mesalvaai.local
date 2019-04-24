<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //header('Content-Type: application/json; charset=utf-8');
        //$json = file_get_contents('php://input', true);
        //$resultado = json_decode($json);
        //$write = json_encode($json);
        
        //$payment    = $request->all();
        // $order = '{  
        //    "date":"",
        //    "env":"",
        //    "event":"ORDER.WAITING",
        //    "resource":{  
        //       "order":{  
        //          "_links":{  
        //             "checkout":{  
        //                "payBoleto":{  
        //                   "redirectHref":"https://checkout-new-sandbox.moip.com.br?token=696ea789-b3fd-47bb-80ee-fe340159c895\u0026id=ORD-UIV5OBV81HWR\u0026payment-method=boleto"
        //                },
        //                "payCheckout":{  
        //                   "redirectHref":"https://checkout-new-sandbox.moip.com.br?token=696ea789-b3fd-47bb-80ee-fe340159c895\u0026id=ORD-UIV5OBV81HWR"
        //                },
        //                "payCreditCard":{  
        //                   "redirectHref":"https://checkout-new-sandbox.moip.com.br?token=696ea789-b3fd-47bb-80ee-fe340159c895\u0026id=ORD-UIV5OBV81HWR\u0026payment-method=credit-card"
        //                },
        //                "payOnlineBankDebitItau":{  
        //                   "redirectHref":"https://checkout-sandbox.moip.com.br/debit/itau/ORD-UIV5OBV81HWR"
        //                }
        //             },
        //             "self":{  
        //                "href":"https://sandbox.moip.com.br/v2/orders/ORD-UIV5OBV81HWR"
        //             }
        //          },
        //          "amount":{  
        //             "currency":"BRL",
        //             "fees":0,
        //             "liquid":0,
        //             "otherReceivers":0,
        //             "paid":0,
        //             "refunds":0,
        //             "subtotals":{  
        //                "addition":0,
        //                "discount":0,
        //                "items":2000,
        //                "shipping":0
        //             },
        //             "total":2000
        //          },
        //          "createdAt":"2018-06-05T16:14:46.000-03",
        //          "customer":{  
        //             "_links":{  
        //                "hostedAccount":{  
        //                   "redirectHref":"https://hostedaccount-sandbox.moip.com.br?token=7c53b72f-6f5e-412d-9225-2cc33ad1fb40\u0026id=CUS-AJ3H9Q0MU70X\u0026mpa=MPA-CULBBYHD11"
        //                },
        //                "self":{  
        //                   "href":"https://sandbox.moip.com.br/v2/customers/CUS-AJ3H9Q0MU70X"
        //                }
        //             },
        //             "birthDate":"1988-12-30",
        //             "createdAt":"2018-06-05T16:14:46.000-03",
        //             "email":"1528226086@email.com",
        //             "fullname":"reject",
        //             "id":"CUS-AJ3H9Q0MU70X",
        //             "moipAccount":{  
        //                "id":"MPA-PQ0H8UZYNNWY"
        //             },
        //             "ownId":"1528226086",
        //             "phone":{  
        //                "areaCode":"11",
        //                "countryCode":"55",
        //                "number":"66778899"
        //             },
        //             "shippingAddress":{  
        //                "city":"Sao Paulo",
        //                "complement":"8",
        //                "country":"BRA",
        //                "district":"Itaim",
        //                "state":"SP",
        //                "street":"Avenida Faria Lima",
        //                "streetNumber":"2927",
        //                "zipCode":"01234000"
        //             },
        //             "taxDocument":{  
        //                "number":"22222222222",
        //                "type":"CPF"
        //             },
        //             "updatedAt":"2018-06-05T16:14:46.000-03"
        //          },
        //          "entries":[  

        //          ],
        //          "escrows":[  

        //          ],
        //          "events":[  
        //             {  
        //                "createdAt":"2018-06-05T16:14:46.000-03",
        //                "description":"",
        //                "type":"ORDER.CREATED"
        //             }
        //          ],
        //          "id":"ORD-UIV5OBV81HWR",
        //          "items":[  
        //             {  
        //                "detail":"uma linda bicicleta",
        //                "price":2000,
        //                "product":"Bicicleta Specialized Tarmac 26 Shimano Alivio",
        //                "quantity":1
        //             }
        //          ],
        //          "ownId":"1528226086",
        //          "payments":[  
        //             {  
        //                "_links":{  
        //                   "order":{  
        //                      "href":"https://sandbox.moip.com.br/v2/orders/ORD-UIV5OBV81HWR",
        //                      "title":"ORD-UIV5OBV81HWR"
        //                   },
        //                   "self":{  
        //                      "href":"https://sandbox.moip.com.br/v2/payments/PAY-ICZGLZS503NV"
        //                   }
        //                },
        //                "acquirerDetails":{  
        //                   "taxDocument":{  
        //                      "number":"01027058000191",
        //                      "type":"CNPJ"
        //                   }
        //                },
        //                "amount":{  
        //                   "currency":"BRL",
        //                   "fees":0,
        //                   "gross":2000,
        //                   "liquid":2000,
        //                   "refunds":0,
        //                   "total":2000
        //                },
        //                "createdAt":"2018-06-05T16:15:08.502-03",
        //                "delayCapture":false,
        //                "events":[  
        //                   {  
        //                      "createdAt":"2018-06-05T16:15:08.504-03",
        //                      "type":"PAYMENT.CREATED"
        //                   }
        //                ],
        //                "fees":[  
        //                   {  
        //                      "amount":0,
        //                      "type":"TRANSACTION"
        //                   }
        //                ],
        //                "fundingInstrument":{  
        //                   "creditCard":{  
        //                      "brand":"MASTERCARD",
        //                      "first6":"555566",
        //                      "holder":{  
        //                         "birthDate":"1988-12-30",
        //                         "birthdate":"1988-12-30",
        //                         "fullname":"CANCELLED",
        //                         "taxDocument":{  
        //                            "number":"33333333333",
        //                            "type":"CPF"
        //                         }
        //                      },
        //                      "id":"CRC-442ZP3ZQBB5H",
        //                      "last4":"8884",
        //                      "store":true
        //                   },
        //                   "method":"CREDIT_CARD"
        //                },
        //                "id":"PAY-ICZGLZS503NV",
        //                "installmentCount":1,
        //                "receivers":[  
        //                   {  
        //                      "amount":{  
        //                         "currency":"BRL",
        //                         "fees":0,
        //                         "refunds":0,
        //                         "total":1000
        //                      },
        //                      "feePayor":true,
        //                      "moipAccount":{  
        //                         "fullname":"Moip SandBox",
        //                         "id":"MPA-CULBBYHD11",
        //                         "login":"integracao@labs.moip.com.br"
        //                      },
        //                      "type":"PRIMARY"
        //                   },
        //                   {  
        //                      "amount":{  
        //                         "currency":"BRL",
        //                         "fees":0,
        //                         "refunds":0,
        //                         "total":1000
        //                      },
        //                      "feePayor":false,
        //                      "moipAccount":{  
        //                         "fullname":"Sales Machine da Silva",
        //                         "id":"MPA-9D1519587231",
        //                         "login":"1522958134@myemail.com"
        //                      },
        //                      "type":"SECONDARY"
        //                   }
        //                ],
        //                "statementDescriptor":"MyStore",
        //                "status":"WAITING",
        //                "updatedAt":"2018-06-05T16:15:08.502-03"
        //             }
        //          ],
        //          "platform":"V2",
        //          "receivers":[  
        //             {  
        //                "amount":{  
        //                   "currency":"BRL",
        //                   "fees":0,
        //                   "refunds":0,
        //                   "total":1000
        //                },
        //                "feePayor":true,
        //                "moipAccount":{  
        //                   "fullname":"Moip SandBox",
        //                   "id":"MPA-CULBBYHD11",
        //                   "login":"integracao@labs.moip.com.br"
        //                },
        //                "type":"PRIMARY"
        //             },
        //             {  
        //                "amount":{  
        //                   "currency":"BRL",
        //                   "fees":0,
        //                   "refunds":0,
        //                   "total":1000
        //                },
        //                "feePayor":false,
        //                "moipAccount":{  
        //                   "fullname":"Sales Machine da Silva",
        //                   "id":"MPA-9D1519587231",
        //                   "login":"1522958134@myemail.com"
        //                },
        //                "type":"SECONDARY"
        //             }
        //          ],
        //          "refunds":[  

        //          ],
        //          "shippingAddress":{  
        //             "city":"Sao Paulo",
        //             "complement":"8",
        //             "country":"BRA",
        //             "district":"Itaim",
        //             "state":"SP",
        //             "street":"Avenida Faria Lima",
        //             "streetNumber":"2927",
        //             "zipCode":"01234000"
        //          },
        //          "status":"WAITING",
        //          "updatedAt":"2018-06-05T16:15:08.504-03"
        //       }
        //    }
        // }';
        
        $payment = '{  
           "date":"",
           "env":"",
           "event":"PAYMENT.WAITING",
           "resource":{  
              "payment":{  
                 "_links":{  
                    "order":{  
                       "href":"https://sandbox.moip.com.br/v2/orders/ORD-UIV5OBV81HWR",
                       "title":"ORD-UIV5OBV81HWR"
                    },
                    "self":{  
                       "href":"https://sandbox.moip.com.br/v2/payments/PAY-ICZGLZS503NV"
                    }
                 },
                 "acquirerDetails":{  
                    "taxDocument":{  
                       "number":"01027058000191",
                       "type":"CNPJ"
                    }
                 },
                 "amount":{  
                    "currency":"BRL",
                    "fees":0,
                    "gross":2000,
                    "liquid":2000,
                    "refunds":0,
                    "total":2000
                 },
                 "createdAt":"2018-06-05T16:15:08.502-03",
                 "delayCapture":false,
                 "events":[  
                    {  
                       "createdAt":"2018-06-05T16:15:08.504-03",
                       "type":"PAYMENT.CREATED"
                    }
                 ],
                 "fees":[  
                    {  
                       "amount":0,
                       "type":"TRANSACTION"
                    }
                 ],
                 "fundingInstrument":{  
                    "creditCard":{  
                       "brand":"MASTERCARD",
                       "first6":"555566",
                       "holder":{  
                          "birthDate":"1988-12-30",
                          "birthdate":"1988-12-30",
                          "fullname":"CANCELLED",
                          "taxDocument":{  
                             "number":"33333333333",
                             "type":"CPF"
                          }
                       },
                       "id":"CRC-442ZP3ZQBB5H",
                       "last4":"8884",
                       "store":true
                    },
                    "method":"CREDIT_CARD"
                 },
                 "id":"PAY-ICZGLZS503NV",
                 "installmentCount":1,
                 "receivers":[  
                    {  
                       "amount":{  
                          "currency":"BRL",
                          "fees":0,
                          "refunds":0,
                          "total":1000
                       },
                       "feePayor":true,
                       "moipAccount":{  
                          "fullname":"Moip SandBox",
                          "id":"MPA-CULBBYHD11",
                          "login":"integracao@labs.moip.com.br"
                       },
                       "type":"PRIMARY"
                    },
                    {  
                       "amount":{  
                          "currency":"BRL",
                          "fees":0,
                          "refunds":0,
                          "total":1000
                       },
                       "feePayor":false,
                       "moipAccount":{  
                          "fullname":"Sales Machine da Silva",
                          "id":"MPA-9D1519587231",
                          "login":"1522958134@myemail.com"
                       },
                       "type":"SECONDARY"
                    }
                 ],
                 "statementDescriptor":"MyStore",
                 "status":"WAITING",
                 "updatedAt":"2018-06-05T16:15:08.502-03"
              }
           }
        }';
        $payment = json_decode($payment);
        $id = $payment->resource->payment->id;
        $event = $payment->event;
        $status = $payment->resource->payment->status;
        $amount = $payment->resource->payment->amount->total;
        $fees = $payment->resource->payment->fees[0]->type;
        $other = $payment->resource->payment;
        dd($other);
        $fp = file_put_contents( 'request.txt', $resultado );
        $name = 'request.txt';
        $text = $status;
        $file = fopen($name, 'a');
        fwrite($file, $text);
        fclose($file);
        //$result['resource']['payment']['status']
        
        $meetting = [
            'id' => $id,
            'event' => $event,
            'status' => $status,
            'amount' => $amount,
            'fees' => $fees
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        $json = file_get_contents('php://input', true);
        $resultado = json_decode($json);
        //$write = json_encode($json);
        
        $payment    = $request->all();

        $id = $payment['resource']['payment']['id'];
        $event = $payment['event'];
        $status = $payment['resource']['payment']['status'];
        $amount = $payment['resource']['payment']['amount']['total'];
        $fees = $payment['resource']['payment']['fees'][0]['amount'];

        $fp = file_put_contents( 'request.txt', $resultado );
        $name = 'request.txt';
        $text = $status;
        $file = fopen($name, 'a');
        fwrite($file, $text);
        fclose($file);
        //$result['resource']['payment']['status']
        
        $meetting = [
            'id' => $id,
            'event' => $event,
            'status' => $status,
            'amount' => $amount,
            'fees' => $fees
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = file_get_contents('php://input');
        $resultado = json_decode($json, true);

        $title = $request->input('title');
        $description = $request->input('description');

        $meetting = [
            'title' => $title,
            'description' => $description
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
