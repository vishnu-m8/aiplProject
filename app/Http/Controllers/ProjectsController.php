<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function projectIndex()
    {
        $projects_details = DB::table('projects')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.projects.project', compact('projects_details'));
    } 

    public function projectAdd()
    {
        
        return view('admin.projects.Add_mainProjects');
        
    } 
    public function projectStore(Request $request)
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
        $upload = 'public/projects/image';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }
    $slug = strtolower(str_replace(' ', '-', $request->title));

    $existingSlug = DB::table('projects')->where('slug', $slug)->exists();

    if ($existingSlug) {
        $suffix = 1;
        $newSlug = $slug . '-' . $suffix;

        while (DB::table('projects')->where('slug', $newSlug)->exists()) {
            $suffix++;
            $newSlug = $slug . '-' . $suffix;
        }
        $slug = $newSlug;
    }

    $data = DB::table('projects')->insert([
        'image' => $image,
        'description' => $request->description,
        'title' => $request->title,
        'client' => $request->client,
        'area' => $request->area,
        'consultant' => $request->consultant,
        'project_type' => $request->project_type,
        'slug' => $slug,
    ]);

    if ($data) {
        return redirect()->route('Project_index')->with('status', 'Data inserted successfully');
    }
    }
    public function projectEdit($id)
        { 
            $data = DB::table('projects')
            ->where('id', $id)
            ->first();
            return view('admin.projects.Edit_mainProjects',compact('data'));
        }  
        public function projectUpdate(Request $request, $id)
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
            $upload = 'public/projects/image';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }

        
        $existingRecord = DB::table('projects')
        ->where('id', $id)
        ->first();


        if ($existingRecord) {
            
            $data = DB::table('projects')->where('id', $id)->update([
                'image' => $image ? $image : $existingRecord->image,
                'description' => $request->description,
                'title' => $request->title,
                'client' => $request->client,
                'area' => $request->area,
                'consultant' => $request->consultant,
                'project_type' => $request->project_type,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
            ]);

            
                return redirect()->route('Project_index')->with('status', 'Data updated successfully');
        }

    }
    public function projectDestory($id)
    {
        $existingRecord = DB::table('projects')
        ->where('id', $id)
        ->first();

        if ($existingRecord) {
            DB::table('projects')
            ->where('id', $id)
            ->delete();

            return redirect()->route('Project_index')->with('status', 'Data deleted successfully');
        }

    }
    public function projectActionUpadte($userId)
    {
        $user = DB::table('projects')
        ->where('id', $userId)
        ->first();

        if ($user) {
            // Toggle the status
            $newStatus = !$user->status;

            DB::table('projects')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
        }

        return back();
    }
    public function updateStatusActive($id)
   {
    DB::table('projects')
        ->where('id', $id)
        ->update(['home_status' => true]);
    
    return redirect()->route('Project_index')->with('success', 'Status updated to active.');
    }

    public function updateStatusInactive($id)
    {
        DB::table('projects')
            ->where('id', $id)
            ->update(['home_status' => false]);
        
        return redirect()->route('Project_index')->with('success', 'Status updated to inactive.');
    }

    public function project_Image($id)
{
    $project_id = $id;

    $list_project_images = DB::table('project_image')
        ->where('project_id', $project_id)
        ->get();

    return view('admin.projects.project-images', compact('project_id', 'list_project_images'));
}
    public function addProjectImage(Request $request)
    {
        $request->validate([
            'img_src' => 'required',
        ]);
            
        $image = '';
        
        if($file = $request->file('img_src')) 
        {
            $image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full = $image_name . '.' . $ext;
            $upload = 'public/project_src/image/';
            $image_url = $upload . $image_full;
            $file->move($upload, $image_full);
            $image = $image_full;
        }
        

        $data = DB::table('project_image')->insert([
            'project_id' => $request->project_id,
            'img_src' => $image,
        ]);

        if ($data) {
            return redirect()->back();
            /*return redirect()->route('Product_index')->with('status', 'Data inserted successfully');*/
        }
    }
    public function delete_project_image($id)
    {
        $project_image_id = $id;
    
        $delete_query   = DB::table('project_image')
                        ->where('id', $project_image_id)
                        ->delete();
        
        return redirect()->back();
        
    }
}
