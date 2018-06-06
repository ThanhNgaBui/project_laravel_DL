<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Travel_handbookModel;
use Session;

class Travel_handbookController extends Controller
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
            $travel_handbook = travel_handbookModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $travel_handbook = travel_handbookModel::orderBy('id', 'DESC')->paginate(5);
        }
        return view('admin.travel_handbook.show', ['travel_handbook' => $travel_handbook]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.travel_handbook.create');
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
            $path = public_path('uploads/travel_handbook');
            $file->move($path, $image);
        }
        $p = new travel_handbookModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/travel_handbook');
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
        $travel_handbook = travel_handbookModel::findOrFail($id);
        return view('admin.travel_handbook.edit', ['travel_handbook' => $travel_handbook]);
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
        $travel_handbook = travel_handbookModel::findOrFail($id);
        $image = $travel_handbook->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/travel_handbook');
            $file->move($path, $image);
        }

        $travel_handbook->title= $request->title;
        $travel_handbook->image= $image;
        $travel_handbook->hot = $request->hot;
        $travel_handbook->information = $request->information;
        $travel_handbook->introduce = $request->introduce;
        $travel_handbook->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/travel_handbook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel_handbook = travel_handbookModel::findOrFail($id);
        $travel_handbook->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/travel_handbook');
    }
}
