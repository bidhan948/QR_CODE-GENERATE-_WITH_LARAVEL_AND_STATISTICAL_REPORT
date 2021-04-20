<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_traffic;
use App\Models\qr_codr;
use App\Helpers\UserSystemInfoHelper;

class QrTrafficController extends Controller
{
    public function index($id)
    {
        $qr = qr_codr::findOrFail($id)->where('status',1);

        // $getip = UserSystemInfoHelper::get_ip(); ->this scripts doesnt work on localhost so using third party api
       
        $getos = UserSystemInfoHelper::get_os();
        $getdevice = UserSystemInfoHelper::get_device(); 
        $getbrowser = UserSystemInfoHelper::get_browsers();
        
    }    
}
