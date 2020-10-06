<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoryController extends Controller
{
    public function index()
    {

        $products = Category::latest()->paginate(5);

        return view('admin.category.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('category.index')
                         ->with('success','Category created success');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {

        request()->validate([
            'name' => 'required'
        ]);
        $category->update($request->all());
        return redirect()->route('category.index')
                        ->with('success' ,"Category update success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $category=Category::find($id);
        $category->delete(); 

        $item=Item::where('category_id',$id);
        $item->delete();


        return redirect()->route('category.index')
                        ->with('success','Category deleted success');
    }

  

}
