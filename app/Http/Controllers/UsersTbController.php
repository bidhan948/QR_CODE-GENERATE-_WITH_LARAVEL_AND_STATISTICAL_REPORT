<?php

namespace App\Http\Controllers;

use App\Http\Requests\addUserSubmit;
use App\Http\Requests\loginSubmit;
use App\Models\users_tb;
use App\Models\qr_codr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersTbController extends Controller
{
    public function index()
    {
        $result['data'] = users_tb::where('role', 0)->get();
        return view('welcome', $result);
    }
    public function userIndex()
    {
        $id  = session('id');
        $result['data'] = qr_codr::where('added_by',$id)->get();
        return view('/profile',$result);
    }
    public function loginSubmit(loginSubmit $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');
        $user = users_tb::where('email', $email)->get();

        if (Hash::check($password, $user[0]->password)) {
            $r->session()->put('id', $user[0]->id);
            $r->session()->put('name', $user[0]->name);
            $r->session()->put('email', $user[0]->email);
            $r->session()->put('password', $user[0]->password);
            $r->session()->put('role', $user[0]->role);
            if ($user[0]->role == 1) {
                return redirect('/');
            } else {
                return redirect('/Profile');
            }
        } else {
            $r->session()->flash('msg', 'Please Enter Correct Login Details');
            return view('login');
        }
    }

    public function addUser()
    {
        return view('Admin/Add-User');
    }
    public function addUserSubmit(addUserSubmit $r)
    {
        $user = new users_tb;
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        $user->password = Hash::make($r->input('password'));
        $user->total_qr = $r->input('total_qr');
        $user->status = 1;
        $user->role = 0;
        $user->save();
        $r->session()->flash('msg', 'User Added Successfully');
        return redirect('/');
    }
    public function addUserSubmitEmailVerify(Request $r)
    {
        if ($r->input('_token') != "") {
            return users_tb::Where('email', $r->input('email'))->count();
        }
    }
    public function editUser($id)
    {
        $result['data'] = users_tb::where('id', $id)->get();
        return view('Admin.Edit-User', $result);
    }
    public function editUserSubmit(Request $r, $id)
    {
        $r->validate(
            [
                'name' => 'required',
                'Email' => 'required|unique:users_tbs,email,'.$id,
                'total_qr' => 'required',
            ],
            [
                'name.required' => 'Please Enter name',
                'Email.required' => 'Please Enter email',
                'total_qr.required' => 'Please assign the number of Qr code',
            ]
        );
        $user = users_tb::findOrFail($id);
        $user->name = $r->input('name');
        $user->email = $r->input('Email');
        $user->total_qr = $r->input('total_qr');
        $user->save();
        $r->session()->flash('msg','Edited Successfully');
        return redirect('/');
    }
    public function switchStatus(Request $r,$status, $id)
    {
        $user = users_tb::findOrFail($id);
        if($status == 0){
            $user->status = 0;
            $r->session()->flash('msg','Account Deactivated Succesfully');
        }else{
            $user->status = 1;
            $r->session()->flash('msg','Account activated sucessfully');
        }
        $user->save();
        return redirect('/');
    }
}
