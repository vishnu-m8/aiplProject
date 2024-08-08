<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamIndex()
    {
        $team_details = DB::table('team')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.team.main_team',compact('team_details'));
    } 
    public function teamAdd()
    {
       
        return view('admin.team.Addteam');
    }
    public function teamStore(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
                'name' => 'required',
                'designation' => 'required',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/about/team/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('team')->insert([
            'image' => $image,
            'designation' => $request->designation,
            'name' => $request->name,
        ]);

        if ($data) {
            return redirect()->route('Team_index')->with('status', 'Data inserted successfully');
        }
    }
    public function teamEdit($id)
    { 
        $data = DB::table('team')
        ->where('id', $id)
        ->first();
        return view('admin.team.Editteam',compact('data'));
    }  

    public function teamUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'name' => 'required',
            'designation' => 'required',
        ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/about/team/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('team')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('team')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'designation' => $request->designation,
            'name' => $request->name,
        ]);

            return redirect()->route('Team_index')->with('status', 'Data updated successfully');
        }
   }
   public function teamDestory($id)
   {
        $existingRecord = DB::table('team')
        ->where('id', $id)
        ->first();

        if ($existingRecord) {
            DB::table('team')
            ->where('id', $id)
            ->delete();

            return redirect()->route('Team_index')->with('status', 'Data deleted successfully');
        }
   }
   public function teamActionUpdate($userId)
   {
       $user = DB::table('team')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('team')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
