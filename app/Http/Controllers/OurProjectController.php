<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OurProjectController extends Controller
{
    public function OurProject() 
    {
        $our_project = DB::table('our_project')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.OurProject.our_project',compact('our_project'));
    }
    public function OurProjectEdit($id)
    { 
        $data = DB::table('our_project')
        ->where('id', $id)
        ->first();
        return view('admin.OurProject.edit_our_project',compact('data',));
    }  
    public function OurProjectUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

    $existingRecord = DB::table('our_project')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('our_project')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        
            return redirect()->route('OurProject_index')->with('status', 'Data updated successfully');
        }

   }

}
