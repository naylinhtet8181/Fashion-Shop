<?php

namespace App\Http\Controllers;
use App\Orderitem;
use App\Category;
use App\Item;
use App\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function count(){
        $income=Orderitem::sum('total');
        $count = Category::all('name')->count();
        $count2 = Item::all('name')->count();
        $count3 =Customer::all('id')->count(); 
      return view('admin2.dashboard',compact('income','count','count2','count3'));
    }


   }
