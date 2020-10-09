<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Item;
use App\Wishlist;
use App\Cart;

class WishlistController extends Controller
{
    public function index(){
      $items=Wishlist::where('user_id',Auth::user()->id)->latest()->paginate(5);
      $categories=Category::all();
      $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');
     return view('wishlist',compact('items','categories','qty'));
}

    public function addtoWishlist(Request $request){
        $id=$request->id;
        $items =Item::where('id',$id)->get();


    $name=$items[0]['name'];
    $price=$items[0]['price'];
    $description=$items[0]['description'];
    $image=$items[0]['image'];

    $wh_name=Wishlist::where('name',$name)
    -> where('user_id',Auth::user()->id)
    ->first();

if($wh_name===null){
        Wishlist::create([
            'user_id'=>Auth::user()->id,
            'name' =>$name,
            'price' =>$price,
            'description' =>$description,
           'image'=>$image,
        ]);

     return back()
    ->with('success','Added to Wishlist');
}

return back()
        ->with('fail','Already Added to Wishlist');
   }


   public function destroy(Request $request)
    {
        $id=$request->id;
        $item=Wishlist::find($id);
        $item->delete();
        return back()
    ->with('success','Deleted from Wishlist');
    }
}
