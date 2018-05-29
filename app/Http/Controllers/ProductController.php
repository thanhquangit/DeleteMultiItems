<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class ProductController extends Controller
{
    public function getListProduct(){
    	$product = Product::all();
    	return view('listItem', compact('product'));
    }
    public function postDel(Request $req){
    	$delid = $req->input('delid');
    	Product::whereIn('id',$delid)->delete();
    	return redirect('listProduct');
    }
    public function getDeleteAll(){
    	DB::table('product')->delete();
    	return redirect('listProduct');
    }
}
