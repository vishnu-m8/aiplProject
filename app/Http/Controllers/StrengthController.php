<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StrengthController extends Controller
{
    public function strengthIndex() 
    {
        $strengthData = DB::table('our_strength')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.strength.strengthPage',compact('strengthData'));
    }
    public function strengthAdd() 
    {
        return view('admin.strength.Addstrength');
    }

    public function strengthStore(Request $request)
    {
    $request->validate([
        'image' => 'required', 
        'title' => 'required', 
        'description' => 'required',

    ]);
     
        $image = '';
     if ($file = $request->file('image')) {
        $about_image_name = rand(100,999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/strength/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
        }
    
        $data = DB::table('our_strength')->insert([
            'image' => $image,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('Strength_index')->with('status', 'Data inserted successfully');
        }     
    }

    public function strengthEdit($id)
    { 
        $data = DB::table('our_strength')
        ->where('id', $id)
        ->first();
        return view('admin.strength.Editstrength',compact('data'));
    }  

    public function strengthUpdate(Request $request, $id)
    {

    $request->validate([
        // 'image' => 'required', 
        'title' => 'required', 
        'description' => 'required',
    ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/strength/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('our_strength')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('our_strength')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'title' => $request->title,
            'description' => $request->description,
        ]);

            return redirect()->route('Strength_index')->with('status', 'Data updated successfully');
         }
    }
   public function strengthDestory($id)
   {
     $existingRecord = DB::table('our_strength')
     ->where('id', $id)
     ->first();
 
     if ($existingRecord) {
         DB::table('our_strength')
         ->where('id', $id)
         ->delete();
 
         return redirect()->route('Strength_index')->with('status', 'Data deleted successfully');
       }
    }

    public function strengthActionUpdate($userId)
   {
    $user = DB::table('our_strength')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('our_strength')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
