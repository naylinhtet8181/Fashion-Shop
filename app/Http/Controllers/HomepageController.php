<?php

namespace App\Http\Controllers;
use App\Category;
use App\Item;
use App\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function index()
    {
        $items =Item::all();
        $categories =Category::all();
        $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');
       return view('index',compact('items','categories','qty'));
}

public function showCates($id,Request $request)
    {

        $items=Item::orderby('price')->get();
        if($request->$id){
        $items =Item::where('category_id',$id)->get();

        }
        $categories =Category::all();

        $id_=$id;

       return view('index',compact('items','id_','categories'));
}

}
