<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // public function experience_show() 
    // {
    //     $experience_data = DB::table('experience_company')
    //                 ->orderBy('id', 'DESC')
    //                 ->get();
    //     return view('admin.experience.main_experience',compact('experience_data'));
    // }
   
    // public function experience_edit($id)
    // { 
    //     $data = DB::table('experience_company')
    //             ->where('id', $id)
    //             ->first();
    //     return view('admin.experience.Editexperience',compact('data'));
    // }  

    // public function experience_update(Request $request, $id)
    // {

    // $request->validate([ 
    //     'happy_client' => 'required', 
    //     'year_of_experience' => 'required',
    //     'product_supplied' => 'required',
    // ]);


    // $existingRecord = DB::table('experience_company')
    //             ->where('id', $id)
    //             ->first();


    // if ($existingRecord) {
    //     $data = DB::table('experience_company')->where('id', $id)->update([
    //         'happy_client' => $request->happy_client,
    //         'year_of_experience' => $request->year_of_experience,
    //         'product_supplied' => $request->product_supplied,
    //     ]);

    //         return redirect()->route('experience_show')->with('status', 'Data updated successfully');
    //      }
    // }

    public function experience_logo() 
    {
        $experienceLogo = DB::table('experience_logo')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.experience_logo.logo',compact('experienceLogo'));
    }

    public function experience_logo_edit($id)
    { 
        $data = DB::table('experience_logo')
                ->where('id', $id)
                ->first();
        return view('admin.experience_logo.logoEdit',compact('data'));
    }  

    public function experience_logo_update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|mimes:jpeg,jpg,png',
            'title' => 'required',
            'number' => 'required',
        ]);

    $image = '';

    if ($file = $request->file('icon')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/exp_logo/icon/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('experience_logo')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('experience_logo')->where('id', $id)->update([
            'icon' => $image ? $image : $existingRecord->icon,
            'title' => $request->title,
            'number' => $request->number,
        ]);

            return redirect()->route('experience_logo')->with('status', 'Data updated successfully');
        }
    }
}
