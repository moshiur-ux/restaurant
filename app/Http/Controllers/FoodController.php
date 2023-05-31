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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
    }
}
