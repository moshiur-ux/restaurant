<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $foods =\App\Models\Food::latest()->paginate(10);
        return view('Food.index',compact('foods'));



       




        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Food.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 

     $this->validate($request,[

        'name'=>'required',
        'description'=>'required',
        'price'=>'required|integer',
        'category'=>'required',
        'image'=>'required|mimes:png,jpg,jpeg'


     ]);

     $image =$request->file('image');
     $name=time().'.'.$image->getClientOriginalExtension();
     $destinationPath =public_path('/images');
     $image->move($destinationPath,$name);

     \App\Models\Food::create([
        'name'=>$request->get('name'),
        'description'=>$request->get('description'),
        'price'=>$request->get('price'),
        'category_id'=>$request->get('category'),
        'image'=>$name

     ]);
     return redirect()->back()->with('message','Food Section Created');




       
        



           
    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request,string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $food=\App\Models\Food::find($id);
        return view('Food.edit',compact('food'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[

            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'category'=>'required',
            'image'=>'mimes:png,jpg,jpeg'
    
    
         ]);
           
         $food =\App\Models\Food::find($id);
         $name=$food->image;
         if($request->hasFile('image'))
         {
            $image =$request->file('image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath =public_path('/images');
        $image->move($destinationPath,$name);

         }
         $food->name =$request->get('name');
         $food->description = $request->get('description');
         $food->price= $request->get('price');
         $food->category_id= $request->get('category');
         $food->image=$name;
         $food->save();

         return redirect()->route('Food.index')->with('message','Food information updated');

          


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $food = \App\Models\Food::find($id);
        $food->delete();
        return redirect()->route('Food.index')->with('message','Food information updated');
        
    }
}
