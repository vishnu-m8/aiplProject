<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomePageIconController extends Controller
{
    public function homeIconIndex()
    {
        $homeIconData = DB::table('home_icon')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.homeIcon.homeIconPage',compact('homeIconData'));
    } 
    // public function homeIconAdd()
    // {
       
    //     return view('admin.homeIcon.AddhomeIcon');
    // }
    // public function homeIconStore(Request $request)
    // {
    //         $request->validate([
    //             'image' => 'required',  
    //             'title' => 'required',
    //         ]);
            
    //         $image = '';
    //     if ($file = $request->file('image')) {
    //         $about_image_name = rand(100,999);
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $about_image_full = $about_image_name . '.' . $ext;
    //         $upload = 'public/homeIcon/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }
        

    //     $data = DB::table('home_icon')->insert([
    //         'title' => $request->title,
    //         'image' => $image,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('homeIcon_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function homeIconEdit($id)
    { 
        $data = DB::table('home_icon')
        ->where('id', $id)
        ->first();
        return view('admin.homeIcon.EdithomeIcon',compact('data'));
    } 

    public function homeIconUpdate(Request $request, $id)
    {
         $request->validate([
               'title' => 'required',
               'image' => 'nullable|mimes:jpeg,jpg,png',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/homeIcon/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    $existingRecord = DB::table('home_icon')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        
        $data = DB::table('home_icon')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
        ]);
            return redirect()->route('homeIcon_index')->with('status', 'Data updated successfully');
        }
   }
//    public function homeIconDestory($id)
//    {
//     $existingRecord = DB::table('home_icon')
//                     ->where('id', $id)
//                     ->first();

//     if ($existingRecord) {
//         DB::table('home_icon')
//                 ->where('id', $id)
//                 ->delete();

//         return redirect()->route('homeIcon_index')->with('status', 'Data deleted successfully');
//      }
//    }

//    public function homeIconActionUpdate($userId)
//    {
//        $user = DB::table('home_icon')
//             ->where('id', $userId)
//             ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('home_icon')
//            ->where('id', $userId)
//            ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
