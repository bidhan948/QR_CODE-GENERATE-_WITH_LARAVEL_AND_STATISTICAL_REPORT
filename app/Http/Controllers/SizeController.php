<?php

namespace App\Http\Controllers;

use App\Http\Requests\addSizeSubmit;
use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $result['data'] = Size::get();
        return view('Admin/Size', $result);
    }
    public function addSize()
    {
        return view('Admin/Add-Size');
    }
    public function addSizeSubmit(addSizeSubmit $r)
    {
        $Size = new Size;
        $Size->Size = $r->input('Size');
        $Size->save();
        $r->session()->flash('msg', $r->input('Size') . ' Size has Been Added');
        return redirect('Size');
    }
    public function editSize($id)
    {
        $result['data'] = Size::where('id', $id)->get();
        return view('Admin/Edit-Size', $result);
    }
    public function editSizeSubmit(Request $r, $id)
    {
        $r->validate(
            [
                'size' => 'required|unique:sizes,size,'.$id
            ],
            [
                'size.required' => "Please Enter Unique Size"
            ]
        );
        $Size = Size::findOrFail($id);
        $Size->size = $r->input('size');
        $Size->save();
        session()->flash('msg', 'Size has been Successfully edited');
        return redirect('Size');
    }
    public function deleteSize($id)
    {
        $Size = Size::findOrFail($id);
        $Size->delete();
        session()->flash('msg', 'Size Has been deleted Successfully');
        return redirect('Size');
    }
}
