<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{

    public function index()
    {
       $items=User::latest()->paginate(5);
       return view('admin.user.index',compact('items'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $items=User::where('id',$id)->get();
        return view('admin.user.show',compact('items'));
    }

    public function destroy($id)
    {
        $item=User::find($id);
        $item->delete();
        return redirect()->route('user.index')
        ->with('success','User deleted success');
    }
}
