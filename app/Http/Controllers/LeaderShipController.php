<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeaderShipController extends Controller
{
    public function leadershipIndex() 
    {
        $leaderShipData = DB::table('leadership')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.leaderShip.leaderShipPage',compact('leaderShipData'));
    }
    public function leadershipEdit($id)
    { 
        $data = DB::table('leadership')
        ->where('id', $id)
        ->first();
        return view('admin.leaderShip.EditleaderShip',compact('data',));
    }  
    public function leadershipUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

    $existingRecord = DB::table('leadership')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('leadership')->where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
            return redirect()->route('leadership_index')->with('status', 'Data updated successfully');
        }

   }
}
