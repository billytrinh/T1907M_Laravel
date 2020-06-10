<?php

namespace App\Http\Controllers\Auth;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function authenticated(Request $request, $user)
    {
        if(Cart::where("user_id",$user->__get("id"))
            ->where("is_checkout",true)->exists()){
            $myCart = session()->has("my_cart")&& is_array(session("my_cart"))?session("my_cart"):[];
            $cart = Cart::where("user_id",$user->__get("id"))
                ->where("is_checkout",true)->first();
            $items=  $cart->getItems;
            foreach ($items as $item){
                $contain = false;
                foreach ($myCart as $key=>$c){
                    if($c["product_id"] == $item->__get("id")){
                        $myCart[$key]["qty"]+=$item->pivot->__get("qty");
                        $contain = true;
                    }
                }
                if(!$contain){
                    $myCart[] = [
                        "product_id"=> $item->__get("id"),
                        "qty"=> $item->pivot->__get("qty")
                    ];
                }
            }
            session(["my_cart"=>$myCart]);
        }
    }
}
