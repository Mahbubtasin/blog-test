<?php

namespace App\Http\Controllers;

use App\Author;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::where('user_type', 2)->get();

        return view('admin.author.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('name', 'id');

        return view('admin.author.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $roles
     * @return void
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role.*' => 'required'
        ],
            [
                'name.required' => 'Name Required',
                'email.email' => 'Invalid Email',
                'email.unique' => 'Email Already Exits',
                'password.size' => 'Password Must Be 6 Character or More',
            ]);

        $store = new User();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->user_type = 2;
        $store->save();
        foreach ($request->role as $value)
        {
             $store->attachRole($value);
        }
        return redirect('back/author')->with('success', "Author Created Successfully");
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
        $author = User::find($id);
        $roles = Role::pluck('name', 'id');
        $select_roles = DB::table('role_user')->where('user_id', $id)->pluck('role_id');
        return view('admin.author.edit', compact('roles', 'select_roles', 'author'));
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
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|size: 6',
            'role.*' => 'required'
        ],
            [
                'name.required' => 'Name Required',
                'email.email' => 'Invalid Email',
                'password.size' => 'Password Must Be 6 Character or More',
            ]);

        $store = User::find($id);
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->save();
        DB::table('role_user')->where('user_id', $id)->delete();
        foreach ($request->roles as $value)
        {
            $store->attachRole($value);
        }
        return redirect('back/author')->with('success', "Author Updated Successfully");
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
        User::find($id)->delete();

        return redirect()->back()->with('success', "Author Deleted Successfully");
    }
}
