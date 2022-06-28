<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::get();
        return view('user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('user')->role === 'admin') {
            return view('user.create');
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        if (User::create($data))
            session()->flash('status', 'success');
        else
            session()->flash('status', 'error');

        return redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        //$info = User::find($user->id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if (session('user')->role === 'admin' || session('user')->_id === $user->_id) {
            return view('user.edit', ['user' => $user]);
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        if (session('user')->role === 'admin' || session('user')->_id === $user->_id) {
            $data = $request->validated();
            if (session('user')->_id === $user->_id && session('user')->role !== 'admin' && !Hash::check($request->old_password, $user->password)) {
                session()->flash('status', 'error');
                return redirect()->route('user.edit', ['user' => $user]);
            }
            $data['password'] = bcrypt($data['password']);
            $user->update($data);
            session()->flash('status', 'success');
            return redirect()->route('user.edit', ['user' => $user]);
        } else return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (session('user')->role === 'admin') {
            $user->delete();
            return redirect()->route('user.index');
        } else
            return abort(403);
    }
}