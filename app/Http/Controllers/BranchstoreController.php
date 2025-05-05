<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\branchstore;
use App\Models\company;
use App\Models\product_type;
use Illuminate\Http\Request;

class BranchstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = branchStore::query();

        // Apply search filter if 'name' is provided
        if (!empty($request->product_id)) {
            $query->where('product_id', 'LIKE', '%' . $request->product_id . '%');
        }

        // Paginate and fetch the branches
        $branchStores = $query->orderBy('id', 'DESC')->paginate(5);
        $products=product_type::pluck('name', 'id');
        $companies=company::pluck('name', 'id');
        $branches=branch::pluck('name', 'id');

        return view('branch_store.branch_store', compact('branchStores','branches','companies','products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=product_type::pluck('name', 'id');
        $companies=company::pluck('name', 'id');
        $branches=branch::pluck('name', 'id');

       return view('branch_store.add_branchstore',compact('products','companies','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // ✅ Step 1: Validate the request
           $request->validate([
            'branch_id'            => 'required|',
            'product_id'           => 'required|',
            'company_id'           => 'required|',
            'product_in_count'     => 'required|numeric|min:1',
            'price'        => 'required|numeric|min:0',
            'total_price'  => 'required|numeric|min:0',
            'date'      => 'required|date',
            'description'          => 'nullable|string',
        ]);

        // ✅ Step 2: Save the entry
        $product_store = new branchstore();
        $product_store->branch_id =$request->branch_id;
        $product_store->product_id =$request->product_id;
        $product_store->company_id =$request->company_id;
        $product_store->product_in_count=$request->product_in_count;
        $product_store->price =$request->price;
        $product_store->total_price =$request->total_price;
        $product_store->date =$request->date;
        $product_store->description  =$request->description;

        $product_store->save();

        toastr()->success('Data uploaded successfully','congratulation');
        return redirect()->route('branch-store.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($branchstore )
    {
        $branchStore=branchstore::find($branchstore);
        return view('branch_store.branchstore_detail',compact('branchStore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(branchstore $branchstore)
    {
        $products=product_type::pluck('name', 'id');
        $companies=company::pluck('name', 'id');
        $branches=branch::pluck('name', 'id');
        return  view('branch_store.add_branchstore',compact('branchstore','products','companies','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, branchstore $branchstore)
    {
        $product_store=$branchstore;
        $request->validate([
            'branch_id'            => 'required|',
            'product_id'           => 'required|',
            'company_id'           => 'required|',
            'product_in_count'     => 'required|numeric|min:1',
            'price'        => 'required|numeric|min:0',
            'total_price'  => 'required|numeric|min:0',
            'date'      => 'required|date',
            'description'          => 'nullable|string',
        ]);

        // ✅ Step 2: Save the entry
        $product_store->branch_id =$request->branch_id;
        $product_store->product_id =$request->product_id;
        $product_store->company_id =$request->company_id;
        $product_store->product_in_count=$request->product_in_count;
        $product_store->price =$request->price;
        $product_store->total_price =$request->total_price;
        $product_store->date =$request->date;
        $product_store->description  =$request->description;

        $product_store->save();

        toastr()->success('Data updated successfully','congratulation');
        return redirect()->route('branch-store.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $branchstore)
    {
        $branchstores= branchstore::findOrFail($branchstore);
        $branchstores->delete();
        toastr()->success('Data has been deleted successfully','congratulation');
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);


    }
}
