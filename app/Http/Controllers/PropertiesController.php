<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $request->validated();

        $property = Property::create([
            'broker_id' => $request->broker_id,
            'property_type' => $request->property_type,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'build_year' => $request->build_year,
        ]);

        $property->characteristic()->create([
            'property_id' => $property->id,
            'bedrooms' =>$request->bedrooms,
            'bathrooms' =>$request->bathrooms,
            'sqft' =>$request->sqft,
            'price' =>$request->price,
            'price_sqft' =>$request->price_sqft,
            'property_category' =>$request->property_category,
            'status' =>$request->status,
        ]);

        return new PropertiesResource($property);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return new PropertiesResource($property);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePropertyRequest $request, Property $property)
    {
        $property->update($request->only([
                'broker_id',
                'property_type',
                'address',
                'city',
                'zip_code',
                'description',
                'build_year',
        ]));

        $property->characteristic()->where('property_id',$property->id)->update($request->only([
                'property_id',
                'bedrooms',
                'bathrooms',
                'sqft',
                'price',
                'price_sqft',
                'property_category',
                'status',
        ]));
        return new PropertiesResource($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json([
            "success" => true,
            "message" => "Property has been deleted..."

        ]);
    }
}
