<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Product extends Model
{
    public function saveProduct($request)
    {
    	$check =Product::where('name' ,$request->name)->where('user_id',Auth::id())->first();
    	if(!$check)
    	{
	    	$this->name = $request->name;
	    	$this->price =$request->price;
	    	$this->user_id =Auth::id();

	    	$this->save();
	    	return true;
    	}
    	return false;
    }

    public static function getmyList()
    {
    	return Product::where('user_id',Auth::id())->where('status',1)->get();
    }

    public function softdelete()
    {
    	$this->status=0;
    	$this->update();
    	return true;
    }

    public function updateProduct($request)
    {
    	$check =Product::where('name' ,$request->name)->where('user_id',Auth::id())->first();
    	if(!$check)
    	{
	    	$this->name = $request->name;
	    	$this->price = $request->price;
	    	$this->update();
	    	return true;
    	}
    	return false;
    }
}
