<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QualityDetailsController extends Controller
{
    public function qualityDetailsIndex()
    {
        $qualityDetails = DB::table('quality_details')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.qualityDetails.qualityDetailsPage',compact('qualityDetails'));
    } 
    // public function qualityDetailsAdd()
    // {
       
    //     return view('admin.qualityDetails.AddqualityDetails');
    // }
    // public function qualityDetailsStore(Request $request)
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
    //         $upload = 'public/qualityDetails/image/';
    //         $image_url = $upload . $about_image_full;
    //         $file->move($upload, $about_image_full);
    //         $image = $about_image_full;
    //     }
        

    //     $data = DB::table('quality_details')->insert([
    //         'title' => $request->title,
    //         'image' => $image,
    //         'description' => $request->description,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('qualityDetails_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function qualityDetailsEdit($id)
    { 
        $data = DB::table('quality_details')
                ->where('id', $id)
                ->first();
        return view('admin.qualityDetails.EditqualityDetails',compact('data'));
    }  

    public function qualityDetailsUpdate(Request $request, $id)
    {
         $request->validate([
            
               'description' => 'required',
               'title' => 'required',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/qualityDetails/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('quality_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('quality_details')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
        ]);

            return redirect()->route('qualityDetails_index')->with('status', 'Data updated successfully');
        }
   }
//    public function qualityDetailsDestory($id)
//    {
//     $existingRecord = DB::table('quality_details')
//     ->where('id', $id)
//     ->first();

//     if ($existingRecord) {
//         DB::table('quality_details')
//         ->where('id', $id)
//         ->delete();

//         return redirect()->route('qualityDetails_index')->with('status', 'Data deleted successfully');
//     }
//    }
//    public function qualityDetailsActionUpdate($userId)
//    {
//        $user = DB::table('quality_details')
//        ->where('id', $userId)
//        ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('quality_details')
//            ->where('id', $userId)
//            ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
