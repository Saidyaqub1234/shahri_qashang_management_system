<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if (!empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        $customers = $query->orderBy('id', 'DESC')->paginate(5);

        return view('customers.customer', compact('customers'));
    }

    public function create()
    {
        return view('customers.add_customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            'lastName' => "required|string",
            'fatherName' => "required|string",
            'phone' => 'required|numeric',
            'whats_app' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'dollor_amount' => 'required|numeric',
            'afghani_amount' => 'required|numeric',
            'kaldar_amount' => 'required|numeric',
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->lastName = $request->lastName;
        $customer->fatherName = $request->fatherName;
        $customer->phone = $request->phone;
        $customer->whats_app = $request->whats_app;

        $image = $request->file('image');
        $new_image_name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/Customers'), $new_image_name);
        $customer->image=$new_image_name;

        $customer->dollor_amount = $request->dollor_amount;
        $customer->afghani_amount = $request->afghani_amount;
        $customer->kaldar_amount = $request->kaldar_amount;
        $customer->save();
        toastr()->success('Data has been uploaded successfully','congratulation');
        return redirect()->route('customer.index');
    }

    public function show(Customer $customer)
    {
        return view('customers.customer_detail', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.editcustomer', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => "required|string",
            'lastName' => "required|string",
            'fatherName' => "required|string",
            'phone' => 'required|numeric',
            'whats_app' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'dollor_amount' => 'required|numeric',
            'afghani_amount' => 'required|numeric',
            'kaldar_amount' => 'required|numeric',
        ]);

        $customer->name = $request->name;
        $customer->lastName = $request->lastName;
        $customer->fatherName = $request->fatherName;
        $customer->phone = $request->phone;
        $customer->whats_app = $request->whats_app;
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/Customers/'.$customer->image))) {
                File::delete(public_path('uploads/Customers/'.$customer->image));
            }
            $image = $request->file('image');
            $new_image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/Customers/'), $new_image_name);
            // $path="/uploads/brands/".$new_image_name;

            $customer->image=$new_image_name;
        }

        $customer->dollor_amount = $request->dollor_amount;
        $customer->afghani_amount = $request->afghani_amount;
        $customer->kaldar_amount = $request->kaldar_amount;
        $customer->save();
        toastr()->success('Data has been deleted successfully','congratulation');
        return redirect()->route('customer.index');
    }

    public function destroy(Customer $customer)
    {
         $imagePath = public_path('uploads/Customers/' . $customer->image);

        if ($customer->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $customer->delete();
        toastr()->success('Data has been deleted successfully','congratulation');
        return response()->json(['success'=>true,'message'=>'Deleted successfully']);
    }
}
