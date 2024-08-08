<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AlumayeController extends Controller
{
    public function alumayeShow() 
    {
        $home_alumaye = DB::table('home_alumaye')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.alumaye.main_alumaye',compact('home_alumaye'));
    }
   
    public function alumayeEdit($id)
    { 
        $data = DB::table('home_alumaye')
        ->where('id', $id)
        ->first();
        return view('admin.alumaye.Editalumaye',compact('data'));
    }  

    public function alumayeUpdate(Request $request, $id)
    {

    $request->validate([ 
        'title' => 'required', 
        'description' => 'required',
    ]);


    $existingRecord = DB::table('home_alumaye')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('home_alumaye')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);

            return redirect()->route('alumaye_index')->with('status', 'Data updated successfully');
         }
    }
   
 
    
}
