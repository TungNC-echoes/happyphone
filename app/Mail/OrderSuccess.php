<?php

namespace App\Mail;

use App\Order;
use App\User;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $order;


    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order_detail = DB::table('order_detail')
            ->join('products','products.id', '=', 'order_detail.id_product')
            ->select('order_detail.quantity','products.id','products.name','order_detail.unit_price','products.image',
                DB::raw('count(products.id)'))
            ->groupBy('products.id','products.name','products.unit_price','products.promotion_price','products.image')
            ->where('id_bill', $this->order->id)->toSql();
        dd($order_detail);
        $user = User::where('id',$this->order->id_customer)->first();
        $order_detail = OrderDetail::where('id_bill', $this->order->id)->get();
        return $this->view('emails.orders.shipped')
            ->with([
                'user' => $user,
                'order' => $this->order,
                'order_detail' =>$order_detail
            ]);
    }
}
