<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Item;
use App\Cart;


class ProductpageController extends Controller
{

public function index(Request $request)
    {
        $item =Item::orderBy('created_at','desc');
        $categories =Category::all();
        $id_=null;

        if($request->min_price && $request->max_price){

            $item = $item->where('price','>=',$request->min_price);
            $item = $item->where('price','<=',$request->max_price);
         }
         $items =$item->paginate(9);   
        $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');

     return view('single-product',compact('items','categories','id_','qty'));
}

public function showCates($id,Request $request)
    {
    if($id){
    $items =Item::where('category_id',$id)->paginate(9);
   }
   elseif($request->all){
    $items =Item::latest()->paginate(9);
  }

       if($request->min_price && $request->max_price){

            $items = $items->where('price','>=',$request->min_price);
            $items = $items->where('price','<=',$request->max_price);
        }

        $categories =Category::all();
        $id_=$id;
        $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');

       return view('cat-product',compact('items','id_','categories','qty'));
}

public function search(Request $request){
    $searchData= $request->searchData;
    $categories =Category::all();

    $items =Item::where('name','like', '%' . $searchData . '%')->paginate(9);
    $id_=$searchData;
    $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');
    return view('single-product',compact('id_','items','categories','qty'));
  }

public function viewDetail($id){
    $items =Item::where('id',$id)->get();
    $categories =Category::all();
    $cat_id=$items[0]['category_id'];
    $cat_item=Item::where('category_id',$cat_id)->whereNotIn('id',[$id])->paginate(4);
    $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');
    return view('product-detail',compact('cat_item','items','categories','qty'));
}
}








