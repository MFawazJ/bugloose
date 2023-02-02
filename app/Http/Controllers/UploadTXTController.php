<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Service\DateConvertController;

class UploadTXTController extends Controller
{
    static function uploadFile($filePath)
    {
        $lex_dict = [];
        $fp = fopen($filePath, "r");

        if ($fp) {
            while (($line = fgets($fp)) !== false) {
                $line_data =  ( explode(" ", trim($line)));
                static::uploadData($line_data);
            }
            fclose($fp);

            return 'File Records  has been Updated';

        }else{

            return 'File is Missing';
        }
    }

    static function uploadData($line){

        try {
            $log  =  Log::create(
                [
                    'name' => $line[0],
                    'service_date'=> DateConvertController::convertDate($line[2]),
                    'code'=> $line[6],
                    'record'=> $line[3].$line[4].$line[5],

                ]
            );
        }catch (\Exception $e) {

           return false;
        }

    }


}
