<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function designIndex() 
    {
        $designData = DB::table('design_systems')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.design.DesignPage',compact('designData'));
    }
    public function designEdit($id)
    { 
        $data = DB::table('design_systems')
        ->where('id', $id)
        ->first();
        return view('admin.design.Editdesign',compact('data',));
    }  
    public function designUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

    $existingRecord = DB::table('design_systems')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('design_systems')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        
            return redirect()->route('Design_index')->with('status', 'Data updated successfully');
        }

   }
}
