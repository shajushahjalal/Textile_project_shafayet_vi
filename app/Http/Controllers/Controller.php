<?php

namespace App\Http\Controllers;

use App\Http\Conponents\FileUpload;
use App\Http\Conponents\NumberFormat;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, NumberFormat, FileUpload;
}
