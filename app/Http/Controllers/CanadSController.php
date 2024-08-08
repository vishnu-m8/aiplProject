<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CanadSController extends Controller
{
    public function canadaIndex() 
    {
        $canadaState = DB::table('canada_state')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.canada.canadaPage',compact('canadaState'));
    }
    public function canadaAdd() 
    {
        return view('admin.canada.Addcanada');
    }
    public function canadaStore(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
        ]);
        
    $data = DB::table('canada_state')->insert([   
        'title' => $request->title,
    ]);

    if ($data) {
        return redirect()->route('Canada_index')->with('status', 'Data inserted successfully');
      }
    }

    public function canadaEdit($id)
    { 
        $data = DB::table('canada_state')
        ->where('id', $id)
        ->first();
        return view('admin.canada.Editcanada',compact('data',));
    }  

    public function canadaUpdate(Request $request, $id)
    {
        $request->validate([     
            'title' => 'required',
        ]);


    $existingRecord = DB::table('canada_state')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('canada_state')->where('id', $id)->update([
            'title' => $request->title,
        ]);
        
            return redirect()->route('Canada_index')->with('status', 'Data updated successfully');
    }

   }

   public function canadaDestory($id)
   {
    $existingRecord = DB::table('canada_state')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('canada_state')
        ->where('id', $id)
        ->delete();

        return redirect()->route('Canada_index')->with('status', 'Data deleted successfully');
    }

    }
  public function canadaActionUpdate($userId)
   {
    $user = DB::table('canada_state')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('canada_state')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
