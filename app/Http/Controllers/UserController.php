<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
         $query = User::query();

         // Apply search filter if 'name' is provided
         if (!empty($request->name)) {
             $query->where('name', 'LIKE', '%' . $request->name . '%');
         }

         // Paginate and fetch the branches
         $users = $query->orderBy('id', 'DESC')->paginate(5);

         return view('users.users', compact('users'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'phone'=>'numeric|',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'image.image' => 'Please upload an image in format (jpeg, png, jpg, gif, svg) and size must not exceed 4MB',
        ]);
        $image = $request->file('image');
        $new_image_name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/'), $new_image_name);
        // $path="uploads/".$new_image_name;

        $user = User::create([
            'name' => $request->name,
            'image'=>$new_image_name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        toastr()->success('Data has been uploaded successfully','congratulation');
        // return redirect(RouteServiceProvider::USER);
        return redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::find($id);
        return view('users.user_details',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
     $users=User::find($id);

      return view('users.eidtuser',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

      $users=User::find($id);
    //   return $users;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'phone'=>'numeric|',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'image.image' => 'Please upload an image in format (jpeg, png, jpg, gif, svg) and size must not exceed 4MB',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/'.$users->image))) {
                File::delete(public_path('uploads/'.$users->image));
            }
            $image = $request->file('image');
            $new_image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $new_image_name);
            // $path="/uploads/brands/".$new_image_name;
            $users->image = $new_image_name;

        }


            $users->name = $request->name;
            $users->image=$new_image_name;
            $users->email = $request->email;
            $users->phone=$request->phone;
            $users->password = Hash::make($request->password);
            $users->save();


        event(new Registered($users));

        // Auth::login($users);
        toastr()->success('Data has been updated successfully','congratulation');
        // return redirect(RouteServiceProvider::USER);
        return redirect()->route('user.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)

    {
        $user=User::find($id);
        $imagePath = public_path('uploads/' . $user->image);
        if ($user->image && file_exists($imagePath)) {
            unlink($imagePath);
        }
        $user->delete();
        toastr()->success('Data has been deleted successfully','congratulation');

        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }


    public function toggleRole(Request $request,$id){
        $user=User::findOrFail($id);
         $user->type=($request->has('type')) ? "admin":"user";

    // if ($request->has('role')) {
    //   $user->role = "admin";
    //    } else {
    //    $user->role = "user";
    //    }

      //$user->save();

        $user->save();

        toastr()->success('Your user has been changed.','congrogulation');
        return redirect()->back();



    }
    public function toggleStatus(Request $request,$id){
        $user=User::findOrFail($id);
         $user->status=($request->has('status')) ? "active":"inactive";

    // if ($request->has('role')) {
    //   $user->role = "admin";
    //    } else {
    //    $user->role = "user";
    //    }

      //$user->save();

        $user->save();

        toastr()->success('Your status has been changed to   '.$user->status,'congrogulation');
        return redirect()->back();



    }
}
