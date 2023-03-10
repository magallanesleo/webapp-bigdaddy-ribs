<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        return view('users.users', [
            'Header' => 'User Management',
            'users' => User::all()
        ]);
    }

    public function form()
    {
        return view('users.form', [
            'header' => 'Add User',
        ]);
    }

    
    public function store(Request $request)
    {
        //For Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        //For Validation after restoring
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('status', 'Added User Successfully!');

        // Redirect to the List of Users
        return redirect('/users');

    }
    

    // Update 
    public function show($id)
    {
        $user = User::find($id);

        return view('users.form',[
            'header'    => 'Update User',
            'user'      => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        
        //For Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [Rules\Password::defaults()],
        ]);

        $user = User::find($id);

        $user->update($request->all());

        session()->flash('status', 'Updated User Successfully!');

        return redirect('/users/update/' . $user->id);
    }

    /* ------------------------------------- */


    // DELETE USER

    public function show2($id)
    {
        $user = User::all();

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        session()->flash('status', 'Delete User Successfully!');

        return redirect('/users');
    }

    /* ------------------------------------- */

    public function show1($id)
    {
        $user = User::find($id);

        return view('users.form',[
            'header'    => 'Change Password',
            'user'      => $user
        ]);
    }

    public function password(Request $request, $id)
    {
        $request->validate([
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        session()->flash('status', 'Change Password Successfully!');

        return redirect('/users/password/' . $user->id);
    }

}
 