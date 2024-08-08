<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutVisionController extends Controller
{
    public function aboutVisonIndex()
    {
        $aboutVision = DB::table('about_vision')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.aboutVision.aboutVisionPage',compact('aboutVision'));
    } 
    // public function aboutVisonAdd()
    // {
       
    //     return view('admin.aboutVision.AddaboutVision');
    // }
    // public function aboutVisonStore(Request $request)
    // {
    //         $request->validate([
    //             'image' => 'required',  
    //             'description' => 'required',
    //             'title' => 'required',
    //         ]);
            
    //         $image = '';
    //     if ($file = $request->file('image')) {
    //         $about_image_name = rand(100,999);
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $about_image_full = $about_image_name . '.' . $ext;
    //         $upload = 'public/about/vision/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }
        

    //     $data = DB::table('about_vision')->insert([
    //         'title' => $request->title,
    //         'image' => $image,
    //         'description' => $request->description,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('AboutVison_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function aboutVisonEdit($id)
    { 
        $data = DB::table('about_vision')
        ->where('id', $id)
        ->first();
        return view('admin.aboutVision.EditaboutVision',compact('data'));
    } 

    public function aboutVisonUpdate(Request $request, $id)
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
        $upload = 'public/about/vision/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    $existingRecord = DB::table('about_vision')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        
        $data = DB::table('about_vision')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
        ]);
            return redirect()->route('AboutVison_index')->with('status', 'Data updated successfully');
        }
   }
//    public function aboutVisonDestory($id)
//    {
//     $existingRecord = DB::table('about_vision')
//                     ->where('id', $id)
//                     ->first();

//     if ($existingRecord) {
//         DB::table('about_vision')
//                 ->where('id', $id)
//                 ->delete();

//         return redirect()->route('AboutVison_index')->with('status', 'Data deleted successfully');
//      }
//    }

//    public function aboutVisonActionUpdate($userId)
//    {
//        $user = DB::table('about_vision')
//        ->where('id', $userId)
//        ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('about_vision')
//            ->where('id', $userId)
//            ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
