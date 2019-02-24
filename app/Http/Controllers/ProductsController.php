<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Sweater, Inventory};

class ProductsController extends Controller
{
    public function index()
    {
        $products = Inventory::display();
        
        return view('pages.products.index', compact('products'));
    }

    public function gifts()
    {
        return view('pages.gifts.index');
    }

    public function notify(Request $request)
    {
        return redirect()->back()->with('status', 'Great, we\'ll let you know when this item is back!');
    }

    public function show($type, $slug, $color)
    {
        $model = typeToClass($type);

        abortIf(! class_exists($model));

        $product = $model::slug($slug)->first();

        abortIf(! $product);

        $images = $product->imagesByColor($color);

        abortIf(! $images);

        $suggestions = Inventory::display(3);
        
        return view('pages.products.show.index', compact(['product', 'images', 'color', 'suggestions']));
    }
}
