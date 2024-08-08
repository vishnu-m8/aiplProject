<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QualityImageController extends Controller
{
    public function QualityimageIndex() 
    {
        $qualityImage = DB::table('quality_image')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.qualityImage.qualityImagePage',compact('qualityImage'));
    }
    public function QualityimageAdd() 
    {
        return view('admin.qualityImage.AddqualityImage');
    }

    public function QualityimageStore(Request $request)
    {
    $request->validate([
        'image' => 'required|mimes:jpeg,jpg,png',
    ]);
     
        $image = '';
     if ($file = $request->file('image')) {
        $about_image_name = rand(100,999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/quality/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
        }
    
        $data = DB::table('quality_image')->insert([
            'image' => $image,
        ]);

        if ($data) {
            return redirect()->route('Qualityimage_index')->with('status', 'Data inserted successfully');
        }     
    }

    public function QualityimageEdit($id)
    { 
        $data = DB::table('quality_image')
                ->where('id', $id)
                ->first();
        return view('admin.qualityImage.EditqualityImage',compact('data'));
    }  


    public function QualityimageUpdate(Request $request, $id)
    {
         $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/quality/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('quality_image')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('quality_image')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
        ]);

            return redirect()->route('Qualityimage_index')->with('status', 'Data updated successfully');
        }
   }
   public function QualityimageDestory($id)
   {
    $existingRecord = DB::table('quality_image')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('quality_image')
            ->where('id', $id)
            ->delete();

        return redirect()->route('Qualityimage_index')->with('status', 'Data deleted successfully');
    }
   }
   public function QualityimageActionUpdate($userId)
   {
       $user = DB::table('quality_image')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('quality_image')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }

}
