<?php
/**
 * Created by PhpStorm.
 * User: quangha
 * Date: 2/13/2018
 * Time: 10:22 PM
 */

namespace App\Http\Controllers\admin;

use App\Catalog;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //hiển thị danh sách danh mục
    public function view(){
        return view('admin.catalog.view');
    }
    //hiển thị form thêm danh mục
    public function add(){
        return view('admin.catalog.add');
    }
    //xử lý thêm danh mục
    public function postAdd(Request $request){
//        $this->validate($request,[
//            'param_name' => 'required|name,catalog'
//        ],[
//            'param_name.name' => 'Tên danh mục đã tồn tại'
//        ]);
        //var_dump(count(Catalog::where('name',$request->name)->get()));
        if(count(Catalog::where('name',$request->name)->get())>0){
            return redirect('admin/catalog/add.html')->with('thongbao', 'Tên danh mục đã tồn tại')->withInput();
        }
        $catalog = new Catalog();
        $catalog->name = $request->name;
        $catalog->description = $request->mota;
        $file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();
        if ($duoi != 'jpg' && $duoi != 'png') {
            return redirect('admin/catalog/add.html')->with('thongbao', 'Bạn phải chọn file ảnh')->withInput();
        }

        do {
            $name = str_random(4).$file->getClientOriginalName();
        }while ((file_exists("source/image/catalog/.$name")) );

        $catalog->image = $name;
        $file->move('source/image/catalog/', $name);
        $catalog->save();
        return redirect('admin/catalog/add.html')->with('thongbao', 'Thêm danh mục thành công');
    }
    //hiển thị form sửa thông tin danh muc
    public function edit($id){
        $catalog = Catalog::find($id);
        if(!$catalog) return view('admin.product.error');
        return view('admin.catalog.edit',compact('catalog'));
    }
    //xử lý sửa thông tin danh muc
    public function postEdit($id,Request $request){
        $catalog = Catalog::find($id);
        if(count(Catalog::where('name',$request->name)
                ->where('name','<>',$catalog->name)
                ->get())>0){
            return redirect('admin/catalog/edit/'.$id.'.html')->with('loi', 'Tên danh mục đã tồn tại')->withInput();
        }
        $catalog->name = $request->name;
        $catalog->description = $request->mota;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/catalog/edit/'.$id.'.html')->with('loi', 'Bạn phải chọn file ảnh')->withInput();
            }
            $tencu = $file->getClientOriginalName();
            do {
                $name = str_random(4).$file->getClientOriginalName();
            }while ((file_exists("source/image/catalog/.$name")) );

            $catalog->image = $name;
            $file->move('source/image/catalog/',$name);
            if(file_exists("source/image/catalog/".$tencu))
                unlink('source/image/catalog/'.$tencu);
        }
        $catalog->save();
        return redirect('admin/catalog/edit/'.$id.'.html')->with('thongbao', 'Chỉnh sửa danh mục thành công');
    }
    //xóa danh muc
    public function delete($id){
        $catalog = Catalog::find($id);
        if(!$catalog) return view('admin.product.error');
        Product::where('id_type',$id)->delete();
        $catalog->delete();
        return redirect('admin/catalog/view.html')->with('thongbao','Xóa danh mục thành công');
    }
    //xóa nhiều danh mục
    public function deleteMultiple(Request $request){
        foreach ($request->allVals as $row){
            $catalog = Catalog::find($row);
            if(!$catalog) return response()->json('fail');
            Product::where('id_type',$row)->delete();
            $catalog->delete();
        }
        return response()->json('ok');
    }
}