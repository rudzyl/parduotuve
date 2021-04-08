<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Maker;
use Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->sort && 'asc' == $request->sort) {
        //     $cars = $cars->sortBy('name');
        //     $sortBy = 'asc';
        // }
        // elseif ($request->sort && 'desc' == $request->sort) {
        //     $cars = $cars->sortByDesc('name');
        //     $sortBy = 'desc';
        // }
        $makers = Maker::all();
        if ($request->maker_id) {
            $cars = Car::where('maker_id',$request->maker_id)->get();
            $filterBy = $request->maker_id;
        }
        else {
            $cars = Car::all();
        }
        
    return view('car.index', [
        'cars' => $cars, 
        'makers' => $makers,
        'filterBy'=> $filterBy ?? 0
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $makers = Maker::all();
       return view('car.create', ['makers' => $makers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'car_name' => ['required', 'min:3', 'max:64'],
           'car_plate' => ['required', 'min:3', 'max:64'],
       ],
       [
        'car_name.required' => 'Please enter the name',
        'car_name.min' => 'can not be shorter than 3 numbers'
       ],

       [
        'car_plate.required' => 'Please enter the palete',
        'car_plate.min' => 'can not be shorter than 3 numbers'
       ]        
       );
       if ($validator->fails()) {
           $request->flash(); // trumpam prisimena 
           return redirect()->back()->withErrors($validator);
       }
        Car::new()->refreshAndSave($request);
        return redirect()->route('car.index')->with('success_message', 'Car was created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $makers = Maker::all();
       return view('car.edit', ['car' => $car, 'makers' => $makers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(),
        [
            'car_name' => ['required', 'min:3', 'max:64'],
            'car_plate' => ['required', 'min:3', 'max:64'],
        ],
        [
            'car_name.required' => 'Please enter the name',
            'car_name.min' => 'can not be shorter than 3 numbers'
        ],
    
        [
            'car_plate.required' => 'Please enter the palete',
            'car_plate.min' => 'can not be shorter than 3 numbers'
        ] 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
       $car->refreshAndSave($request);
       return redirect()->route('car.index')->with('success_message', 'Car was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index')->with('success_message', 'Car was deleted.');
    }
}
