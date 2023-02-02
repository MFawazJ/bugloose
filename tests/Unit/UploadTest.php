<?php

namespace Tests\Unit;

use App\Http\Controllers\UploadTXTController;
use Tests\TestCase;

class UploadTest extends TestCase
{


    public function upload_files(){

        $file = UploadTXTController::uploadFile('file:///Users/fawazjainudeen/Downloads/logs.txt');

    }
}
