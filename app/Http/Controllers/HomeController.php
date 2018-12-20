<?php

namespace App\Http\Controllers;

use App\Contact;
use App\OrderDetail;
use App\Product;
use App\Silde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $slide = Silde::all();
        $new_product = Product::where('new',1)->get();
        $sanphamkhuyenmai = Product::where('promotion_price','<>',0)->get();
        return view('site.home.index',[
            'slide' => $slide,
            'new_product' => $new_product,
            'sanphamkhuyenmai' => $sanphamkhuyenmai
        ]);
    }
    //
    public function getLoaiSP($id){
        $product_theoloaisp = Product::where('id_type',$id)->where('new',1)->get();
        $sanphamkhuyenmai = Product::where('id_type',$id)->where('promotion_price','<>',0)->get();
        return view('site.catalog.index',[
            'product_theoloaisp' => $product_theoloaisp,
            'sanphamkhuyenmai' => $sanphamkhuyenmai
        ]);
    }
    //
    public function getSanPham($id){
        $product = Product::find($id);
        $new_product = Product::where('new',0)->take(4)->get();
        $bestsell = DB::table('bill_detail')
            ->join('products','products.id', '=', 'bill_detail.id_product')
            ->select('products.id','products.name','products.unit_price','products.promotion_price','products.image',
                DB::raw('count(products.id)'))
            ->groupBy('products.id','products.name','products.unit_price','products.promotion_price','products.image')
            ->orderByRaw('count(products.id) DESC')
            ->take(4)->get();
        $sanphamtt = Product::where('id_type',$product->id_type)->where('id','<>',$product->id)->get();
        return view('site.product.chitiet',[
            'product' => $product,
            'sanphamtt' => $sanphamtt,
            'new_product' => $new_product,
            'bestsell' => $bestsell,
        ]);
    }
    //
    public function getLienHe(){
        return view('site.home.lienhe');
    }
    //
    public function postLienHe(Request $request){
        $contact = new Contact();
        $contact->id_user = Auth::user()->id;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->date = date("Y-m-d");
        $contact->save();
        return redirect('lienhe.html')->with('thongbao','Cảm ơn bạn đã phản hồi');
    }
    public function getGioiThieu(){
        return view('site.home.gioithieu');
    }//
    public function search(Request $request){
        $product = Product::where('name','like',htmlspecialchars($request->q).'%')->get();
        return response()->json($product);
    }
    //
    public function timkiem(Request $request){
        if(is_numeric($request->s)&&$request->s!=0){
            $product = Product::Where('unit_price',$request->s)
                ->orWhere('promotion_price',$request->s)
                ->get();
        }else{
            $product = Product::where('name','like',$request->s.'%')
                ->get();
        }

        return view('site.home.search',[
            'result' => $product
        ]);
    }
}
