<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function historyIndex()
    {
        $history = DB::table('history')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.history.main_history',compact('history'));
    } 
    public function historyAdd()
    {
       
        return view('admin.history.Addhistory');
    }
    public function historyStore(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
                'description' => 'required',
                'title' => 'required',
                'year' => 'required',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/about/history/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('history')->insert([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'year' => $request->year,
        ]);

        if ($data) {
            return redirect()->route('History_index')->with('status', 'Data inserted successfully');
        }
    }
    public function historyEdit($id)
    { 
        $data = DB::table('history')
        ->where('id', $id)
        ->first();
        return view('admin.history.Edithistory',compact('data'));
    }  

    public function historyUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'description' => 'required',
            'title' => 'required',
            'year' => 'required',
        ]);
    
        $existingRecord = DB::table('history')
            ->where('id', $id)
            ->first();
    
        if ($existingRecord) {
            $image = $existingRecord->image;
    
            if ($file = $request->file('image')) {
                $about_image_name = rand(100, 999);
                $ext = strtolower($file->getClientOriginalExtension());
                $about_image_full = $about_image_name . '.' . $ext;
                $upload = 'public/about/history/';
                $image_url = $upload . $about_image_full;
                $file->move($upload, $about_image_full);
                $image = $about_image_full;
            }
    
            $data = DB::table('history')->where('id', $id)->update([
                'title' => $request->title,
                'image' => $image,
                'description' => $request->description,
                'year' => $request->year,
            ]);
    
            return redirect()->route('History_index')->with('status', 'Data updated successfully');
        }
        
   }
   public function historyDestory($id)
   {
    $existingRecord = DB::table('history')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('history')
        ->where('id', $id)
        ->delete();

        return redirect()->route('History_index')->with('status', 'Data deleted successfully');
    }
   }
   public function historyActionUpdate($userId)
   {
       $user = DB::table('history')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('history')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}

