<?php

namespace App\Http\Controllers;

use App\Http\Requests\addColorSubmit;
use App\Models\color;

class ColorController extends Controller
{
    public function index()
    {
        $result['data'] = color::get();
        return view('Admin/Color',$result);
    }
    public function addColor()
    {
        return view('Admin/Add-Color');
    }
    public function addColorSubmit(addColorSubmit $r)
    {
        $color = new color;
        $color->color = $r->input('color');
        $color->save();
        $r->session()->flash('msg',$r->input('color').' color has Been Added');
        return redirect('Color');
    }
    public function editColor($id)
    {
        $result['data'] = color::where('id',$id)->get();
        return view('Admin/Edit-Color',$result);
    }
    public function editColorSubmit(addColorSubmit $r,$id)
    {
        $color = color::findOrFail($id);
        $color->color = $r->input('color');
        $color->save();
        session()->flash('msg','Color has been Successfully edited');
        return redirect('Color');
    }
    public function deleteColor($id)
    {
        $color = color::findOrFail($id);
        $color->delete();
        session()->flash('msg','Color Has been deleted Successfully');
        return redirect('Color');
    }
}
