<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index(Request $request)
    {
       
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.add_users');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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
        $path="uploads/".$new_image_name;

        $user = User::create([
            'name' => $request->name,
            'image'=>$path,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        toastr()->success('Data has been uploaded successfully','congratulation');
        // return redirect(RouteServiceProvider::USER);
        return redirect()->back();
    }
}
