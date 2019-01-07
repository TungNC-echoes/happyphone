<?php

namespace App\Mail;

use App\Order;
use App\User;
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
        $name = $user = User::where('id',$this->order->id_customer)->get();
        return $this->view('emails.orders.shipped')
            ->with([
                'user_name' => $name,
                'orderDate' => $this->order->date_order,
                'orderPrice' => $this->order->total,
                'orderPayment' => $this->order->payment,
                'orderNote' => $this->order->note,
            ]);
    }
}
