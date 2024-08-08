<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InHouseController extends Controller
{
    public function inhouseIndex()
    {
        $inHouseData = DB::table('inhouse_details')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.inHouse.inHousePage',compact('inHouseData'));
    } 
    // public function inhouseAdd()
    // {
       
    //     return view('admin.inHouse.AddinHouse');
    // }
    // public function inhouseStore(Request $request)
    // {
    //         $request->validate([
    //             'image' => 'required',  
    //             'description' => 'required',
    //             'image_2' => 'required', 
    //         ]);
            
    //         $image = '';
    //     if ($file = $request->file('image')) {
    //         $about_image_name = rand(100,999);
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $about_image_full = $about_image_name . '.' . $ext;
    //         $upload = 'public/inHouse/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }

    //     $image_2 = '';
    //     if ($file = $request->file('image_2')) {    
    //         $about_image_name = rand(100,999);
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $about_image_full = $about_image_name . '.' . $ext;
    //         $upload = 'public/inHouse2/image/';
    //         $image_url_2 = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image_2 = $about_image_full;
    //     }
        

    //     $data = DB::table('inhouse_details')->insert([
    //         'image' => $image,
    //         'image_2' => $image_2,
    //         'description' => $request->description,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('inhouse_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function inhouseEdit($id)
    { 
        $data = DB::table('inhouse_details')
        ->where('id', $id)
        ->first();
        return view('admin.inHouse.EditinHouse',compact('data'));
    }  

    public function inhouseUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required', 
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'image_2' => 'nullable|mimes:jpeg,jpg,png',
        ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/inHouse/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    $image_2 = '';

    if ($file = $request->file('image_2')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/inHouse2/image/';
        $image_url_2 = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image_2 = $about_image_full;
    }

    
    $existingRecord = DB::table('inhouse_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('inhouse_details')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
            'image_2' => $image_2 ? $image_2: $existingRecord->image_2,
        ]);

            return redirect()->route('inhouse_index')->with('status', 'Data updated successfully');
        }
   }
//    public function inhouseDestory($id)
//    {
//     $existingRecord = DB::table('inhouse_details')
//     ->where('id', $id)
//     ->first();

//     if ($existingRecord) {
//         DB::table('inhouse_details')
//         ->where('id', $id)
//         ->delete();

//         return redirect()->route('inhouse_index')->with('status', 'Data deleted successfully');
//     }
//    }
//    public function inhouseActionUpdate($userId)
//    {
//        $user = DB::table('inhouse_details')
//        ->where('id', $userId)
//        ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('inhouse_details')
//            ->where('id', $userId)
//            ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
