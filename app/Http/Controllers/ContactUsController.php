<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactIndex() 
    {
        $contactUsData = DB::table('contact_us')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.contactUs.contactUsPage',compact('contactUsData'));
    }
    // public function contactAdd() 
    // {
    //     return view('admin.contactUs.AddcontactUs');
    // }
    // public function contactStore(Request $request)
    // {

    // $request->validate([
    //     'call_us' => 'required', 
    //     'mail_us' => 'required',
    //     'our_hours' => 'required', 
    //     'contact_with' => 'required',
    // ]);
     
    //     $data = DB::table('contact_us')->insert([
    //         'call_us' => $request->call_us,
    //         'mail_us' => $request->mail_us,
    //         'our_hours' => $request->our_hours,
    //         'contact_with' => $request->contact_with,
    //     ]);

    //     if ($data) {
    //         return redirect()->route('contact_index')->with('status', 'Data inserted successfully');
    //     }     
    // }
    public function contactEdit($id)
    { 
        $data = DB::table('contact_us')
        ->where('id', $id)
        ->first();
        return view('admin.contactUs.EditcontactUs',compact('data'));
    }  

    public function contactUpdate(Request $request, $id)
    {

    $request->validate([ 
        'call_us' => 'required', 
        'mail_us' => 'required',
        'our_hours' => 'required', 
        'contact_with' => 'required',
    ]);


    $existingRecord = DB::table('contact_us')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('contact_us')->where('id', $id)->update([
            'call_us' => $request->call_us,
            'mail_us' => $request->mail_us,
            'our_hours' => $request->our_hours,
            'contact_with' => $request->contact_with,
        ]);

            return redirect()->route('contact_index')->with('status', 'Data updated successfully');
         }
    }
//     public function contactDestory($id)
//     {
//       $existingRecord = DB::table('contact_us')
//       ->where('id', $id)
//       ->first();
  
//       if ($existingRecord) {
//           DB::table('contact_us')
//           ->where('id', $id)
//           ->delete();
  
//           return redirect()->route('contact_index')->with('status', 'Data deleted successfully');
//         }
//      }
 
//      public function contactActionUpdate($userId)
//     {
//      $user = DB::table('contact_us')
//      ->where('id', $userId)
//      ->first();
 
//      if ($user) {
//          // Toggle the status
//          $newStatus = !$user->status;
 
//          DB::table('contact_us')
//          ->where('id', $userId)
//          ->update(['status' => $newStatus]);
//      }
 
//      return back();
//   }
}
