<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departure_scheduleModel;
use Session;

class Departure_scheduleController extends Controller
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
            $departure_schedule = Departure_scheduleModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
            $departure_schedule = Departure_scheduleModel::paginate(5);
        }
        return view('admin.departure_schedule.show', ['departure_schedule' => $departure_schedule]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departure_schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $image = 'no-image.jpg';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/departure_schedule');
            $file->move($path, $image);
        }
        $p = new Departure_scheduleModel();
        $p->title= $request->title;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->information = $request->information;
        $p->introduce = $request->introduce;
        $p->save();

        Session::flash('success', "Thêm mới thành công");
        return redirect('admin/departure_schedule');
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
        $departure_schedule = Departure_scheduleModel::findOrFail($id);
        return view('admin.departure_schedule.edit', ['departure_schedule' => $departure_schedule]);
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
        $departure_schedule = Departure_scheduleModel::findOrFail($id);
        $image = $departure_schedule->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/departure_schedule');
            $file->move($path, $image);
        }

        $departure_schedule->title= $request->title;
        $departure_schedule->image= $image;
        $departure_schedule->hot = $request->hot;
        $departure_schedule->information = $request->information;
        $departure_schedule->introduce = $request->introduce;
        $departure_schedule->save();

        Session::flash('success', "Cập nhật thành công!!!");

        return redirect('admin/departure_schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departure_schedule = Departure_scheduleModel::findOrFail($id);
        $departure_schedule->delete();
        Session::flash('success',"Xóa thành công");
        return redirect('admin/departure_schedule');
    }
}
