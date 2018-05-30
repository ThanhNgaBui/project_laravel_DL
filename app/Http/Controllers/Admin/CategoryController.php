<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('keyword')){
            $keyword = $request->get('keyword');
            $category = CategoryModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $category = CategoryModel::paginate(5);
        }
        
        return view('admin.category.show', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $category = new CategoryModel();
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        Session::flash('success', "Tạo mới thành công");
        return redirect('admin/category');
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
        $category = CategoryModel::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
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
        $category = CategoryModel::findOrFail($id);
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        Session::flash('success',"Chỉnh sửa danh mục thành công");
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);
        $category->delete();
        Session::flash('success',"Xóa danh mục thành công");
        return redirect('admin/category');
    }
}
