<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class IndiaSController extends Controller
{
    public function indiaIndex() 
    {
        $india_state = DB::table('india_state')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.india.indiaPage',compact('india_state'));
    }
    public function indiaAdd() 
    {
        return view('admin.india.Addindia');
    }
    public function indiaStore(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
        ]);
        
    $data = DB::table('india_state')->insert([   
        'title' => $request->title,
    ]);

    if ($data) {
        return redirect()->route('India_index')->with('status', 'Data inserted successfully');
      }
    }

    public function indiaEdit($id)
    { 
        $data = DB::table('india_state')
        ->where('id', $id)
        ->first();
        return view('admin.india.Editindia',compact('data',));
    }  

    public function indiaUpdate(Request $request, $id)
    {
        $request->validate([     
            'title' => 'required',
        ]);


    $existingRecord = DB::table('india_state')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('india_state')->where('id', $id)->update([
            'title' => $request->title,
        ]);
        
            return redirect()->route('India_index')->with('status', 'Data updated successfully');
    }

   }

   public function indiaDestory($id)
   {
    $existingRecord = DB::table('india_state')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('india_state')
        ->where('id', $id)
        ->delete();

        return redirect()->route('India_index')->with('status', 'Data deleted successfully');
    }

    }
  public function indiaActionUpdate($userId)
   {
    $user = DB::table('india_state')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('india_state')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
