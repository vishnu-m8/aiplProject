<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChinaSController extends Controller
{
    public function chinaIndex() 
    {
        $chinaState = DB::table('china_state')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.china.chinaPage',compact('chinaState'));
    }
    public function chinaAdd() 
    {
        return view('admin.china.Addchina');
    }
    public function chinaStore(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
        ]);
        
    $data = DB::table('china_state')->insert([   
        'title' => $request->title,
    ]);

    if ($data) {
        return redirect()->route('China_index')->with('status', 'Data inserted successfully');
      }
    }

    public function chinaEdit($id)
    { 
        $data = DB::table('china_state')
        ->where('id', $id)
        ->first();
        return view('admin.china.Editchina',compact('data',));
    }  

    public function chinaUpdate(Request $request, $id)
    {
        $request->validate([     
            'title' => 'required',
        ]);


    $existingRecord = DB::table('china_state')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('china_state')->where('id', $id)->update([
            'title' => $request->title,
        ]);
        
            return redirect()->route('China_index')->with('status', 'Data updated successfully');
    }

   }

   public function chinaDestory($id)
   {
    $existingRecord = DB::table('china_state')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('china_state')
        ->where('id', $id)
        ->delete();

        return redirect()->route('China_index')->with('status', 'Data deleted successfully');
    }

    }
  public function chinaActionUpdate($userId)
   {
    $user = DB::table('china_state')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('china_state')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
