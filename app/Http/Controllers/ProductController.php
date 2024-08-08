<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productIndex()
    {
        $Product = DB::table('products')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.product.products',compact('Product'));
    } 
    public function productAdd()
    {
       
        return view('admin.product.Addproduct');
    }
    public function productStore(Request $request)
    {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png', 
                'title' => 'required',
                'description' => 'required',
            ]);
            
            $image = '';
        if ($file = $request->file('image')) {
            $about_image_name = rand(100,999);
            $ext = strtolower($file->getClientOriginalExtension());
            $about_image_full = $about_image_name . '.' . $ext;
            $upload = 'public/product/image/';
            $image_url = $upload . $about_image_full;
            $file->move($upload, $about_image_full);
            $image = $about_image_full;
        }
        

        $data = DB::table('products')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $image,
            'description' => $request->description,
        ]);

        if ($data) {
            return redirect()->route('Product_index')->with('status', 'Data inserted successfully');
        }
    }
    public function productEdit($id)
    { 
        $data = DB::table('products')
        ->where('id', $id)
        ->first();
        return view('admin.product.Editproduct',compact('data'));
    }  

    public function productUpdate(Request $request, $id)
    {
         $request->validate([
               'title' => 'required',
               'description' => 'required',
               'image' => 'nullable|mimes:jpeg,jpg,png',
         ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/product/image/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('products')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        
        $data = DB::table('products')->where('id', $id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $image ? $image : $existingRecord->image,
            'description' => $request->description,
        ]);

            return redirect()->route('Product_index')->with('status', 'Data updated successfully');
        }
   }
   public function productDestory($id)
   {
    $existingRecord = DB::table('products')
    ->where('id', $id)
    ->first();

    if ($existingRecord) {
        DB::table('products')
        ->where('id', $id)
        ->delete();

        return redirect()->route('Product_index')->with('status', 'Data deleted successfully');
    }
   }
   public function productActionUpdate($userId)
   {
       $user = DB::table('products')
       ->where('id', $userId)
       ->first();
   
       if ($user) {
           // Toggle the status
           $newStatus = !$user->status;
   
           DB::table('products')
           ->where('id', $userId)
           ->update(['status' => $newStatus]);
       }
   
       return back();
   }
   
    public function show_product_images($id)
    { 
        $product_id = $id;
        
        $list_product_images    = DB::table('product_images')
                                ->where('product_id', $product_id)
                                ->get();
                                
        return view('admin.product.product-images',compact('list_product_images', 'product_id'));
    }
    
    public function add_product_image(Request $request)
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
            $upload = 'public/product/image/';
            $image_url = $upload . $image_full;
            $file->move($upload, $image_full);
            $image = $image_full;
        }
        

        $data = DB::table('product_images')->insert([
            'product_id' => $request->product_id,
            'img_src' => $image,
        ]);

        if ($data) {
            return redirect()->back();
            /*return redirect()->route('Product_index')->with('status', 'Data inserted successfully');*/
        }
    }
    
    public function delete_product_image($id)
    {
        $product_image_id = $id;
    
        $delete_query   = DB::table('product_images')
                        ->where('id', $product_image_id)
                        ->delete();
        
        return redirect()->back();
        /*return redirect()->route('Product_index')->with('status', 'Data deleted successfully');*/
    }
    
    public function show_product_projects($id)
    { 
        $product_id = $id;
        
        $list_product_projects  = DB::table('product_projects')
                                ->join('projects', 'projects.id', '=', 'product_projects.project_id')
                                ->where('product_projects.product_id', $product_id)
                                ->select('product_projects.*', 'projects.title', 'projects.image')
                                ->get();
                                
        return view('admin.product.product-projects',compact('list_product_projects', 'product_id'));
    }
    
    public function add_product_project(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
        ]);
        

        $data = DB::table('product_projects')->insert([
            'product_id' => $request->product_id,
            'project_id' => $request->project_id,
        ]);

        if ($data) {
            return redirect()->back();
            /*return redirect()->route('Product_index')->with('status', 'Data inserted successfully');*/
        }
    }
    
    public function delete_product_project($id)
    {
        $product_project_id = $id;
    
        $delete_query   = DB::table('product_projects')
                        ->where('id', $product_project_id)
                        ->delete();
        
        return redirect()->back();
        /*return redirect()->route('Product_index')->with('status', 'Data deleted successfully');*/
    }
}
