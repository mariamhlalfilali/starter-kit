<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Page2 extends Controller
{
  public function index()
  {
    return view('content.pages.pages-page2');
  }

  public function store(Request $request)
  {
    $name = $request->name;
    $price = $request->price;
    $description = $request->description;
    $quantity = $request->quantity;

    //validation

    $request->validate([
      'name' => 'required',
      'price' => 'required',
      'description' => 'required',
      'quantity' => 'required'
    ]);

    //insertion
    Product::create([
      'name' => $name,
      'price' => $price,
      'description' => $description,
      'quantity' => $quantity

    ]);

    return redirect()->route('pages-page-2')->with('success', 'Your Product has been successfully submitted.');;
  }
}