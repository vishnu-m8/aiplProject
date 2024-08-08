<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientsImageController extends Controller
{
    public function ClientsimageIndex()
    {
        $clientsData = DB::table('clients_image')
                ->orderBy('id', 'DESC')
                ->get();
        return view('admin.clientsImage.clientsimagePage',compact('clientsData'));
    } 
    public function ClientsyimageAdd()
    {
       
        return view('admin.clientsImage.AddclientsImage');
    }
    public function ClientsimageStore(Request $request)
    {
            $request->validate([
                'link' => 'required', 
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/clients/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('clients_image')->insert([      
            'image' => $image,
            'link' => $request->input('link'),
        ]);

        if ($data) {
            return redirect()->route('Clientsimage_index')->with('status', 'Data inserted successfully');
        }
    }
    public function ClientsimageEdit($id)
    { 
        $data = DB::table('clients_image')
                ->where('id', $id)
                ->first();
        return view('admin.clientsImage.EditclientsImage',compact('data'));
    }  

    public function ClientsimageUpdate(Request $request, $id)
    {
        $request->validate([
            'link' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/clients/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('clients_image')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('clients_image')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'link' => $request->input('link'),
        ]);

            return redirect()->route('Clientsimage_index')->with('status', 'Data updated successfully');
        }
   }
   public function ClientsimageDestory($id)
   {
    $existingRecord = DB::table('clients_image')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('clients_image')
            ->where('id', $id)
            ->delete();

        return redirect()->route('Clientsimage_index')->with('status', 'Data deleted successfully');
    }
   }
   public function ClientsimageActionUpdate($userId)
   {
       $user = DB::table('clients_image')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('clients_image')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
