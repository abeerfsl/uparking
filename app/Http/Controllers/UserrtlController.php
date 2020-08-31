<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserrtlController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('users.indexrtl', ['users' => $user->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.creatertl');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
     public function store(UserRequest $request ,User $user) {

       $user -> id = $request->input('id');
       $user -> name = $request->input('name');
       $user -> email = $request->input('email');
       $user -> email_verified_at = $request->input('email_verified_at');
       $user -> password = Hash::make($request->input('password'));

       $user->save();
       $user->attachRole('sup_admin');
         return redirect()->route('userrtl.index')->withStatus(__('User successfully created.'));
   }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('userrtl.index');
        }

        return view('users.editrtl', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('userrtl.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('userrtl.index')->withStatus(__('User successfully deleted.'));
    }
}
