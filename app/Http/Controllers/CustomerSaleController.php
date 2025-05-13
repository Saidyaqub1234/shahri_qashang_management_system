<?php

namespace App\Http\Controllers;

use App\Models\CustomerSale;
use App\Models\ProductType;
use App\Models\Currancy; // or Currency if corrected
use App\Models\Customer;
use App\Models\Branch;
use App\Models\product_type;
use Illuminate\Http\Request;

class CustomerSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CustomerSale::with('product_type');

        // Filter by product type name (via relationship)
        if (!empty($request->product_type)) {
            $query->whereHas('product_type', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->product_type . '%');
            });
        }

        $customerSales = $query->latest()->paginate(10);

        return view('customer_sale.customers_sales', compact('customerSales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productTypes = product_type::all();
        $currencies = Currancy::all(); // or Currency::all()
        $customers = Customer::all();
        $branches = Branch::all();

        return view('customer_sale.add_customer_sale', compact('productTypes', 'currencies', 'customers', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_id'        => 'required|exists:branches,id',
            'sale_count'       => 'required|numeric',
            'price'            => 'required|numeric',
            'dollar'           => 'nullable|numeric',
            'afghani'          => 'nullable|numeric',
            'kaldar'           => 'nullable|numeric',
            'description'      => 'nullable|string|max:1000',
        ]);

        CustomerSale::create($request->all());
        toastr()->success('Data has been Uploaded successfully','congratulation');
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $customerSale)
    {
        $customerSale= CustomerSale::find($customerSale);
        $customerSale->load('product_type', 'currency', 'customer', 'branch');

        return view('customer_sale.show', compact('customerSale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $customerSale)
    {
        $customerSale=CustomerSale::find($customerSale);
        $productTypes = product_type::all();
        $currencies = Currancy::all();
        $customers = Customer::all();
        $branches = Branch::all();

        return view('customer_sale.edit', compact('customerSale', 'productTypes', 'currencies', 'customers', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerSale $customerSale)
    {
        $request->validate([
            'sale_count'       => 'required|numeric',
            'price'            => 'required|numeric',
            'dollar'           => 'nullable|numeric',
            'afghani'          => 'nullable|numeric',
            'kaldar'           => 'nullable|numeric',
            'description'      => 'nullable|string|max:1000',
        ]);

        $customerSale->update($request->all());
        toastr()->success('Customer sale updated successfully.','congratulation');
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $customerSale)
    {
       $customerSale=CustomerSale::find($customerSale);
        $customerSale->delete();
        toastr()->success('Customer Deleted successfully.','congratulation');
        return response()->json(['message' => 'Customer sale deleted successfully.']);
    }
}
