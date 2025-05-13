<?php

namespace App\Http\Controllers;

use App\Models\Saraf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SarafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
        {
            $query = Saraf::query();

            // Apply search filter if 'name' is provided
            if (!empty($request->name)) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            }

            // Paginate and fetch the branches
            $sarafs = $query->orderBy('id', 'DESC')->paginate(5);

        return view('saraf.saraf', compact('sarafs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('saraf.add_saraf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'shop_number' => 'required|string',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $new_image_name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/saraf_images'), $new_image_name);

        Saraf::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'shop_number' => $request->shop_number,
            'address' => $request->address,
            'description' => $request->description,
            'image' => $new_image_name,
        ]);
        toastr()->success('Data has been uploaded successfully','congratulation');
        return redirect()->route('saraf.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $saraf)
    {
        $saraf=Saraf::find($saraf);
        return view('saraf.show', compact('saraf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saraf $saraf)
    {
        return view('saraf.Edit_saraf', compact('saraf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $saraf)
    {
        $saraf=Saraf::find($saraf);
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'shop_number' => 'required|string',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/saraf_images'.$saraf->image))) {
                File::delete(public_path('uploads/saraf_images'.$saraf->image));
            }
            $image = $request->file('image');
            $new_image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/saraf_images'), $new_image_name);
            // $path="/uploads/brands/".$new_image_name;
            $saraf->image = $new_image_name;

        }

        $saraf->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'shop_number' => $request->shop_number,
            'address' => $request->address,
            'description' => $request->description,
            'image' => $saraf->image,
        ]);
        toastr()->success('Saraf updated successfully','congratulation');
        return redirect()->route('saraf.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $saraf)
    {
        $saraf=Saraf::find($saraf);
        $imagePath = public_path('uploads/saraf_images/'. $saraf->image);
        if ($saraf->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $saraf->delete();

        toastr()->success('Your Data has been Deleted    ','congratulation');
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
