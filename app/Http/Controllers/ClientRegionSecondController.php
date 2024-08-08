<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientRegionSecondController extends Controller
{
    public function clientsSecondIndex() 
    {
        $clientsRegionSecond = DB::table('clients_region_second')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.clientsSecondRegion.clientsSecondRegionPage',compact('clientsRegionSecond'));
    }
    // public function clientsSecondAdd() 
    // {
    //     return view('admin.clientsSecondRegion.AddclientsSecondRegion');
    // }

    // public function clientsSecondStore(Request $request)
    // {
    // $request->validate([
    //     'image' => 'required', 
    //     'title' => 'required', 
    //     'description' => 'required',
    //     'team_details' => 'required',
    //     'team_member' => 'required',
    //     'project_details_1' => 'required',
    //     'project_number_1' => 'required',
    //     'project_details_2' => 'required',
    //     'project_number_2' => 'required',

    // ]);
     
    //     $image = '';
    //  if ($file = $request->file('image')) {
    //     $about_image_name = rand(100,999);
    //     $ext = strtolower($file->getClientOriginalExtension());
    //     $about_image_full = $about_image_name . '.' . $ext;
    //     $upload = 'public/clientsRegionSecond/image/';
    //     $image_url = $upload . $about_image_full;
    //     $file->move($upload, $about_image_full);
    //     $image = $about_image_full;
    //     }
    
    //     $data = DB::table('clients_region_second')->insert([
    //         'image' => $image,
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'team_member' => $request->team_member,
    //         'team_details' => $request->team_details,
    //         'project_details_1' => $request->project_details_1,
    //         'project_number_1' => $request->project_number_1,
    //         'project_details_2' => $request->project_details_2,
    //         'project_number_2' => $request->project_number_2,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('clientsSecond_index')->with('status', 'Data inserted successfully');
    //     }     
    // }

    public function clientsSecondEdit($id)
    { 
        $data = DB::table('clients_region_second')
        ->where('id', $id)
        ->first();
        return view('admin.clientsSecondRegion.EditclientsSecondRegion',compact('data'));
    }  

    public function clientsSecondUpdate(Request $request, $id)
    {

    $request->validate([
        'title' => 'required', 
        'description' => 'required',
        'team_details' => 'required',
        'team_member' => 'required',
        'project_details_1' => 'required',
        'project_number_1' => 'required',
        'project_details_2' => 'required',
        'project_number_2' => 'required',
    ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/clientsRegionSecond/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('clients_region_second')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('clients_region_second')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'title' => $request->title,
            'description' => $request->description,
            'team_member' => $request->team_member,
            'team_details' => $request->team_details,
            'project_details_1' => $request->project_details_1,
            'project_number_1' => $request->project_number_1,
            'project_details_2' => $request->project_details_2,
            'project_number_2' => $request->project_number_2,
        ]);

            return redirect()->route('clientsSecond_index')->with('status', 'Data updated successfully');
         }
    }
//    public function clientsSecondDestory($id)
//    {
//      $existingRecord = DB::table('clients_region_second')
//      ->where('id', $id)
//      ->first();
 
//      if ($existingRecord) {
//          DB::table('clients_region_second')
//          ->where('id', $id)
//          ->delete();
 
//          return redirect()->route('clientsSecond_index')->with('status', 'Data deleted successfully');
//        }
//     }

//     public function clientsSecondActionUpdate($userId)
//    {
//     $user = DB::table('clients_region_second')
//     ->where('id', $userId)
//     ->first();

//     if ($user) {
//         // Toggle the status
//         $newStatus = !$user->status;

//         DB::table('clients_region_second')
//         ->where('id', $userId)
//         ->update(['status' => $newStatus]);
//     }

//     return back();
//  }
}
