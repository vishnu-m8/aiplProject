<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LogisticalController extends Controller
{
    public function logisticalIndex()
    {
        $logisticalData = DB::table('logistical_details')
                ->orderBy('id', 'DESC')
                ->get();
        return view('admin.logistical.logisticalPage',compact('logisticalData'));
    } 
    // public function logisticalAdd()
    // {
       
    //     return view('admin.logistical.Addlogistical');
    // }
    // public function logisticalStore(Request $request)
    // {
    //         $request->validate([
    //             'image' => 'required',  
    //             'description' => 'required',
    //             'title_1' => 'required',
    //             'title_2' => 'required',
    //         ]);
            
    //         $image = '';
    //     if ($file = $request->file('image')) {
    //         $about_image_name = rand(100,999);
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $about_image_full = $about_image_name . '.' . $ext;
    //         $upload = 'public/logistical/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }
        

    //     $data = DB::table('logistical_details')->insert([
    //         'title_1' => $request->title_1,
    //         'image' => $image,
    //         'description' => $request->description,
    //         'title_2' => $request->title_2,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('Logistical_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function logisticalEdit($id)
    { 
        $data = DB::table('logistical_details')
                ->where('id', $id)
                ->first();
        return view('admin.logistical.Editlogistical',compact('data'));
    }  

    public function logisticalUpdate(Request $request, $id)
    {
         $request->validate([
               'description' => 'required',
               'title_1' => 'required',
               'title_2' => 'required',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/logistical/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('logistical_details')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('logistical_details')->where('id', $id)->update([
            'title_1' => $request->title_1,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
            'title_2' => $request->title_2,
        ]);

            return redirect()->route('Logistical_index')->with('status', 'Data updated successfully');
        }
   }
//    public function logisticalDestory($id)
//    {
//     $existingRecord = DB::table('logistical_details')
//                     ->where('id', $id)
//                     ->first();

//     if ($existingRecord) {
//         DB::table('logistical_details')
//         ->where('id', $id)
//         ->delete();

//         return redirect()->route('Logistical_index')->with('status', 'Data deleted successfully');
//     }
//    }
//    public function logisticalActionUpdate($userId)
//    {
//        $user = DB::table('logistical_details')
//             ->where('id', $userId)
//             ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('logistical_details')
//             ->where('id', $userId)
//             ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
