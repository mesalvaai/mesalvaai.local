<?php
namespace App\Helpers;
  
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
  
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

    public static function diasRestantes($start_date, $end_date)
    {
        $start_date = Carbon::now('America/Sao_Paulo');
        // $to = Carbon::createFromFormat('Y-m-d H:s:i', $start_date);
        // $from = Carbon::createFromFormat('Y-m-d H:s:i', $end_date);
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $start_date);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', $end_date);
        $diff_in_days = $to->diffInDays($from);
        return $diff_in_days;
        //print_r($diff_in_days); // Output: 1
    }
}