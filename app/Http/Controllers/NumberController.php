<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function numberIndex() 
    {
        $numberDetails = DB::table('number_details')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.numberDetails.numberPage',compact('numberDetails'));
    }
    public function numberEdit($id)
    { 
        $data = DB::table('number_details')
                ->where('id', $id)
                ->first();
        return view('admin.numberDetails.EditnumberPage',compact('data',));
    }  
    public function numberUpdate(Request $request, $id)
    {
        $request->validate([
            'url' => 'required',
            'number' => 'required',
            'title' => 'required',
        ]);

    $existingRecord = DB::table('number_details')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        $data = DB::table('number_details')->where('id', $id)->update([
            'url' => $request->url,
            'number' => $request->number,
            'title' => $request->title,
        ]);
        
            return redirect()->route('Number_index')->with('status', 'Data updated successfully');
        }

   }

}
