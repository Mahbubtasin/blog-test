<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Category::all();

        return view('admin.category.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
        $this->validate($request,[
           'name' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = 1;
        $category->save();
        return redirect('back/category')->with('success', "Category Created Successfully");
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
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));

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
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('back/category')->with('success', "Category Updated Successfully");
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
        $category = Category::find($id);

        $category->delete();

        return redirect('back/category')->with('success', "Category Deleted Successfully");
    }

    public function status($id)
    {
        $category = Category::find($id);
        if ($category->status === 1)
        {
            $category->status = 0;
        }
        else
        {
            $category->status = 1;
        }
        $category->save();
        return redirect('back/category')->with('success', "Category Status Successfully");
    }
}
