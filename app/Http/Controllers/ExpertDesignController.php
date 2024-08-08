<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ExpertDesignController extends Controller
{
    public function expertDesignIndex() 
    {
        $ExpertdesignData = DB::table('expert_design')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.ExpertDesign.ExpertDesignPage',compact('ExpertdesignData'));
    }
    public function expertDesignEdit($id)
    { 
        $data = DB::table('expert_design')
                ->where('id', $id)
                ->first();
        return view('admin.ExpertDesign.EditexpertDesign',compact('data',));
    }  
    public function expertDesignUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

    $existingRecord = DB::table('expert_design')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        $data = DB::table('expert_design')->where('id', $id)->update([
            'description' => $request->description,
            'title' => $request->title,
        ]);
        
            return redirect()->route('ExpertDesign_index')->with('status', 'Data updated successfully');
        }

   }
}
