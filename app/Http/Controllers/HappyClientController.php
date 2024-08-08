<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HappyClientController extends Controller
{
    public function clientSay()
    {
        $happyClient = DB::table('client_say')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.happyClient.sayClient',compact('happyClient'));
    } 
    public function clientSayAdd()
    {
       
        return view('admin.happyClient.addsays');
    }
    public function clientSayStore(Request $request)
    {
            $request->validate([ 
                'name' => 'required',
                'description' => 'required',
            ]);
        

        $data = DB::table('client_say')->insert([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('clientSay')->with('status', 'Data inserted successfully');
        }
    }
    public function clientSayEdit($id)
    { 
        $data = DB::table('client_say')
        ->where('id', $id)
        ->first();
        return view('admin.happyClient.editsays',compact('data'));
    }  

    public function clientSayUpdate(Request $request, $id)
    {
        $request->validate([ 
            'name' => 'required',
            'description' => 'required',
        ]);

    
    $existingRecord = DB::table('client_say')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        
        $data = DB::table('client_say')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

            return redirect()->route('clientSay')->with('status', 'Data updated successfully');
        }
   }
   public function clientSayDestory($id)
   {
    $existingRecord = DB::table('client_say')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('client_say')
            ->where('id', $id)
            ->delete();

        return redirect()->route('clientSay')->with('status', 'Data deleted successfully');
    }
   }
   public function clientSayActionUpdate($userId)
   {
       $user = DB::table('client_say')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('client_say')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
