<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FabricationImageController extends Controller
{
    public function fabrication_img_show()
    {
        $fabrication_Image = DB::table('fabrication_img')
                ->orderBy('id', 'DESC')
                ->get();
        return view('admin.fabricationImg.main_fabricationImg',compact('fabrication_Image'));
    } 
    public function fabrication_img_add()
    {
       
        return view('admin.fabricationImg.add_fabricationImg');
    }
    public function fabrication_img_store(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
                'title' => 'required',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/fabrication_img/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('fabrication_img')->insert([
            'title' => $request->title,
            'image' => $image,
        ]);

        if ($data) {
            return redirect()->route('fabrication_img_show')->with('status', 'Data inserted successfully');
        }
    }
    public function fabrication_img_edit($id)
    { 
        $data = DB::table('fabrication_img')
                ->where('id', $id)
                ->first();
        return view('admin.fabricationImg.edit_fabricationImg',compact('data'));
    }  
    public function fabrication_img_update(Request $request, $id)
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
        $upload = 'public/fabrication_img/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('fabrication_img')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('fabrication_img')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $image ? $image : $existingRecord->image,
        ]);

            return redirect()->route('fabrication_img_show')->with('status', 'Data updated successfully');
        }
   }
   public function fabrication_img_destory($id)
   {
    $existingRecord = DB::table('fabrication_img')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('fabrication_img')
            ->where('id', $id)
            ->delete();

        return redirect()->route('fabrication_img_show')->with('status', 'Data deleted successfully');
    }
   }
   public function fabrication_img_action_update($userId)
   {
       $user = DB::table('fabrication_img')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('fabrication_img')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
