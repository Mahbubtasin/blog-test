<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Permission::all();

        return view('admin.permission.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['name' => 'required|alpha_num'], ['name.required' => 'Name Required', 'name.alpha_num' => 'required']);

        $permission = $request->all();

        Permission::create($permission);

        return redirect('back/permission')->with('success', "Permission Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permission = Permission::find($id);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, ['name' => 'required|alpha_num'], ['name.required' => 'Name Required', 'name.alpha_num' => 'required']);

        $permission = Permission::find($id);

        $update = $request->all();

        $permission->update($update);

        return redirect('back/permission')->with('success', "Permission Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Permission::find($id)->delete();

        return redirect()->back()->with('success', "Permission Delete Successfully");
    }
}
