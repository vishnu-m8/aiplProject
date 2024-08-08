<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ManufacturingDataController extends Controller
{
    public function manufacturingIndex() 
    {
        $manufacturingData = DB::table('manufacturing')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.manufacturing.manufacturingPage',compact('manufacturingData'));
    }
    // public function manufacturingAdd() 
    // {
    //     return view('admin.manufacturing.Addmanufacturing');
    // }

    // public function manufacturingStore(Request $request)
    // {
    // $request->validate([
    //     'image' => 'required', 
    //     'title' => 'required', 
    //     'description' => 'required',
    //     'highlight' => 'required',

    // ]);
     
    //     $image = '';
    //  if ($file = $request->file('image')) {
    //     $about_image_name = rand(100,999);
    //     $ext = strtolower($file->getClientOriginalExtension());
    //     $about_image_full = $about_image_name . '.' . $ext;
    //     $upload = 'public/manufacturing/image/';
    //     $image_url = $upload . $about_image_full;
    //     $file->move($upload, $about_image_full);
    //     $image = $about_image_full;
    //     }
    
    //     $data = DB::table('manufacturing')->insert([
    //         'image' => $image,
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'highlight' => $request->highlight,
    //         'meta_title' => $request->meta_title,
    //         'meta_description' => $request->meta_description,
    //         'meta_keyword' => $request->meta_keyword,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('Manufacturing_index')->with('status', 'Data inserted successfully');
    //     }     
    // }

    public function manufacturingEdit($id)
    { 
        $data = DB::table('manufacturing')
        ->where('id', $id)
        ->first();
        return view('admin.manufacturing.Editmanufacturing',compact('data'));
    }  

    public function manufacturingUpdate(Request $request, $id)
    {

    $request->validate([
        'image' => 'nullable|mimes:jpeg,jpg,png',
        'title' => 'required', 
        'description' => 'required',
        'highlight' => 'required',
    ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/manufacturing/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('manufacturing')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('manufacturing')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'title' => $request->title,
            'description' => $request->description,
            'highlight' => $request->highlight,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);

            return redirect()->route('Manufacturing_index')->with('status', 'Data updated successfully');
         }
    }
//    public function manufacturingDestory($id)
//    {
//      $existingRecord = DB::table('manufacturing')
//      ->where('id', $id)
//      ->first();
 
//      if ($existingRecord) {
//          DB::table('manufacturing')
//          ->where('id', $id)
//          ->delete();
 
//          return redirect()->route('Manufacturing_index')->with('status', 'Data deleted successfully');
//        }
//     }

//     public function manufacturingActionUpdate($userId)
//    {
//     $user = DB::table('manufacturing')
//     ->where('id', $userId)
//     ->first();

//     if ($user) {
//         // Toggle the status
//         $newStatus = !$user->status;

//         DB::table('manufacturing')
//         ->where('id', $userId)
//         ->update(['status' => $newStatus]);
//     }

//     return back();
//  }
}
