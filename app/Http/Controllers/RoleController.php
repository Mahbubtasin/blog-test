<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Role::all();

        return view('admin.role.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::pluck('name', 'id');

        return view('admin.role.create', compact('permission'));
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
        $this->validate($request, ['name' => 'required', 'permission' => 'required|array'], ['name.required' => 'Name Required', 'permission.required' => 'Please select permission']);

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        foreach ($request->permission as $value)
        {
            $role->attachPermission($value);
        }
        return redirect('back/role')->with('success', "Role Created Successfully");

//        $roles = $request->all();
//
//        foreach ($roles->role as $value)
//        {
//            return $value->attachPermission();
//        }
////        Role::create($roles);
////
////        return redirect('back/role')->with('success', "Role Created Successfully");
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
        $role = Role::find($id);
//
        $permission = Permission::pluck('name', 'id');
//
        $select_permission = DB::table('permission_role')->where('permission_role.role_id', $id)->pluck('permission_id');
//
        return view('admin.role.edit', compact('role', 'select_permission', 'permission'));
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
        $this->validate($request, ['name' => 'required', 'permission' => 'required|array'], ['name.required' => 'Name Required', 'permission.required' => 'Please select permission']);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        DB::table('permission_role')->where('role_id', $id)->delete();
        foreach ($request->permission as $value)
        {
            $role->attachPermission($value);
        }
        return redirect('back/role')->with('success', "Role Updated Successfully");
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
        Role::find($id)->delete();

        return redirect()->back()->with('success', "Role Deleted Successfully");
    }
}
