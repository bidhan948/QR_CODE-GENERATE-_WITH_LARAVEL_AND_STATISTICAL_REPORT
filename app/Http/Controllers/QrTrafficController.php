<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_traffic;
use App\Models\qr_codr;
class QrTrafficController extends Controller
{
    public function index($id)
    {
        $qr = qr_codr::findOrFail($id);
        
    }    
}
