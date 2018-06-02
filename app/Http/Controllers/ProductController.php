<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function addProduct()
    {
    	return view('auth.product.addProduct');
    }

    public function saveProduct(Request $request)
    {
    	$product= new Product();
   		$result = $product->saveProduct($request);
   		if($result)
    	{
    		return redirect()->back()->with('message','Product Added');
    	}
    	return redirect()->back()->with('danger', 'Product Allready Exists');
    }
    
    public function productList()
    {
    	$products = Product::getmyList();
    	return view('auth.product.list',compact('products'));
    }

    public function deleteProduct($id)
    {
    	$product =Product::find($id);
    	$product->softdelete();
    	return redirect()->back()->with('message','Product removed');
    }

    public function editProduct($id)
    {
    	$product = Product::find($id);
    	return view('auth.product.edit',compact('product'));
    }

    public function updateProduct(Request $request , $id)
    {
    	$product = Product::find($id);
    	$result = $product->updateProduct($request);
    	if($result)
    	{
    		return redirect()->back()->with('message','Product Updated');
    	}
    	return redirect()->back()->with('danger', 'Product Name Allready Exists');
    }
}
