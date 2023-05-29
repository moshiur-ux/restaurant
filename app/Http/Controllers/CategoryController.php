<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories=\App\Models\Category::latest()->get();
        return view('Category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        return view('Category.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        
        \App\Models\Category::create([

            'name'=>$request->get('name')


        ]);

        return redirect()->back()->with('message','Category Created');
         

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request,string $id)
    {
        $category = \App\Models\Category::find($id);

        return view('Category.edit',compact('category'));



        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request,['name'=>'required']);

        $category = \App\Models\Category::find($id);

        $category->name =$request->get('name');
        $category->save();
        return redirect()->route('Category.index')->with('message','Category Update ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
       
        $category = \App\Models\Category::find($id);
        $category->delete();
        return redirect()->route('Category.index')->with('message','Category deleted');



           
        
    }
}
