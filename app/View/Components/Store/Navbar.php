<?php

namespace App\View\Components\Store;

use App\Models\Cart;
use App\Models\CartProduct;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cart_product = null;
        if (Auth::check()) {
            $cart = Cart::where("user_id", auth()->user()->id)->first();
            $cart_product = CartProduct::where("cart_id", $cart->id)->count();
        }
        return view('components.store.navbar', [
            'user_cart_count' => $cart_product,
        ]);
    }
}
