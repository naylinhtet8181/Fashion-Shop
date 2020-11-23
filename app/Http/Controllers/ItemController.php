<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Category;

class ItemController extends Controller
{
    Public function index(){
        $categories = Category::all();
        $items=Item::latest()->paginate(5);
        return view('admin.product.index',compact('categories','items'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
 }

 public function create()
 {
     $categories = Category::all();
     $items=Item::all();
     return view('admin.product.create',compact('categories','items'));
 }

 public function store(Request $request)
 {

    $request->hasfile('image');
    $image=$request->file('image');
    $name=$image->getClientOriginalName();
    $image->move(public_path().'/images/',$name);
    $image='/images/'.$name;

 Item::create([

     'category_id' => request('category'),
     'name' => request('name'),
     'price' =>  request('price'),
     'description' => request('description'),
    'image'=>$image,
 ]);

 return redirect()->route('item.index');
     }

     public function show(Item $item)
    {
        return view('admin.product.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $items=Item::find($id);
        $categories=Category::all();
        return view('admin.product.edit',compact('items','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/',$name);
            $image='/images/'.$name;
        }
        else
        {
             $image = request('oldimage');
        }

        $items=Item::find($id);
        $items->name=request('name');
        $items->price=request('price');
        $items->description=request('description');
       $items->category_id=request('category');

        $items->image=$image;
        $items->update();

        return redirect()->route('item.index')
                        ->with('success' ,"Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item=Item::find($id);
        $item->delete();
        return redirect()->route('item.index')
        ->with('success' ,"Product deleted successfully");
    }

}

