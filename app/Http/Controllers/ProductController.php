<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
  // ============================
  // Display products list (visitors)
  public function products()
  {
    $products = Product::get();

    return view('products', ['products' => $products]);
  }

  // ============================
  // Display product details (visitors)
  public function details($id)
  {
    $product = Product::find($id);

    return view('product', ['product' => $product]);
  }

  // ============================
  // Search for products (visitors)
  public function search(Request $request)
  {
    $searchTest = $request->input('searchTest');

    $products = Product::where('name', 'LIKE', '%' . $searchTest . '%')
      ->orWhere('description', 'LIKE', '%' . $searchTest . '%')
      ->orderBy('created_at', 'desc')
      ->get();

    if (count($products) > 0) {
      return view('products', ['products' => $products]);
    } else {
      return view('products', ['msg' => 'No products found']);
    }
  }

  // ============================
  // Search for products (admins)
  public function dashboardSearch(Request $request)
  {
    $searchTest = $request->input('searchTest');

    $validator = Validator::make($request->all(), [
      'searchTest' => 'required',
    ]);

    if ($validator->fails()) {
      return back()
        ->withErrors($validator)
        ->withInput();
    }

    $products = Product::where('name', 'LIKE', '%' . $searchTest . '%')
      ->orWhere('description', 'LIKE', '%' . $searchTest . '%')
      ->orderBy('created_at', 'desc')
      ->get();

    if (count($products) > 0) {
      return view('dashboard.index', ['products' => $products]);
    } else {
      return view('dashboard.index', ['msg' => 'No products found']);
    }
  }

  // ============================
  // Display dashboard view with products list (admins)
  public function index()
  {
    $products = Product::sortable()->paginate(10);

    return view('dashboard.index', ['products' => $products]);
  }

  // ============================
  // Display a new product form
  public function create()
  {
    return view('dashboard.create');
  }

  // ============================
  // Add a new product
  public function store(Request $request)
  {
    $product = new Product();

    $validator = Validator::make($request->all(), [
      'name' => 'required|min:3|max:50',
      'description' => 'required|min:3|max:300',
      'price1' => 'required|numeric',
      'price2' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      return back()
        ->withErrors($validator)
        ->withInput();
    }

    $price1 = $request->input('price1');
    $price1 = trim($price1);
    $price1 = str_replace(',', '.', $price1);

    $price2 = $request->input('price2');
    $price2 = trim($price2);
    $price2 = str_replace(',', '.', $price2);

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price1 = $price1;
    $product->price2 = $price2;

    $product->save();

    Session::flash('alert-message', 'New product added successfully!');
    Session::flash('alert-class', 'alert-success');

    return redirect('/dashboard');
  }

  // ============================
  // Display product details
  public function show($id)
  {
    //
  }

  // ============================
  // Display edit product form
  public function edit($id)
  {
    $product = Product::find($id);

    return view('/dashboard/update', ['product' => $product]);
  }

  // ============================
  // Update product
  public function update(Request $request, $id)
  {
    $product = Product::find($id);

    $validator = Validator::make($request->all(), [
      'name' => 'required|min:3|max:50',
      'description' => 'required|min:3|max:300',
      'price1' => 'required|numeric',
      'price2' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      return back()
        ->withErrors($validator)
        ->withInput();
    }

    $productStatus = $request->input('status');
    if ($productStatus == 'active') {
      $productStatus = 1;
    } else {
      $productStatus = 0;
    }

    $price1 = $request->input('price1');
    $price1 = trim($price1);
    $price1 = str_replace(',', '.', $price1);

    $price2 = $request->input('price2');
    $price2 = trim($price2);
    $price2 = str_replace(',', '.', $price2);

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price1 = $price1;
    $product->price2 = $price2;
    $product->status = $productStatus;

    $product->save();

    Session::flash('alert-message', 'Product updated successfully!');
    Session::flash('alert-class', 'alert-success');

    return redirect('/dashboard');
  }

  // ============================
  // Delete product
  public function destroy($id)
  {
    $product = Product::find($id);

    $product->delete();

    Session::flash('alert-message', 'Product deleted successfully!');
    Session::flash('alert-class', 'alert-success');

    return back();
  }
}
