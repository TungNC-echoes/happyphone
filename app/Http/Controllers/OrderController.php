<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Mail\OrderSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;
class OrderController extends Controller
{
    //
    public function ship(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Ship order...

        $user = $request->user();
        if ($user) {
            Mail::to($user->email)->send(new OrderSuccess($order));
        }
    }

    public function getOrder(){
        $user = Auth::user();
        $cart = Cart::content();
        $total = Cart::subtotal();
        foreach ($cart as $row){
            $image[$row->id] = Product::find($row->id)->image;
        }
        return view('site.order.order',compact(['user','cart','image','total']));
    }
    public function postOrder(Request $request){
        $tran = new Order();
        $tran->id_customer = Auth::id();
        $tran->date_order = date('Y-m-d');
        $tran->total = floatval(str_replace(',','',Cart::subtotal()));
        $tran->payment = $request->payment_method;
        $tran->note = $request->note;
        $tran->save();
        foreach (Cart::content() as $row){
            $order = new OrderDetail();
            $order->id_bill = $tran->id;
            $order->id_product = $row->id;
            $order->quantity = $row->qty;
            $order->unit_price = $row->price;
            $order->save();
        }
        Cart::destroy();
        $this->ship($request, $tran->id);
        return redirect('dat-hang')->with('thongbao','Cảm ơn bạn đã đặt hàng sản phẩm của chúng tôi!');
    }
}
