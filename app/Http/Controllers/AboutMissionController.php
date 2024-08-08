<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutMissionController extends Controller
{
    public function aboutMissionIndex()
    {
        $aboutMission = DB::table('about_mission')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.aboutMission.aboutMissionPage',compact('aboutMission'));
    } 
    // public function aboutMissionAdd()
    // {
       
    //     return view('admin.aboutMission.AddaboutMission');
    // }
    // public function aboutMissionStore(Request $request)
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
    //         $upload = 'public/about/mission/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }
        

    //     $data = DB::table('about_mission')->insert([
    //         'title' => $request->title,
    //         'image' => $image,
    //         'description' => $request->description,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('AboutMission_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function aboutMissionEdit($id)
    { 
        $data = DB::table('about_mission')
        ->where('id', $id)
        ->first();
        return view('admin.aboutMission.EditaboutMission',compact('data'));
    } 

    public function aboutMissionUpdate(Request $request, $id)
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
        $upload = 'public/about/mission/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    $existingRecord = DB::table('about_mission')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        
        $data = DB::table('about_mission')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
        ]);
            return redirect()->route('AboutMission_index')->with('status', 'Data updated successfully');
        }
   }
//    public function aboutMissionDestory($id)
//    {
//     $existingRecord = DB::table('about_mission')
//                     ->where('id', $id)
//                     ->first();

//     if ($existingRecord) {
//         DB::table('about_mission')
//                 ->where('id', $id)
//                 ->delete();

//         return redirect()->route('AboutMission_index')->with('status', 'Data deleted successfully');
//      }
//    }

//    public function aboutMissionActionUpdate($userId)
//    {
//        $user = DB::table('about_mission')
//        ->where('id', $userId)
//        ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('about_mission')
//            ->where('id', $userId)
//            ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
