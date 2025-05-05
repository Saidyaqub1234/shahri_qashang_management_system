<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Container;
use App\Models\product_type;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function index(Request $request)
    {
        $query = Container::with('product_type'); // eager load product type

        if (!empty($request->product)) {
            $query->whereHas('product_type', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->product . '%');
            });
        }

        $containers = $query->orderBy('id', 'DESC')->paginate(5);

        return view('containers.container', compact('containers'));
    }


    public function create()
    {
        $products = Product_type::pluck('name', 'id');
        $companies = Company::pluck('name', 'id');
        return view('containers.add_container', compact('products', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_type_id' => 'required|',
            'company_id' => 'required|',
            'item_count' => 'required|numeric',
            'price' => 'required|numeric',
            'total_purchase_price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Container::create($request->all());

        toastr()->success('Container created successfully', 'Congratulations');
        return redirect()->route('container.index');
    }

    public function show($id)
    {
        $container = Container::findOrFail($id);
        return view('containers.show', compact('container'));
    }

    public function edit($id)
    {
        $container = Container::findOrFail($id);
        $products = product_type::pluck('name', 'id');
        $companies = Company::pluck('name', 'id');
        return view('containers.editcontainer', compact('container', 'products', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_type_id' => 'required|numeric',
            'company_id' => 'required|numeric',
            'item_count' => 'required|numeric',
            'price' => 'required|numeric',
            'total_purchase_price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $container = Container::findOrFail($id);
        $container->update($request->all());

        toastr()->success('Container updated successfully', 'Congratulations');
        return redirect()->route('container.index');
    }

    public function destroy($id)
    {
        $container = Container::findOrFail($id);
        $container->delete();

        toastr()->success('Container deleted successfully', 'Success');
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
