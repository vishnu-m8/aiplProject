<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class USAController extends Controller
{
    public function usaIndex() 
    {
        $usaState = DB::table('usa_state')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.usa.usaPage',compact('usaState'));
    }
    public function usaAdd() 
    {
        return view('admin.usa.Addusa');
    }
    public function usaStore(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
        ]);
        
    $data = DB::table('usa_state')->insert([   
        'title' => $request->title,
    ]);

    if ($data) {
        return redirect()->route('USA_index')->with('status', 'Data inserted successfully');
      }
    }

    public function usaEdit($id)
    { 
        $data = DB::table('usa_state')
        ->where('id', $id)
        ->first();
        return view('admin.usa.Editusa',compact('data',));
    }  

    public function usaUpdate(Request $request, $id)
    {
        $request->validate([     
            'title' => 'required',
        ]);


    $existingRecord = DB::table('usa_state')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('usa_state')->where('id', $id)->update([
            'title' => $request->title,
        ]);
        
            return redirect()->route('USA_index')->with('status', 'Data updated successfully');
    }

   }

   public function usaDestory($id)
   {
    $existingRecord = DB::table('usa_state')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('usa_state')
        ->where('id', $id)
        ->delete();

        return redirect()->route('USA_index')->with('status', 'Data deleted successfully');
    }

    }
  public function usaActionUpdate($userId)
   {
    $user = DB::table('usa_state')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('usa_state')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
