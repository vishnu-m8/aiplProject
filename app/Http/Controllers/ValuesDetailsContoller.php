<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ValuesDetailsContoller extends Controller
{
    public function valuesIndex()
    {
        $valuesDetais = DB::table('our_values_details')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.ourvaluesDetails.ourvalues',compact('valuesDetais'));
    } 
    public function valuesAdd()
    {
       
        return view('admin.ourvaluesDetails.Addourvalues');
    }
    public function valuesStore(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
                'description' => 'required',
                'title' => 'required',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/about/icon/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('our_values_details')->insert([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('Values_index')->with('status', 'Data inserted successfully');
        }
    }
    public function valuesEdit($id)
    { 
        $data = DB::table('our_values_details')
        ->where('id', $id)
        ->first();
        return view('admin.ourvaluesDetails.Editourvalues',compact('data'));
    } 

    public function valuesUpdate(Request $request, $id)
    {
         $request->validate([
               'description' => 'required',
               'title' => 'required',
               'image' => 'nullable|mimes:jpeg,jpg,png',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/about/icon/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    $existingRecord = DB::table('our_values_details')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        
        $data = DB::table('our_values_details')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
        ]);
            return redirect()->route('Values_index')->with('status', 'Data updated successfully');
        }
   }
   public function valuesDestory($id)
   {
    $existingRecord = DB::table('our_values_details')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('our_values_details')
        ->where('id', $id)
        ->delete();

        return redirect()->route('Values_index')->with('status', 'Data deleted successfully');
     }
   }

   public function valuesActionUpdate($userId)
   {
       $user = DB::table('our_values_details')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('our_values_details')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
