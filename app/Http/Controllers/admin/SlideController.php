<?php

namespace App\Http\Controllers\admin;

use App\Silde;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    //hiển thị danh sách slide
    public function view(){
        $slide = Silde::all();
        return view('admin.slide.view',compact('slide'));
    }
    //hiển thị form thêm slide
    public function add(){
        return view('admin.slide.add');
    }
    //xử lý thêm danh mục
    public function postAdd(Request $request){
//        $this->validate($request,[
//            'param_name' => 'required|name,catalog'
//        ],[
//            'param_name.name' => 'Tên danh mục đã tồn tại'
//        ]);
        $slide = new Silde();
        $file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();
        if ($duoi != 'jpg' && $duoi != 'png') {
            return redirect('admin/slide/add.html')->with('thongbao', 'Bạn phải chọn file ảnh')->withInput();
        }

        do {
            $name = str_random(4).$file->getClientOriginalName();
        }while ((file_exists("source/image/slide/.$name")) );

        $file->move('source/image/slide/', $name);
        $slide->image = $name;
        $slide->save();
        return redirect('admin/slide/add.html')->with('thongbao', 'Thêm slide thành công');
    }
    //hiển thị form sửa thông tin danh muc
    public function edit($id){
        $slide = Silde::find($id);
        if(!$slide) return view('admin.product.error');
        return view('admin.slide.edit',compact('slide'));
    }
    //xử lý sửa thông tin danh muc
    public function postEdit($id,Request $request){
        $slide = Silde::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/slide/edit/'.$id.'.html')->with('loi', 'Bạn phải chọn file ảnh')->withInput();
            }
            $tencu = $file->getClientOriginalName();
            do {
                $name = str_random(4).$file->getClientOriginalName();
            }while ((file_exists("source/image/slide/.$name")) );

            $slide->image = $name;
            $file->move('source/image/slide/',$name);
            if(file_exists("source/image/slide/".$tencu))
                unlink('source/image/slide/'.$tencu);
        }
        $slide->save();
        return redirect('admin/slide/edit/'.$id.'.html')->with('thongbao', 'Chỉnh sửa danh mục thành công');
    }
    //xóa danh muc
    public function delete($id){
        $slide = Silde::find($id);
        if(!$slide) return view('admin.product.error');
        $slide->delete();
        return redirect('admin/slide/view.html')->with('thongbao','Xóa slide thành công');
    }
}
