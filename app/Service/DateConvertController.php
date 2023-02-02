<?php

namespace App\Service;

class DateConvertController
{
    static function convertDate($date){

        if($date == null){
            return null;
        }

       $str = substr($date, 1, strlen($date) - 2);

        $newDate = explode('/',$str);
        $time = explode(':',$newDate[2]);
        return date('Y-m-d H:i:s',strtotime($newDate[0].'-'.$newDate[1].'-'.$time[0].' '.$time[1].':'.$time[2].':'.$time[3]));

    }
}
