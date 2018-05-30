<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DetailsModel;
use App\CategoryModel;
use Session;

class DetailsController extends Controller
{
    private $_cates = [];
    private $details;
    public function __construct(){
        $categories = CategoryModel::all();
        foreach($categories as $category){
            $this->_cates[$category->id] = $category->title;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('keyword')){
            $keyword = $request->get('keyword');
            $details = DetailsModel::where('title', 'like', '%'.$keyword.'%')->paginate(5);
        }
        else{
           $details = DetailsModel::paginate(5); 
        }
        return view('admin.details.show', ['details' => $details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = CategoryModel::all();
         return view('admin.details.create', ['categories' => $this->_cates]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Bắt lỗi không nhập
        // $this->validate($request, [
        //     'title' => 'required|max:200',
        // ]);
        $image = 'no-image.jpg';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/details');
            $file->move($path, $image);
        }
        $p = new DetailsModel();
        $p->title= $request->title;
        $p->category_id= $request->category_id;
        $p->price_old= $request->price_old;
        $p->image= $image;
        $p->hot = $request->hot;
        $p->time = $request->time;
        $p->place_of_departure = $request->place_of_departure;
        $p->day_departure = $request->day_departure;
        $p->number_of_seats = $request->number_of_seats;
        $p->price_old = $request->price_old;
        $p->price_new = $request->price_new;
        $p->schedule = $request->schedule;
        $p->information = $request->information;
        $p->search_price = $request->search_price;
        $p->save();

        Session::flash('success', "Thêm mới thông tin thành công");
        return redirect('admin/details');
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
        $details = DetailsModel::findOrFail($id);
        return view('admin.details.edit', ['details' => $details, 'categories' => $this->_cates]);
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
        $details = DetailsModel::findOrFail($id);
        $image = $details->image;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $path = public_path('uploads/details');
            $file->move($path, $image);
        }

        $details->title= $request->title;
        $details->category_id= $request->category_id;
        $details->price_old= $request->price_old;
        $details->image= $image;
        $details->hot = $request->hot;
        $details->time = $request->time;
        $details->place_of_departure = $request->place_of_departure;
        $details->day_departure = $request->day_departure;
        $details->number_of_seats = $request->number_of_seats;
        $details->price_old = $request->price_old;
        $details->price_new = $request->price_new;
        $details->schedule = $request->schedule;
        $details->information = $request->information;
        $details->search_price = $request->search_price;
        $details->save();

        Session::flash('success', "Cập nhật thông tin thành công!!!");

        return redirect('admin/details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = DetailsModel::findOrFail($id);
        $details->delete();
        Session::flash('success',"Xóa danh mục thành công");
        return redirect('admin/details');
    }
}
