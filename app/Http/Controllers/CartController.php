<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Category;
use App\Orderitem;
use App\Customer;

class CartController extends Controller
{
     public function index(){
          $items=Cart::where('user_id',Auth::user()->id)->get();
          $categories=Category::latest()->paginate(8);
          $total_amount=Cart::where('user_id',Auth::user()->id)->sum('total');
          $qty=Cart::where('user_id',Auth::user()->id)->sum('qty');

        return view('cart',compact('items','categories','total_amount','qty'));
 }

    public function addtoCart(Request $request){
        $id=$request->id;
            $items =Item::where('id',$id)->get();


        $name=$items[0]['name'];
        $price=$items[0]['price'];
        $description=$items[0]['description'];
       $qty=1;

        $image=$items[0]['image'];
        $user=Auth::user()->id;
        $cat_name=Cart::where('name',$name)
        -> where('user_id',Auth::user()->id)
        ->first();

    if($cat_name===null){
            Cart::create([
                'name' =>$name,
                'user_id'=>$user,
                'price' =>$price,
                  'qty'=>$qty,
                  'total'=>$price*$qty,
                 'image'=>$image
            ]);

        return back()
        ->with('success','Added to Cart');
    }

    return back()
            ->with('fail','Already Added to Cart');

     }

 public function addtoCart2(Request $request){

        $id_=$request->id_;


        $items =Wishlist::where('id',$id_)->get();
        $name=$items[0]['name'];
    $price=$items[0]['price'];
    $description=$items[0]['description'];
    $image=$items[0]['image'];
    $qty=1;
    $user=Auth::user()->id;
    $cat_name=Cart::where('name',$name)
   -> where('user_id',Auth::user()->id)
    ->first();

if($cat_name===null){
        Cart::create([
            'name' =>$name,
            'user_id'=>$user,
            'price' =>$price,
              'qty'=>$qty,
              'total'=>$price*$qty,
             'image'=>$image
        ]);

    return back()
    ->with('success','Added to Cart');
}

return back()
        ->with('fail','Already Added to Cart');

 }

       public function destroy(Request $request)
        {
            $id=$request->id;
            $item=Cart::find($id);
            $item->delete();
            return back()
        ->with('success','Deleted from Cart');
        }

public function update($id,Request $request)
    {
        $items=Cart::find($request->id);

       $items->qty=$request->qty;
       $items->total=$items->price*$request->qty;
       $items->update();
       return back()
       ->with('success','Updated to Cart');

    }

    public function checkout(){
        $items=Cart::all();
          $total_amount=Cart::sum('total');
          $qty=Cart::sum('qty');

          if($qty==0){
              return back()->with('fail','No product found');
          }
else{
    return view('checkout',compact('items','total_amount','qty'));
}

    }

    public function makeorder(Request $request){
  // dd($request->all());
     $customer=Customer::create([
            'user_id'=>Auth::user()->id,
           'name' =>$request->name,
           'email' =>$request->email,
              'state'=>$request->state,
             'zip'=>$request->zip,
              'cvv'=>$request->cvv,
         'address'=>$request->address,
              'city'=>$request->city,
             'name_on_card'=>$request->name_on_card,
              'credit_card_number'=>$request->credit_card_number,
             'exp_month'=>$request->exp_month,
              'exp_year'=>$request->exp_year,
        ]);


$carts=Cart::where('user_id',Auth::user()->id)->get()->toArray();
 foreach($carts as $cart){
$data = array_merge($cart, ['order_id' => $customer->id]);
 Orderitem::insert($data);
 }

$delete=Cart::where('user_id',Auth::user()->id);
$delete->delete();


return redirect()->route('homepage')->with('Successfully sent');

}

}
