<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $categories = Category::orderBy('name', 'asc')->with('subCategory')->get();
        $hotProducts = Product::where('product_type', 'hot')->orderBy('id', 'desc')->get();
        $newProducts = Product::where('product_type', 'new')->orderBy('id', 'desc')->get();
        $regularProducts = Product::where('product_type', 'regular')->orderBy('id', 'desc')->get();
        $discountProducts = Product::where('product_type', 'discount')->orderBy('id', 'desc')->get();

      
        return view('frontend.index', compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts', 'categories'));
    }

    public function ShopProduc ()
    {
        return view('frontend.shop');
    }

    public function returnProcess ()
    {
        return view('frontend.return-process');
    }

    public function ditailsProduct ($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('frontend.product-details', compact('product', 'categories'));
    }

    public function TypeProduct ($type)
    {
        return view('frontend.type', compact('type'));
    }

    public function ViewProduct ()
    {
        return view('frontend.view');
    }

    public function cheackOutProduct ()
    {
        return view('frontend.cheackout');
    }

    public function privacypolicy ()
    {
        return view('frontend.privacy-policy');
    }

    public function tearmscondition ()
    {
        return view('frontend.tearms-conditions');
    }

    public function refundpolicy ()
    {
        return view('frontend.refund-policy');
    }

    public function paymentpolicy ()
    {
        return view('frontend.payment-policy');
    }

    public function aboutUs ()
    {
        return view('frontend.about-us');
    }

    public function contactUs ()
    {
        return view('frontend.contact-us');
    }
}