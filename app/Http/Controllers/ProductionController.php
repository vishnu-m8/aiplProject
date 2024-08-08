<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function productionIndex()
    {
        $productionData = DB::table('production')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.production.productionPage',compact('productionData'));
    } 
    public function productionAdd()
    {
       
        return view('admin.production.Addproduction');
    }
    public function productionStore(Request $request)
    {
            $request->validate([ 
                'number' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
            ]);
        

        $data = DB::table('production')->insert([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'number' => $request->number,
        ]);

        if ($data) {
            return redirect()->route('production_index')->with('status', 'Data inserted successfully');
        }
    }
    public function productionEdit($id)
    { 
        $data = DB::table('production')
        ->where('id', $id)
        ->first();
        return view('admin.production.Editproduction',compact('data'));
    }  

    public function productionUpdate(Request $request, $id)
    {
         $request->validate([
               'number' => 'required',
               'title' => 'required',
               'sub_title' => 'required',
         ]);

    
    $existingRecord = DB::table('production')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        
        $data = DB::table('production')->where('id', $id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'number' => $request->number,
        ]);

            return redirect()->route('production_index')->with('status', 'Data updated successfully');
        }
   }
   public function productionDestory($id)
   {
    $existingRecord = DB::table('production')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('production')
        ->where('id', $id)
        ->delete();

        return redirect()->route('production_index')->with('status', 'Data deleted successfully');
    }
   }
   public function productionActionUpdate($userId)
   {
       $user = DB::table('production')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('production')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }

   public function production_title()
    {
        $productionTitle = DB::table('production_title')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.productionTitle.productionNote',compact('productionTitle'));
    } 

    public function production_title_Edit($id)
    { 
        $data = DB::table('production_title')
        ->where('id', $id)
        ->first();
        return view('admin.productionTitle.EditproductionNote',compact('data'));
    }  

    public function production_title_update(Request $request, $id)
    {
         $request->validate([
               'title' => 'required',
         ]);

    
    $existingRecord = DB::table('production_title')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        
        $data = DB::table('production_title')->where('id', $id)->update([
            'title' => $request->title,
        ]);

            return redirect()->route('production_title')->with('status', 'Data updated successfully');
        }
   }
}
