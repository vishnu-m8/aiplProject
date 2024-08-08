<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientDetailsController extends Controller
{
    public function clientsDetailsIndex()
    {
        $clientdetails = DB::table('clients_details')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.clientDetails.clientDetailsPage',compact('clientdetails'));
    } 
    public function clientsDetailsAdd()
    {
       
        return view('admin.clientDetails.AddclientDetails');
    }
    public function clientsDetailsStore(Request $request)
    {
            $request->validate([ 
                'description' => 'required',
                'title' => 'required',
            ]);

        $data = DB::table('clients_details')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('clientsDetails_index')->with('status', 'Data inserted successfully');
        }
    }
    public function clientsDetailsEdit($id)
    { 
        $data = DB::table('clients_details')
                ->where('id', $id)
                ->first();
        return view('admin.clientDetails.EditclientDetails',compact('data'));
    }  

    public function clientsDetailsUpdate(Request $request, $id)
    {
         $request->validate([
               'description' => 'required',
               'title' => 'required',
         ]);

    $existingRecord = DB::table('clients_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('clients_details')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            return redirect()->route('clientsDetails_index')->with('status', 'Data updated successfully');
        }
   }
   public function clientsDetailsDestory($id)
   {
    $existingRecord = DB::table('clients_details')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('clients_details')
        ->where('id', $id)
        ->delete();

        return redirect()->route('clientsDetails_index')->with('status', 'Data deleted successfully');
    }
   }
   public function clientsDetailsActionUpdate($userId)
   {
       $user = DB::table('clients_details')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('clients_details')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
