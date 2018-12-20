<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //hiển thị danh sách sản phẩm
    public function view(Request $request){
        $product = Product::where('id','<>',0);
        $total = count($product->get());
        $product = $product->paginate(5);
//        if(isset($request->page)&&($request->page<1||$request->page>ceil($total/5)))
//            return view('admin.product.error');
        return view('admin.product.view',[
            'product' => $product,
            'total' => $total
        ]);
    }
    //hiển thị form thông tin sản phẩm
    public function add(){
        return view('admin.product.add');
    }
    //xử lý thêm thông tin sản phẩm
    public function postAdd(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->unit_price =floatval(str_replace(',','',$request->price));
        $product->promotion_price = floatval(str_replace(',','',$request->discount));
        $product->new = $request->new;
        $product->description = $request->mota;
        $product->id_type = $request->cat;
        $file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();
        if ($duoi != 'jpg' && $duoi != 'png') {
            return redirect('admin/product/add.html')->with('thongbao', 'Bạn phải chọn file ảnh')->withInput();
        }

        do {
            $name = str_random(4).$file->getClientOriginalName();
        }while ((file_exists("source/image/product/.$name")) );

        $product->image = $name;
        $file->move('source/image/product/', $name);
        $product->save();
        return redirect('admin/product/add.html')->with('thongbao', 'Thêm sản phẩm thành công');
    }
    //hiển thị form sửa thông tin sản phẩm
    public function edit($id){
        $product = Product::find($id);
        if(!$product) return view('admin.product.error');
        return view('admin.product.edit',compact('product'));
    }
    //xử lý sửa thông tin sản phẩm
    public function postEdit($id,Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->unit_price =floatval(str_replace(',','',$request->price));
        $product->promotion_price = floatval(str_replace(',','',$request->discount));
        $product->new = $request->new;
        $product->description = $request->mota;
        $product->id_type = $request->cat;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/product/edit/'.$id.'.html')->with('loi', 'Bạn phải chọn file ảnh')->withInput();
            }
            $tencu = $file->getClientOriginalName();
            do {
                $name = str_random(4).$file->getClientOriginalName();
            }while ((file_exists("source/image/product/.$name")) );

            $product->image = $name;
            $file->move('source/image/product/',$name);
            if(file_exists("source/image/product/".$tencu))
                unlink('source/image/product/'.$tencu);
        }
        $product->save();
        return redirect('admin/product/edit/'.$id.'.html')->with('thongbao', 'Chỉnh sửa sản phẩm thành công');
    }
    //xóa sản phẩm
    public function delete($id){
        $product = Product::find($id);
        if(!$product) return view('admin.product.error');
        $product->delete();
        return redirect('admin/product/view.html')->with('thongbao','Xóa sản phẩm thành công');
    }
    //xóa nhiều sản phẩm
    public function deleteMultiple(Request $request){
        foreach ($request->allVals as $row){
            $product = Product::find($row);
            if(!$product) return response()->json('fail');
            $product->delete();
        }
        return response()->json('ok');
    }
    //tìm kiếm sản phẩm
    public function search(Request $request){
        if($request->name==''){
            $product = Product::where('id_type',$request->catalog);
            $total = count($product->get());
            $product = $product->paginate(5);
        }
        else{
            if($request->catalog==''){
                $product = Product::where('name','like',$request->name.'%');
                $total = count($product->get());
                $product = $product->paginate(5);
            }else{
                $product = Product::where('name','like',$request->name.'%')
                    ->where('id_type',$request->catalog);
                $total = count($product->get());
                $product = $product->paginate(5);
            }
        }
        if(!$product) return redirect('admin/product/error.html');
        $product->setPath('./admin/product/search.html?name='.$request->name.'&catalog='.$request->catalog);
        return view('admin.product.view',compact(['product','total']));


    }
}
