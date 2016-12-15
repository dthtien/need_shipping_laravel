<?php

namespace App\Http\Controllers\BaiDangController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BaiDang;
use Illuminate\Http\Request;
use Session;
use Auth;

class BaiDangController extends Controller
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
                $baidang = BaiDang::paginate(25);
                return view('admin.bai-dang.index', compact('baidang'));
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
                return view('admin.bai-dang.create');
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
                
                BaiDang::create($requestData);

                Session::flash('flash_message', 'BaiDang added!');

                return redirect('admin/bai-dang');
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
            $baidang = BaiDang::findOrFail($id);

            return view('admin.bai-dang.show', compact('baidang'));
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
                $baidang = BaiDang::findOrFail($id);

                return view('admin.bai-dang.edit', compact('baidang'));
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
                
                $baidang = BaiDang::findOrFail($id);
                $baidang->update($requestData);

                Session::flash('flash_message', 'BaiDang updated!');

                return redirect('admin/bai-dang');
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
                BaiDang::destroy($id);

                Session::flash('flash_message', 'BaiDang deleted!');

                return redirect('admin/bai-dang');
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
