<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutInfoController extends Controller
{
    public function aboutInfoIndex()
    {
        $aboutInfo = DB::table('about_info')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.aboutInfo.aboutinfo',compact('aboutInfo'));
    } 
    public function aboutInfoAdd()
    {
       
        return view('admin.aboutInfo.AddaboutInfo');
    }
    public function aboutInfoStore(Request $request)
    {
            $request->validate([ 
                'description' => 'required',
                'title' => 'required',
            ]);
        

        $data = DB::table('about_info')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('AboutInfo_index')->with('status', 'Data inserted successfully');
        }
    }
    public function aboutInfoEdit($id)
    { 
        $data = DB::table('about_info')
        ->where('id', $id)
        ->first();
        return view('admin.aboutInfo.EditaboutInfo',compact('data'));
    }  

    public function aboutInfoUpdate(Request $request, $id)
    {
         $request->validate([
               'description' => 'required',
               'title' => 'required',
         ]);

    
    $existingRecord = DB::table('about_info')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        
        $data = DB::table('about_info')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            return redirect()->route('AboutInfo_index')->with('status', 'Data updated successfully');
        }
   }
   public function aboutInfoDestory($id)
   {
    $existingRecord = DB::table('about_info')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('about_info')
        ->where('id', $id)
        ->delete();

        return redirect()->route('AboutInfo_index')->with('status', 'Data deleted successfully');
    }
   }
   public function aboutInfoActionUpdate($userId)
   {
       $user = DB::table('about_info')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('about_info')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
