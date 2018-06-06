<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AttractionsModel;
use Session;

class AttractionsController extends Controller
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
            $attractions = AttractionsModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $attractions = AttractionsModel::orderBy('id', 'DESC')->paginate(5);
        }
        return view('admin.attractions.show', ['attractions' => $attractions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attractions.create');
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
            $path = public_path('uploads/attractions');
            $file->move($path, $image);
        }
        $p = new AttractionsModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/attractions');
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
        $attractions = AttractionsModel::findOrFail($id);
        return view('admin.attractions.edit', ['attractions' => $attractions]);
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
        $attractions = AttractionsModel::findOrFail($id);
        $image = $attractions->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/attractions');
            $file->move($path, $image);
        }

        $attractions->title= $request->title;
        $attractions->image= $image;
        $attractions->hot = $request->hot;
        $attractions->information = $request->information;
        $attractions->introduce = $request->introduce;
        $attractions->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/attractions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attractions = AttractionsModel::findOrFail($id);
        $attractions->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/attractions');
    }
}
