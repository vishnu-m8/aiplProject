<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DesignDetailsController extends Controller
{
    public function designDetailIndex()
    {
        $designDetails = DB::table('design_details')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.designDetails.designDetailsPage',compact('designDetails'));
    } 
    public function designDetailAdd()
    {
       
        return view('admin.designDetails.AdddesignDetails');
    }
    public function designDetailStore(Request $request)
    {
            $request->validate([ 
                'description' => 'required',
                'title' => 'required',
            ]);
        

        $data = DB::table('design_details')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('DesignDetail_index')->with('status', 'Data inserted successfully');
        }
    }
    public function designDetailEdit($id)
    { 
        $data = DB::table('design_details')
                ->where('id', $id)
                ->first();
        return view('admin.designDetails.EditdesignDetails',compact('data'));
    }  

    public function designDetailUpdate(Request $request, $id)
    {
         $request->validate([
               'description' => 'required',
               'title' => 'required',
         ]);

    
    $existingRecord = DB::table('design_details')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        
        $data = DB::table('design_details')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            return redirect()->route('DesignDetail_index')->with('status', 'Data updated successfully');
        }
   }
   public function designDetailDestory($id)
   {
    $existingRecord = DB::table('design_details')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('design_details')
                ->where('id', $id)
                ->delete();

        return redirect()->route('DesignDetail_index')->with('status', 'Data deleted successfully');
    }
   }
   public function designDetailActionUpdate($userId)
   {
       $user = DB::table('design_details')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('design_details')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
