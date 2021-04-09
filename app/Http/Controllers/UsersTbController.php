<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginSubmit;
use App\Models\users_tb;
use Illuminate\Support\Facades\Hash;

class UsersTbController extends Controller
{
    public function loginSubmit(loginSubmit $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');
        $user = users_tb::where('email', $email)->get();
            
        if(Hash::check($password,$user[0]->password)){
            $r->session()->put('id',$user[0]->id);
            $r->session()->put('name',$user[0]->name);
            $r->session()->put('email',$user[0]->email);
            $r->session()->put('password',$user[0]->password);
            $r->session()->put('role',$user[0]->role);        
            if($user[0]->role == 1 ){
                return redirect('/');
            }else{
                return redirect('/Profile');
            }
        }else{
            $r->session()->flash('msg','Please Enter Correct Login Details');
            return view('login');
        }
    }

    public function addUser()
    {
        return view('Admin/Add-User');
    }
}
