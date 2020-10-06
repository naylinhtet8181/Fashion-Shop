<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Orderitem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index()
    {
            $items =Customer::latest()->paginate(5);
    
            return view('admin.order.index',compact('items'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    { 
        $customer=Customer::where('id',$id)->get();
        $items=Orderitem::where('order_id',$id)->get();
        $total_amount=Orderitem::where('order_id',$id)->sum('total');
        $qty=Orderitem::where('order_id',$id)->sum('qty');

        return view('admin.order.show',compact('items','total_amount','qty','customer'));
    }

    public function destroy($id)
    {
        $item=Customer::find($id);
        $item->delete();
        return redirect()->route('item.index')
        ->with('Order deleted success');
    }
}
