<?php

namespace App\Listeners;

use App\Cart;
use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CleanCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        session()->forget(["my_cart"]);
        Cart::where("user_id",$order->__get("user_id"))
            ->update([
                "is_checkout"=>false
            ]);
    }
}
