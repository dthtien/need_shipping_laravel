<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Session;
use Auth;

class AdminController extends Controller
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
            return view('admin.dashboard');
           } else
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
     * Display given permissions to role.
     *
     * @return void
     */
    public function getGiveRolePermissions()
    {
    if(Auth::check()){ 
        if(Auth::user()->level==1)
            {
        $roles = Role::select('id', 'name', 'label')->get();
        $permissions = Permission::select('id', 'name', 'label')->get();

        return view('admin.permissions.role-give-permissions', compact('roles', 'permissions'));
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
     * Store given permissions to role.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    public function postGiveRolePermissions(Request $request)
    {
    if(Auth::check()){ 
        if(Auth::user()->level==1)
            {
        $this->validate($request, ['role' => 'required', 'permissions' => 'required']);

        $role = Role::with('permissions')->whereName($request->role)->first();
        $role->permissions()->detach();

        foreach ($request->permissions as $permission_name) {
            $permission = Permission::whereName($permission_name)->first();
            $role->givePermissionTo($permission);
        }

        Session::flash('flash_message', 'Permission granted!');

        return redirect('admin/roles');
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
