<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
use DateTime;

class FormatTime {

    public static function LongTimeFilter($date) {
        if ($date == null) {
            return "Sem Data";
        }

        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));

        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' segundos';
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' segundo';
                                } else {
                                    $result = $since_start->s . ' segundos';
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' minuto';
                            } else {
                                $result = $since_start->i . ' minutos';
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' hora';
                        } else {
                            $result = $since_start->h . ' horas';
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' día';
                    } else {
                        $result = $since_start->d . ' días';
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' mês';
                } else {
                    $result = $since_start->m . ' meses';
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' ano';
            } else {
                $result = $since_start->y . ' anos';
            }
        }

        return "faz " . $result;
    }

    public static function diasRestantes($end_date)
    {   
        $data1 = Carbon::now()->toDateString() .'00:00:00'; //data inicia
        $data2 = Carbon::createFromFormat('Y-m-d H:s:i', $end_date);; //data final
        // converte as datas para o formato timestamp
        $d1 = strtotime($data1); 
        $d2 = strtotime($data2);
        // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
        $dataFinal = ($d2 - $d1) /86400;
        if($dataFinal < 0)
            $dataFinal = $dataFinal * 0;
        return $dataFinal . ' Dias restantes';
    }

    public static function FullDatesDiff($start_date, $end_date)
    {
        $start_date = "2019-04-22 00:00:00"; 
        $end_date = "2019-04-22 00:00:00"; 
        $diff = abs(strtotime($end_date) - strtotime($start_date)); 
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
        printf("%d years, %d months, %d days, %d hours, %d minuts\n, %d seconds\n", $years, $months, $days, $hours, $minuts, $seconds);
    }
    
    public static function formatData($data){
        $data = explode('/', $data);
        $data = $data[2].'-'.$data[1].'-'.$data[0];
        return $data;
    }

    public static function FormatDataDB($dateFormatBR)
    {
         $data = Carbon::createFromFormat('d/m/Y', $dateFormatBR)->toDateString();
         return $data;
     }    

     public static function FormatDataBR($dateFormatDB){
        $datas[] = explode('-',  substr($dateFormatDB, 0, 10));
        $data = $datas[0][2].$datas[0][1].$datas[0][0];
        return $data;
    }

    public static function ExpirationDate($expiration_date)
    {
        // Se você não tiver o timestamp da data que cairía o vencimento, faça assim:
        $dia = 12;
        $mes = 01;
        $ano = 2009;
        $timestamp = mktime(0,0,0, $mes, $dia, $ano);

        $dia_semana = date('N', $timestamp);

        // Se for sábado ou domingo
        if ($dia_semana >= 6) {
           // Adicinoa a diferença de dias até a próxima segunda-feira
           $timestamp += ((8 - $dia_semana)  * 3600 * 24);
        }

        // Monta a data final
        $data_final = date('d/m/Y', $timestamp); 

        // Exibe-a
        echo "A data final é " . $data_final;
    }

    
    public static function getDataVencimento($dataNow)
    {
        return $carbon = new Carbon(date('Y-m-d', strtotime('+5 days')));
    }

}