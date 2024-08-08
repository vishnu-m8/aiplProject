<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WorkingController extends Controller
{
    public function workingIndex() 
    {
        $workingData = DB::table('working_process')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.working.workingPage',compact('workingData'));
    }
  
    
    public function workingEdit($id)
    { 
        $data = DB::table('working_process')
                ->where('id', $id)
                ->first();
        return view('admin.working.Editworking',compact('data',));
    }  
    public function workingUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'description' => 'required',
        ]);
        $image = '';

        if ($file = $request->file('image')) {
            $about_image_name = rand(100, 999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/working/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }

    $existingRecord = DB::table('working_process')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        $data = DB::table('working_process')->where('id', $id)->update([
            'description' => $request->description,
            'image' => $image ? $image : $existingRecord->image,
        ]);
        
            return redirect()->route('Working_index')->with('status', 'Data updated successfully');
        }

   }
   
}
