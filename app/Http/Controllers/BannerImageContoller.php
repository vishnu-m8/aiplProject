<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BannerImageContoller extends Controller
{
    public function bannerImageShow() 
    {
        $bannerData = DB::table('banner_image')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.bannerImage.indexImage',compact('bannerData'));
    }
    public function bannerImageAdd() 
    {
        return view('admin.bannerImage.addImage');
    }
    public function bannerImageStore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required', 
            'description' => 'required',
        ]);
     
        $image = '';
     if ($file = $request->file('image')) {
        $about_image_name = rand(100,999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/banner/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
        }
    
        $data = DB::table('banner_image')->insert([
            'image' => $image,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('bannerImageShow')->with('status', 'Data inserted successfully');
        }     
    }
    public function bannerImageEdit($id)
    { 
        $data = DB::table('banner_image')
                ->where('id', $id)
                ->first();
        return view('admin.bannerImage.editImage',compact('data'));
    } 
    public function bannerImageUpdate(Request $request, $id)
    {
         $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'title' => 'required', 
            'description' => 'required',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/banner/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('banner_image')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('banner_image')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'title' => $request->title,
            'description' => $request->description,
        ]);

            return redirect()->route('bannerImageShow')->with('status', 'Data updated successfully');
        }
   }
   public function bannerImageDestory($id)
   {
    $existingRecord = DB::table('banner_image')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('banner_image')
            ->where('id', $id)
            ->delete();

        return redirect()->route('bannerImageShow')->with('status', 'Data deleted successfully');
    }
   }
   public function banneActionUpdate($userId)
   {
       $user = DB::table('banner_image')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('banner_image')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
