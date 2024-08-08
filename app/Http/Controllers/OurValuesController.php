<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OurValuesController extends Controller
{
    public function OurValues() 
    {
        $our_values = DB::table('our_values')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.OurValues.our_values',compact('our_values'));
    }
    public function OurValuesEdit($id)
    { 
        $data = DB::table('our_values')
        ->where('id', $id)
        ->first();
        return view('admin.OurValues.edit_our_values',compact('data',));
    }  
    public function OurValuesUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

    $existingRecord = DB::table('our_values')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('our_values')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        
            return redirect()->route('OurValues_index')->with('status', 'Data updated successfully');
        }

   }
}
