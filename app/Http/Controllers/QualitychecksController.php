<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QualitychecksController extends Controller
{
    public function qualitychecksIndex() 
    {
        $qualityCheck = DB::table('quality_checks')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.Qualitycheck.qualitycheckPage',compact('qualityCheck'));
    }
    public function qualitychecksEdit($id)
    { 
        $data = DB::table('quality_checks')
                ->where('id', $id)
                ->first();
        return view('admin.Qualitycheck.EditqualitycheckPage',compact('data',));
    }  
    public function qualitychecksUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

    $existingRecord = DB::table('quality_checks')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        $data = DB::table('quality_checks')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
            return redirect()->route('Qualitychecks_index')->with('status', 'Data updated successfully');
        }
   }
}
