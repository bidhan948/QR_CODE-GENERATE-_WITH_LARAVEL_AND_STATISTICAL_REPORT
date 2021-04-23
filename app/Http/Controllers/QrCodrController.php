<?php

namespace App\Http\Controllers;

use App\Http\Requests\addQrSubmit;
use App\Models\qr_codr;
use App\Models\size;
use App\Models\color;
use App\Models\users_tb;

class QrCodrController extends Controller
{
    public function addQr()
    {
        $qr = qr_codr::where('added_by', session('id'))->count();
        $userQr = users_tb::where('id', session('id'))->get();
        $result['data'] = size::get();
        $result['color'] = color::get();
        if ($qr == $userQr[0]->total_qr) {
            session()->flash('msg','QR limit has been exceed');
        }
        return view('User.Add_Qr', $result);

    }
    public function addQrSubmit(addQrSubmit $r)
    {
        $qrcode = new qr_codr();
        $qrcode->qr_name = $r->input('name');
        $qrcode->link = $r->input('link');
        $qrcode->color = ($r->input('color') == '') ? "00000" : $r->input('color');
        $qrcode->size = ($r->input('size') == '') ? "200x200" : $r->input('size');
        $qrcode->added_by = session('id');
        $qrcode->status = 1;
        $qrcode->save();
        $r->session()->flash('msg', 'QR code added successfully');
        return redirect('Profile');
    }
    public function editQr($id)
    {
        $result['data'] = qr_codr::where('id', $id)->get();
        $result['size'] = size::get();
        $result['color'] = color::get();
        return view('User.Edit-Qr', $result);
    }
    public function editQrSubmit(addQrSubmit $r, $id)
    {
        $qrcode = qr_codr::findOrFail($id);
        $qrcode->qr_name = $r->input('name');
        $qrcode->link = $r->input('link');
        $qrcode->color = ($r->input('color') == '') ? "00000" : $r->input('color');
        $qrcode->size = ($r->input('size') == '') ? "200x200" : $r->input('size');
        $qrcode->save();
        $r->session()->flash('msg', 'QR code edited successfully');
        return redirect('Profile');
    }
    public function switchStatus($status, $id)
    {
        $qrcode = qr_codr::findOrFail($id);
        if ($status == 0) {
            $qrcode->status = 0;
            session()->flash('msg', 'Qr code Deactivated Succesfully');
        } else {
            $qrcode->status = 1;
            session()->flash('msg', 'Qr code activated sucessfully');
        }
        $qrcode->save();
        return redirect('/Profile');
    }
}
