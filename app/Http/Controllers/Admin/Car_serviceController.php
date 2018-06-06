<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Car_serviceModel;
use Session;

class Car_serviceController extends Controller
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
            $car_service = Car_serviceModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $car_service = Car_serviceModel::orderBy('id', 'DESC')->paginate(5);
        }
        return view('admin.car_service.show', ['car_service' => $car_service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car_service.create');
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
            $path = public_path('uploads/car_service');
            $file->move($path, $image);
        }
        $p = new Car_serviceModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->table_price = $request->table_price;
        $p->price = $request->price;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/car_service');
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
        $car_service = Car_serviceModel::findOrFail($id);
        return view('admin.car_service.edit', ['car_service' => $car_service]);
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
        $car_service = Car_serviceModel::findOrFail($id);
        $image = $car_service->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/car_service');
            $file->move($path, $image);
        }

        $car_service->title= $request->title;
        $car_service->image= $image;
        $car_service->hot = $request->hot;
        $car_service->information = $request->information;
        $car_service->introduce = $request->introduce;
        $car_service->table_price = $request->table_price;
        $car_service->price = $request->price;
        $car_service->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/car_service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_service = Car_serviceModel::findOrFail($id);
        $car_service->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/car_service');
    }
}
