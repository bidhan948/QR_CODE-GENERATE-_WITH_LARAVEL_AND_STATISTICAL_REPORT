<?php

namespace App\Http\Controllers;

use App\Models\qr_traffic;
use App\Models\qr_codr;
use App\Models\users_tb;
use App\Helpers\UserSystemInfoHelper;

class QrTrafficController extends Controller
{
    public function index($id)
    {
        $qr = qr_codr::findOrFail($id)->where(
            [
                'status' => 1,
                'id' => $id
            ]
        )->get();
        $user = users_tb::findOrFail($qr[0]->added_by)->where(
            [
                'status' => 1,
                'id' => $qr[0]->added_by
            ]
        )->get();

        // $getip = UserSystemInfoHelper::get_ip(); ->this scripts doesnt work on localhost so using third party api

        $getos = UserSystemInfoHelper::get_os();
        $getdevice = UserSystemInfoHelper::get_device();
        $getbrowser = UserSystemInfoHelper::get_browsers();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/json?token=6e218414183d6a');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        curl_close($ch);

        if ($data['ip'] != '') {
            $qr_traffic = new qr_traffic;
            $qr_traffic->qr_code_id = $id;
            $qr_traffic->device = $getdevice;
            $qr_traffic->browser = $getbrowser;
            $qr_traffic->os = $getos;
            $qr_traffic->country = $data['country'];
            $qr_traffic->ip_address = $data['ip'];
            $qr_traffic->state = $data['region'];
            $qr_traffic->city = $data['city'];
            $qr_traffic->save();
            
            $userEdit = users_tb::findOrFail($qr[0]->added_by);
            $userEdit->total_hit = $user[0]->total_hit + 1; 
            $userEdit->save();
            return redirect($qr[0]->link);        
        }
    }
    public function report($id)
    {
        $result['data'] = qr_traffic::where('qr_code_id',$id)->get();
        
        $result['Devicecount'] = $result['data']->groupBy('device')->map(function ($row){
            return $row->count();
        });
        
        $result['BrowserCount'] = $result['data']->groupBy('browser')->map(function($row){
            return $row->count();
        });

        $result['OsCount'] = $result['data']->groupBy('os')->map(function($row){
            return $row->count();
        });

        return view('QR-report',$result);
    }
}
