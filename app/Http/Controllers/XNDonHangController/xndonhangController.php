<?php

namespace App\Http\Controllers\XNDonHangController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\xndonhang;
use Illuminate\Http\Request;
use Session;

class xndonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        $xndonhang = xndonhang::paginate(25);
        return view('xndonhang.index', compact('xndonhang'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        return view('xndonhang.create');
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
                if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        $requestData = $request->all();
        
        xndonhang::create($requestData);

        Session::flash('flash_message', 'xndonhang added!');

        return redirect('admin/xndonhang');
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
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
         if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        $xndonhang = xndonhang::findOrFail($id);

        return view('xndonhang.show', compact('xndonhang'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::check()){ 
            if(Auth::user()->level==1)
            {

        $xndonhang = xndonhang::findOrFail($id);

        return view('xndonhang.edit', compact('xndonhang'));
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
         if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        $requestData = $request->all();
        
        $xndonhang = xndonhang::findOrFail($id);
        $xndonhang->update($requestData);

        Session::flash('flash_message', 'xndonhang updated!');

        return redirect('admin/xndonhang');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
         if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
        xndonhang::destroy($id);

        Session::flash('flash_message', 'xndonhang deleted!');

        return redirect('admin/xndonhang');
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
}
