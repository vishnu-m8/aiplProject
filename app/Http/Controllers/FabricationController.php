<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FabricationController extends Controller
{
    public function fabrication_show() 
    {
        $fabricationIndex = DB::table('fabrication')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.fabrication.main_fabrication',compact('fabricationIndex'));
    }
    public function fabrication_edit($id)
    { 
        $data = DB::table('fabrication')
                ->where('id', $id)
                ->first();
        return view('admin.fabrication.Editfabrication',compact('data'));
    }  

    public function fabrication_update(Request $request, $id)
    {

    $request->validate([ 
        'description' => 'required',
    ]);


    $existingRecord = DB::table('fabrication')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        $data = DB::table('fabrication')->where('id', $id)->update([
            'description' => $request->description,
        ]);

            return redirect()->route('fabrication_show')->with('status', 'Data updated successfully');
         }
    }
}
