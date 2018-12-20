<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function view(){
        $orders = DB::table('bill_detail')->join('products','products.id','bill_detail.id_product')
            ->join('bills','bills.id','bill_detail.id_bill')
            ->selectRaw('products.id as id_product,products.*,bill_detail.id as id_order,bill_detail.*');
        //var_dump($order->get());
        $total = count($orders->get());
        $orders = $orders->orderBy('bill_detail.id_bill')->paginate(10);
        return view('admin.order.view',[
            'orders' => $orders,
            'total' => $total
        ]);
    }
    //xóa một đơn hàng
    public function delete($id){
        $order = OrderDetail::find($id);
        if(!$order) return view('admin.product.error');
        $tran = Order::find($order->id_bill);
        if($tran->total - $order->unit_price*$order->quantity ==0 ){
            $tran->delete();
        }
        else{
            $tran->total = $tran->total - $order->unit_price*$order->quantity;
            $tran->save();
        }
        $order->delete();
        return redirect('admin/order/view.html')->with('thongbao','Xóa đơn hàng thành công');
    }
    //xóa nhiều đơn hàng
    public function deleteMultiple(Request $request){
        foreach ($request->allVals as $row){
            $order = OrderDetail::find($row);
            if(!$order) return response()->json('fail');
            $tran = Order::find($order->id_bill);
            if($tran->total - $order->unit_price*$order->quantity ==0 ){
                $tran->delete();
            }
            else{
                $tran->total = $tran->total - $order->unit_price*$order->quantity;
                $tran->save();
            }
            $order->delete();
        }



        return response()->json('ok');
//        $order = OrderDetail::find($id);
//        if(!$order) return view('admin.product.error');
//        $tran = Order::find($order->id_bill);
//        if($tran->total - $order->unit_price*$order->quantity ==0 ){
//            $tran->delete();
//        }
//        else{
//            $tran->total = $tran->total - $order->unit_price*$order->quantity;
//            $tran->save();
//        }
//        $order->delete();
//        return redirect('admin/order/view.html')->with('thongbao','Xóa đơn hàng thành công');
    }
    //tìm kiếm order
    public function search(Request $request){
        $orders = DB::table('bill_detail')->join('products','products.id','bill_detail.id_product')
            ->join('bills','bills.id','bill_detail.id_bill')
            ->where('bill_detail.created_at','>=',date('Y-m-d',strtotime($request->date_from)))
            ->where('bill_detail.created_at','<=',date('Y-m-d',strtotime($request->date_to)))
            ->selectRaw('products.id as id_product,products.*,bill_detail.id as id_order,bill_detail.*');
        //var_dump($order->get());
        $total = count($orders->get());
        $orders = $orders->orderBy('bill_detail.id_bill')->paginate(10);
        return view('admin.order.view',[
            'orders' => $orders,
            'total' => $total
        ]);
    }
}
