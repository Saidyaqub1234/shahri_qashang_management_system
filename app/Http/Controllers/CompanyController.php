<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = company::query();

        // Apply search filter if 'name' is provided
        if (!empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Paginate and fetch the branches
        $companies = $query->orderBy('id', 'DESC')->paginate(5);

        return view('company.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.add_company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>'string',
            "phone"=>'numeric|',
            "email"=>'email',
            'address'=>'string',
            "country"=>'string|',
            "dollor_account"=>'numeric',
            "afghani_account"=>'numeric',
            "kaldar_account"=>'numeric',
            "description"=>'string',

        ]);
        $company=new company;
        $company->name=$request->name;
        $company->phone=$request->phone;
        $company->email=$request->email;
        $company->country=$request->country;
        $company->address=$request->address;
        $company->dollor_account=$request->dollor_account;
        $company->afghani_account=$request->afghani_account;
        $company->kaldar_account=$request->kaldar_account;
        $company->description=$request->description;
        $company->save();
        toastr()->success('congratulation','Data uploaded successfully');
        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
       return view("company.company_details",compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
       return view('company.editcompany',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        $request->validate([
            "name"=>'string',
            "phone"=>'numeric|',
            "email"=>'email',
            'address'=>'string',
            "country"=>'string|',
            "dollor_account"=>'numeric',
            "afghani_account"=>'numeric',
            "kaldar_account"=>'numeric',
            "description"=>'string',

        ]);
        $company->name=$request->name;
        $company->phone=$request->phone;
        $company->email=$request->email;
        $company->country=$request->country;
        $company->address=$request->address;
        $company->dollor_account=$request->dollor_account;
        $company->afghani_account=$request->afghani_account;
        $company->kaldar_account=$request->kaldar_account;
        $company->description=$request->description;
        $company->save();
        toastr()->success('congratulation','Data updated successfully');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        $company->delete();
        toastr()->success('Data has been deleted successfully','congratulation');
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
