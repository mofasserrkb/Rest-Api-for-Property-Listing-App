<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Listing::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'propertyname'=>'required',
            'slug'=>'required',
            'propertytype'=>'required',
            'location'=>'required',
            'bedroom'=>'required',
            'price'=>'required'
        ]);
        return Listing::create( $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Listing::find($id);
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
        //
        $listing= Listing::find($id);
        $listing->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Listing::destroy($id);
    }
    /**
     * Remove the specified resource from storage.
     *
  * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $propertyname = $request->propertyname;
        $location = $request->location;
        $propertytype = $request->propertytype;
        $bedroom = $request->bedroom;
        $price = $request->price;
        $minprice=$price-1000;
        $maxprice=$price+1000;
        return Listing::where('propertyname','Like','%'.$propertyname.'%')
            ->whereBetween('price',[$minprice,$maxprice])
            ->where('bedroom', '>=',$bedroom)
            ->where('location',$location)
            ->where('propertytype',$propertytype)        
            ->get();
        
    }
    // public function search($propertyname,$price)
    // {
    //     return Listing::where('propertyname','Like','%'.$propertyname.'%')
    //     ->where('price', '>=',$price)        
    //     ->get();
    // }
}
