<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all Restaurant
        $restaurant = Restaurant::get();

        //
        return [
            'success' => true,
            'data'    => $restaurant
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validation

        // Store
        $results = Restaurant::create([
            'name'      => $request->name,
            'address'   => $request->address,
            'telephone' => $request->telephone
        ]);

        //
        return [
            'success' => true,
            'data'    => $results
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Find Restaurant
        $restaurant = Restaurant::findOrFail($id);

        //
        return [
            'success' => true,
            'data'    => $restaurant
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Validation
        
        // Find
        $restaurant = Restaurant::findOrFail($id);

        // Update
        $restaurant->name      = $request->name;
        $restaurant->address   = $request->address;
        $restaurant->telephone = $request->telephone;

        $restaurant->save();

        return [
            'success' => true,
            'data'    => $restaurant
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Find model to delete
        $restaurant = Restaurant::findOrFail($id);

        // Delete model
        $restaurant->delete();

        return [
            'success' => true,
            'data'    => $restaurant
        ];
    }
}
