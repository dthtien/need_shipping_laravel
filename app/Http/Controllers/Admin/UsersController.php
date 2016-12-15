<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
                $users = User::paginate(15);
                return view('admin.users.index', compact('users'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {

                $roles = Role::select('id', 'name', 'label')->get();

                return view('admin.users.create', compact('roles'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
                $this->validate($request, ['name' => 'required', 'email' => 'required', 'password' => 'required', 'roles' => 'required']);

                $data = $request->except('password');
                $data['password'] = bcrypt($request->password);
                $user = User::create($data);

                foreach ($request->roles as $role) {
                    $user->assignRole($role);
                }

                Session::flash('flash_message', 'User added!');

                return redirect('admin/users');
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {

                $user = User::findOrFail($id);

                return view('admin.users.show', compact('user'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
                $roles = Role::select('id', 'name', 'label')->get();

                $user = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
                $user_roles = [];
                foreach ($user->roles as $role) {
                    $user_roles[] = $role->name;
                }

                return view('admin.users.edit', compact('user', 'roles', 'user_roles'));
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int      $id
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
                $this->validate($request, ['name' => 'required', 'email' => 'required', 'roles' => 'required']);

                $data = $request->except('password');
                if ($request->has('password')) {
                    $data['password'] = bcrypt($request->password);
                }

                $user = User::findOrFail($id);
                $user->update($data);

                $user->roles()->detach();
                foreach ($request->roles as $role) {
                    $user->assignRole($role);
                }

                Session::flash('flash_message', 'User updated!');

                return redirect('admin/users');
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
                User::destroy($id);

                Session::flash('flash_message', 'User deleted!');

                return redirect('admin/users');
            }
            else
            {
                return redirect('home');
            }
        }
        else
        {
            return redirect('login');
        }
    }
}
