<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
   public function index(){
        return view('admin.dashboard');
    }

    // register for new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'address' => 'no address',
            'number_phone' => 'no number phone',
            'last_name' => ''

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('customer.dashboard', absolute: false));
    }

    // create new user for customer
    public function regster()
    {
        return view('auth.register');
    }

    // get list user
    public function list()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    // create new user from admin
    public function create()
    {
        return view('admin.user.create');
    }

    public function save(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required'],
                'lastname' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string'],
                'number_phone' => ['required', 'integer'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'address' => $request->address,
                'number_phone' => $request->number_phone,
                'last_name' => $request->lastname,

            ]);

            flash()->success('Operation completed successfully.');
            return to_route('user.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        try{

            $user = User::findOrFail($request->id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'address' => $request->address,
                'number_phone' => $request->number_phone,
                'last_name' => $request->lastname,

            ]);

            flash()->success('Operation completed successfully.');
            return to_route('user.index');
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = User::findOrFail($request->id)->delete();
            flash()->success('Operation completed successfully.');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
}
