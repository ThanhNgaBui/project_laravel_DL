<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food_informationModel;
use Session;

class Food_informationController extends Controller
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
            $food_information = Food_informationModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $food_information = Food_informationModel::orderBy('id', 'DESC')->paginate(5);
        }
        return view('admin.food_information.show', ['food_information' => $food_information]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food_information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
        ]);
        $image = 'no-image.jpg';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/food_information');
            $file->move($path, $image);
        }
        $p = new Food_informationModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/food_information');
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
        $food_information = Food_informationModel::findOrFail($id);
        return view('admin.food_information.edit', ['food_information' => $food_information]);
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
        $food_information = Food_informationModel::findOrFail($id);
        $image = $food_information->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/food_information');
            $file->move($path, $image);
        }

        $food_information->title= $request->title;
        $food_information->image= $image;
        $food_information->hot = $request->hot;
        $food_information->information = $request->information;
        $food_information->introduce = $request->introduce;
        $food_information->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/food_information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food_information = Food_informationModel::findOrFail($id);
        $food_information->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/food_information');
    }
}
