<?php

namespace App\Http\Controllers;

use App\Models\purchase_Type;
use Illuminate\Http\Request;

class PurchaseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = purchase_Type::query();

        // Apply search filter if 'name' is provided
        if (!empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Paginate and fetch the branches
        $purchase_Types = $query->orderBy('id', 'DESC')->paginate(5);

        return view('purchase_type.purchase', compact('purchase_Types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase_type.add_purchase');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description'=>'required|string',
        ]);
        $purchase_Type=new purchase_Type ;
        $purchase_Type->name=$request->name;
        $purchase_Type->description=$request->description;
        $purchase_Type->save();
        toastr()->success('Data has been uploaded successfully','congratulation');
        // return redirect(RouteServiceProvider::USER);
        return redirect()->route('purchase_type.index');



    }

    /**
     * Display the specified resource.
     */
    public function show( $purchase_Type)
    {
        $purchase_Type=purchase_Type::find($purchase_Type);
    return view('purchase_type.purchaseTypedetails',compact('purchase_Type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $purchase_Type)
    {
        $purchase_Type=purchase_Type::find($purchase_Type);
     return view('purchase_type.purchaseTypeEdit',compact('purchase_Type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $purchase_Type)
    {

      $users=purchase_Type::find($purchase_Type);
      //   return $users;
          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'description' => ['required', 'string'],

          ]);

              $users->name = $request->name;
              $users->description= $request->description;
              $users->save();

          toastr()->success('Data has been updated successfully','congratulation');
          // return redirect(RouteServiceProvider::USER);
          return redirect()->route('purchase_type.index');
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $purchase_Type)
    {
        $purchase_Type=purchase_Type::find($purchase_Type);
        $purchase_Type->delete();
        toastr()->success('Data has been deleted successfully','congratulation');
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
