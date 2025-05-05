<?php

namespace App\Http\Controllers;

use App\Models\Currancy;
use Illuminate\Http\Request;

class CurrancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
         $query = Currancy::query();

         // Apply search filter if 'name' is provided
         if (!empty($request->name)) {
             $query->where('currency_name', 'LIKE', '%' . $request->name . '%');
         }

         // Paginate and fetch the branches
         $currencies = $query->orderBy('id', 'DESC')->paginate(5);

         return view('currencies.currencies', compact('currencies'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('currencies.add_currency');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_name'=>'string',
            'currency_description'=>'string',
        ]);
        // $input = $request->all();
        $Currency=new Currancy;
        $Currency->currency_name=$request->currency_name;
        $Currency->currency_description=$request->currency_description;
        $Currency->save();
        toastr()->success('congratulation','Form stored successfully');
        return redirect()->route('currency.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $Currency)
    {
        $currency=Currancy::find($Currency);
        return view('currencies.show',compact("currency"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currancy $Currency)
    {
        $currency=$Currency;
        return view('currencies.editCurrency',compact("currency"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$Currency)
    {
        $Currency=Currancy::find($Currency);
        $Currency->currency_name=$request->currency_name;
        $Currency->currency_description=$request->currency_description;
        $Currency->save();
        toastr()->success('Data Updated successfully','congratulation');
        return redirect()->route('currency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($currency)
    {
        $currency=Currancy::findOrFail($currency);
        $currency->delete();
        toastr()->error('Data Deleted successfully','congratulation');

        return response()->json(['success' => true, 'message' => 'Deleted successfully']);





    }
}
