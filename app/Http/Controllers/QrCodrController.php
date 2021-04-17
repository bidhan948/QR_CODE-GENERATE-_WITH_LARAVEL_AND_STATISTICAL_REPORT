<?php

namespace App\Http\Controllers;

use App\Http\Requests\addQrSubmit;
use Illuminate\Http\Request;
use App\Models\qr_codr;
use App\Models\size;
use App\Models\color;

class QrCodrController extends Controller
{
    public function addQr()
    {
        $result['data'] = size::get();
        $result['color'] = color::get();
        return view('User.Add_Qr', $result);
    }
    public function addQrSubmit(addQrSubmit $r)
    {
        $qrcode = new qr_codr();
        $qrcode->qr_name = $r->input('name');
        $qrcode->link = $r->input('link');
        $qrcode->color = ($r->input('color') == '') ? "00000" : $r->input('color');
        $qrcode->size = ($r->input('size') == '') ? "200x200" : $r->input('color');
        $qrcode->added_by = session('id');
        $qrcode->added_by = session('id');
        $qrcode->status = 1;
        $qrcode->save();
        $r->session()->flash('msg', 'QR code added successfully');
        return redirect('Profile');
    }
}
