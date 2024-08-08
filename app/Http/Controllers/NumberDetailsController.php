<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NumberDetailsController extends Controller
{
    public function numberDetailsIndex()
    {
        $numberdetails = DB::table('number_details_data')
                        ->orderBy('id', 'DESC')
                        ->get();
          return view('admin.numberdetailsData.numberDetailsPage',compact('numberdetails'));
    } 
    // public function numberDetailsAdd()
    // {
       
    //     return view('admin.numberdetailsData.AddnumberDetails');
    // }
    // public function numberDetailsStore(Request $request)
    // {
    //         $request->validate([  
    //             'title' => 'required',
    //             'number' => 'required',
    //         ]);
            
    //     $data = DB::table('number_details_data')->insert([
    //         'title' => $request->title,
    //         'number' => $request->number,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('numberDetails_index')->with('status', 'Data inserted successfully');
    //     }
    // }
    public function numberDetailsEdit($id)
    { 
        $data = DB::table('number_details_data')
                ->where('id', $id)
                ->first();
                return view('admin.numberdetailsData.EditnumberDetails',compact('data'));
    }  

    public function numberDetailsUpdate(Request $request, $id)
    {
         $request->validate([
               'title' => 'required',
               'numbe' => 'number',
         ]);

    $existingRecord = DB::table('number_details_data')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('number_details_data')->where('id', $id)->update([
               'title' => $request->title,
                'number' => $request->number,
        ]);

            return redirect()->route('numberDetails_index')->with('status', 'Data updated successfully');
        }
   }
//    public function numberDetailsDestory($id)
//    {
//     $existingRecord = DB::table('number_details_data')
//                     ->where('id', $id)
//                     ->first();

//     if ($existingRecord) {
//         DB::table('number_details_data')
//                 ->where('id', $id)
//                 ->delete();

//         return redirect()->route('numberDetails_index')->with('status', 'Data deleted successfully');
//     }
//    }
//    public function numberDetailsActionUpdate($userId)
//    {
//        $user = DB::table('number_details_data')
//                 ->where('id', $userId)
//                 ->first();
   
//        if ($user) {
//            // Toggle the status
//            $newStatus = !$user->status;
   
//            DB::table('number_details_data')
//             ->where('id', $userId)
//             ->update(['status' => $newStatus]);
//        }
   
//        return back();
//    }
}
