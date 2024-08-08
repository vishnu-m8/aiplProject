<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ItalySController extends Controller
{
    public function italyIndex() 
    {
        $italy_state = DB::table('italy_state')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.italy.italyPage',compact('italy_state'));
    }
    public function italyAdd() 
    {
        return view('admin.italy.Additaly');
    }
    public function italyStore(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
        ]);
        
    $data = DB::table('italy_state')->insert([   
        'title' => $request->title,
    ]);

    if ($data) {
        return redirect()->route('Italy_index')->with('status', 'Data inserted successfully');
      }
    }

    public function italyEdit($id)
    { 
        $data = DB::table('italy_state')
        ->where('id', $id)
        ->first();
        return view('admin.italy.Edititaly',compact('data',));
    }  

    public function italyUpdate(Request $request, $id)
    {
        $request->validate([     
            'title' => 'required',
        ]);


    $existingRecord = DB::table('italy_state')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('italy_state')->where('id', $id)->update([
            'title' => $request->title,
        ]);
        
            return redirect()->route('Italy_index')->with('status', 'Data updated successfully');
    }

   }

   public function italyDestory($id)
   {
    $existingRecord = DB::table('italy_state')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('italy_state')
        ->where('id', $id)
        ->delete();

        return redirect()->route('Italy_index')->with('status', 'Data deleted successfully');
    }

    }
  public function italyActionUpdate($userId)
   {
    $user = DB::table('italy_state')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('italy_state')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
