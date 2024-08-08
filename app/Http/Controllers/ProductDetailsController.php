<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function productdetailsIndex()
    {
        $ProductDetails = DB::table('product_details')
                        ->orderBy('id', 'DESC')
                        ->get();
          return view('admin.productdetail.productDetails',compact('ProductDetails'));
    } 
    public function productdetailsAdd()
    {
       
        return view('admin.productdetail.AddProductDetails');
    }
    public function productdetailsStore(Request $request)
    {
            $request->validate([  
                'title' => 'required',
                'description' => 'required',
            ]);
            
        $data = DB::table('product_details')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('Productdetails_index')->with('status', 'Data inserted successfully');
        }
    }
    public function productdetailsEdit($id)
    { 
        $data = DB::table('product_details')
                ->where('id', $id)
                ->first();
                return view('admin.productdetail.EditProductDetails',compact('data'));
    }  

    public function productdetailsUpdate(Request $request, $id)
    {
         $request->validate([
               'title' => 'required',
               'description' => 'required',
         ]);

    $existingRecord = DB::table('product_details')
                    ->where('id', $id)
                    ->first();


    if ($existingRecord) {
        
        $data = DB::table('product_details')->where('id', $id)->update([
               'title' => $request->title,
                'description' => $request->description,
        ]);

            return redirect()->route('Productdetails_index')->with('status', 'Data updated successfully');
        }
   }
   public function productdetailsDestory($id)
   {
    $existingRecord = DB::table('product_details')
                    ->where('id', $id)
                    ->first();

    if ($existingRecord) {
        DB::table('product_details')
                ->where('id', $id)
                ->delete();

        return redirect()->route('Productdetails_index')->with('status', 'Data deleted successfully');
    }
   }
   public function productdetailsActionUpdate($userId)
   {
       $user = DB::table('product_details')
                ->where('id', $userId)
                ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('product_details')
            ->where('id', $userId)
            ->update(['status' => $newStatus]);
       }
   
       return back();
   }
}
