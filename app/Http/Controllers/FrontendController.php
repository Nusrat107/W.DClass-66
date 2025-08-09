<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('name', 'asc')->with('subCategory')->get();
        $hotProducts = Product::where('product_type', 'hot')->orderBy('id', 'desc')->get();
        $newProducts = Product::where('product_type', 'new')->orderBy('id', 'desc')->get();
        $regularProducts = Product::where('product_type', 'regular')->orderBy('id', 'desc')->get();
        $discountProducts = Product::where('product_type', 'discount')->orderBy('id', 'desc')->get();


        return view('frontend.index', compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts', 'categories'));
    }

     public function addToCartDetails (Request $request, $product_id)
    {
        $cartProduct = Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->first();
        $product = Product::find($product_id);

        if($cartProduct == null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = $request->qty;
            $cart->color = $request->color;
            $cart->size = $request->size;

            if($product->discount_price == null){
                $cart->price = $product->regular_price;
            }
            if($product->discount_price != null){
                $cart->price = $product->discount_price;
            }

            $cart->save();

            if($request->action == "addToCart"){
                return redirect()->back();
            }
            elseif($request->action == "buyNow"){
                return redirect('/checkout');
            }
        }

        elseif($cartProduct != null){
            $cartProduct->qty = $request->qty + $cartProduct->qty;
            $cartProduct->color = $request->color;
            $cartProduct->size = $request->size;

            if($product->discount_price == null){
                $cartProduct->price = $product->regular_price;
            }
            if($product->discount_price != null){
                $cartProduct->price = $product->discount_price;
            }

            $cartProduct->save();

            if($request->action == "addToCart"){
                return redirect()->back();
            }
            elseif($request->action == "buyNow"){
                return redirect('/cheackout');
            }
        }
    }

    public function addToCart (Request $request, $product_id)
    {
        $cartProduct = Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->first();
        $product = Product::find($product_id);
        
        // $product = Product::with('size')->where('id',$product_id)->first();

        // if($product->size->isNotEmpty()){
        //     return redirect('product-details/'.$product->slug);
        // }

        if($cartProduct == null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = 1;

            if($product->discount_price == null){
                $cart->price = $product->regular_price;
            }
            if($product->discount_price != null){
                $cart->price = $product->discount_price;
            }

            $cart->save();
             toastr()->success('Cart Added Successfull.');
            return redirect()->back();
        }

        elseif($cartProduct != null){
            $cartProduct->qty = 1 + $cartProduct->qty;

            if($product->discount_price == null){
                $cartProduct->price = $product->regular_price;
            }
            if($product->discount_price != null){
                $cartProduct->price = $product->discount_price;
            }

            $cartProduct->save();
            toastr()->success('Cart Added Successfull.');
            return redirect()->back();
        }
    }

    public function addToCartDelete ($id)
    {
        $Cart = Cart::find($id);
        $Cart->delete();
        return redirect()->back();
    }

    public function ShopProduct()
    {
        return view('frontend.shop');
    }

    public function ReturnProduct()
    {
        return view('frontend.return');
    }

   public function detailsProduct($slug)
{
    $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();

    if (!$product) {
        return redirect()->route('home')->with('error', 'Product not found!');
    }

    $categories = Category::orderBy('name', 'asc')->get();
    return view('frontend.details', compact('product', 'categories'));
}



    public function TypeProduct($type)
    {
        return view('frontend.type', compact('type'));
    }

    public function ViewProduct()
    {
        return view('frontend.view');
    }

    public function cheackoutProduct()
    {
        return view('frontend.cheackout');
    }

    public function confirmOrder (Request $request)
    {
         $order = new Order();

        $order->ip_address = $request->ip();

        $previousOrder = Order::orderBy('id', 'desc')->first();

        if($previousOrder == null){
            $generateInvoice = "XYZ-1";
            $order->invoice_number = $generateInvoice;
        }
        elseif($previousOrder != null){
            $generateInvoice = "XYZ-".$previousOrder->id+1;
            $order->invoice_number = $generateInvoice;
        }
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->charge = $request->charge;
        $order->price = $request->inputGrandTotal;

        $cartProducts = Cart::where('ip_address', $request->ip())->get();

        if($cartProducts->isNotEmpty()){
            $order->save();

            foreach($cartProducts as $cart){
                $orderDetails = new OrderDetails();

                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->color = $cart->color;
                $orderDetails->size = $cart->size;
                $orderDetails->qty = $cart->qty;
                $orderDetails->price = $cart->price;

                $orderDetails->save();
                $cart->delete();
            }

            return redirect('success-order/'.$generateInvoice);

        }
        else{
            return redirect('/');
        }
    }

    public function successOrder ($invoiceid)
    {
        return view('frontend.thankyou', compact('invoiceid'));
    }

    

    public function privacypolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function tearmsCondition()
    {
        return view('frontend.tearms-conditions');
    }

    public function refundpolicy()
    {
        return view('frontend.refund-policy');
    }

    public function paymentpolicy()
    {
        return view('frontend.payment-policy');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }
}
