<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientMapController extends Controller
{
    public function clientsMapIndex()
    {
        $clientsMap = DB::table('clients_map')
                ->orderBy('id', 'DESC')
                ->get();
        return view('admin.clientsMap.clientsMapPage',compact('clientsMap'));
    } 
    public function clientsMapAdd()
    {
       
        return view('admin.clientsMap.AddclientsMap');
    }
    public function clientsMapStore(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/clientmap/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('clients_map')->insert([      
            'image' => $image,
        ]);

        if ($data) {
            return redirect()->route('clientsMap_index')->with('status', 'Data inserted successfully');
        }
    }
    public function clientsMapEdit($id)
    { 
        $data = DB::table('clients_map')
                ->where('id', $id)
                ->first();
        return view('admin.clientsMap.EditclientsMap',compact('data'));
    }  

    public function clientsMapUpdate(Request $request, $id)
    {
         $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/clientmap/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('clients_map')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('clients_map')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
        ]);

            return redirect()->route('clientsMap_index')->with('status', 'Data updated successfully');
        }
   }
   public function clientsMapDestory($id)
   {
    $existingRecord = DB::table('clients_map')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('clients_map')
            ->where('id', $id)
            ->delete();

        return redirect()->route('clientsMap_index')->with('status', 'Data deleted successfully');
    }
   }
   public function clientsMapActionUpdate($userId)
   {
       $user = DB::table('clients_map')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('clients_map')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
