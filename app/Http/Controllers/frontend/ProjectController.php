<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectsShow() 
    {
        $project_fetch = DB::table('projects')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();

        $IndiaProject_fetch = DB::table('projects')
                            ->where('status', 1)
                            ->where('project_type','india')
                            ->get();

        $InternationalProject_fetch = DB::table('projects')
                                    ->where('status', 1)
                                    ->where('project_type','international')
                                    ->get();

                                    return view('frontend.projects',compact('project_fetch','IndiaProject_fetch','InternationalProject_fetch'));
    }

    public function projects_details($slug)
    {
        $project_slug = DB::table('projects')
                     ->where('slug', $slug)
                     ->first();

        $ProjectDetails_fetch = DB::table('projects')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();
                     return view('frontend.projectsdetails',compact('project_slug','ProjectDetails_fetch'));
    }

    public function IndiaProjects_details($slug)
    {
        $india_slug = DB::table('projects')
                     ->where('slug', $slug)
                     ->first();

        $indiaDetails_fetch = DB::table('projects')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();
                     return view('frontend.indiadetails',compact('india_slug','indiaDetails_fetch'));
    }
    public function InternationalProjects_details($slug)
    {
           $int_slug = DB::table('projects')
                     ->where('slug', $slug)
                     ->first();

          $intDetails_fetch = DB::table('projects')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();
                     return view('frontend.internationaldetails',compact('int_slug','intDetails_fetch'));
    }

    public function new_projectDetails($slug)
    {
           $newProject_slug = DB::table('projects')
                            ->where('slug', $slug)
                            ->first();

            $homeProjectDetails_fetch = DB::table('projects')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();

                        
                     return view('frontend.newProjectdetails',compact('newProject_slug','homeProjectDetails_fetch'));
    }
}
