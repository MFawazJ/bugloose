<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Service\DateConvertController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogController extends Controller
{
    //

    public function countLog(Request $request)
    {
        try {

            $value = $request->query('serviceNames');
            $code = $request->query('statusCode');
            $startDate = $request->query('startDate');
            $endDate = $request->query('endDate');

            $logCount =  Log::query();

            if ($value !== null) {
                $logCount->where('name',$value);
            }

            if ($code !== null) {
                $logCount->where('code',$code);
            }

            if($startDate !== null || $endDate !==null ){

                if($startDate == null){
                    $startDate = '1970-01-01';
                }else{
                    $startDate =  DateConvertController::convertDate($startDate)  ;
                }

                if($endDate ==null){
                    $endDate = Carbon::now();
                }else{
                    $endDate = DateConvertController::convertDate($endDate);
                }

                $logCount->whereBetween('service_date', [$startDate, $endDate ]);
            }

            return response()->json([
                'count' => $logCount->count()

            ], 200

            );

        }catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()

            ], 500

            );
        }


    }
}
