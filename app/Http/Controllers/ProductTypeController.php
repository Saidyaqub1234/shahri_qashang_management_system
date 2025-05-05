<?php

namespace App\Http\Controllers;

use App\Models\product_type;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
         $query = product_type::query();

         // Apply search filter if 'name' is provided
         if (!empty($request->name)) {
             $query->where('name', 'LIKE', '%' . $request->name . '%');
         }

         // Paginate and fetch the branches
         $products = $query->orderBy('id', 'DESC')->paginate(5);

         return view('products.product', compact('products'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string',
            'description'=>'string',
        ]);
        // $input = $request->all();
        $product_type=new product_type;
        $product_type->name=$request->name;
        $product_type->description=$request->description;
        $product_type->save();
        toastr()->success('congratulation','Form stored successfully');
        return redirect()->route('product-type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(product_type $product_type)
    {
        $product=$product_type;
        return view('products.product_details',compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_type $product_type)
    {
        $product=$product_type;
        return view('products.editproduct',compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product_type $product_type)
    {
        $product_type->name=$request->name;
        $product_type->description=$request->description;
        $product_type->save();
        toastr()->success('Data Updated successfully','congratulation');
        return redirect()->route('product-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_type $product_type)
    {
        $product_type->delete();
        toastr()->error('Data Deleted successfully','congratulation');

        return response()->json(['success' => true, 'message' => 'Deleted successfully']);

        



    }
}
