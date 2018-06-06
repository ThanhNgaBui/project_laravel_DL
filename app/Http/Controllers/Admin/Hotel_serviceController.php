<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel_serviceModel;
use Session;

class Hotel_serviceController extends Controller
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
            $hotel_service = Hotel_serviceModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $hotel_service = Hotel_serviceModel::orderBy('id', 'DESC')->paginate(5);
        }
        return view('admin.hotel_service.show', ['hotel_service' => $hotel_service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel_service.create');
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
            $path = public_path('uploads/hotel_service');
            $file->move($path, $image);
        }
        $p = new Hotel_serviceModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->table_price = $request->table_price;
        $p->price = $request->price;
        $p->star = $request->star;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/hotel_service');
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
        $hotel_service = Hotel_serviceModel::findOrFail($id);
        return view('admin.hotel_service.edit', ['hotel_service' => $hotel_service]);
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
        $hotel_service = Hotel_serviceModel::findOrFail($id);
        $image = $hotel_service->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/hotel_service');
            $file->move($path, $image);
        }

        $hotel_service->title= $request->title;
        $hotel_service->image= $image;
        $hotel_service->hot = $request->hot;
        $hotel_service->information = $request->information;
        $hotel_service->introduce = $request->introduce;
        $hotel_service->table_price = $request->table_price;
        $hotel_service->price = $request->price;
        $hotel_service->star = $request->star;
        $hotel_service->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/hotel_service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel_service = Hotel_serviceModel::findOrFail($id);
        $hotel_service->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/hotel_service');
    }
}
