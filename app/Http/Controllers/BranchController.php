<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $query = Branch::query();

         // Apply search filter if 'name' is provided
         if (!empty($request->name)) {
             $query->where('name', 'LIKE', '%' . $request->name . '%');
         }

         // Paginate and fetch the branches
         $branches = $query->orderBy('id', 'DESC')->paginate(5);

         return view('branch.branch', compact('branches'));
     }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branch.add_branch');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string',
            'address'=>'string',
        ]);
        // $input = $request->all();
        $branch=new branch();
        $branch->name=$request->name;
        $branch->address=$request->address;
        $branch->save();
        toastr()->success('Data uploaded successfully','congratulation');

        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(branch $branch)
    {
        return view('branch.branch_detail',compact('branch'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($branch)
{
    $branches = Branch::find($branch);
    return view('branch.edite_branch', compact('branches'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, branch $branch)
    {
        $request->validate([
            'name'=>'string',
            'address'=>'string',
        ]);
        $branch->name=$request->name;
        $branch->address=$request->address;
        $branch->save();
        toastr()->success('Data Updated successfully','congratulation');
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(branch $branch)
{
    $branch->delete();
    toastr()->success('Data has been deleted successfully','congratulation');

    return response()->json(['success' => true, 'message' => 'Deleted successfully']);
}
}
