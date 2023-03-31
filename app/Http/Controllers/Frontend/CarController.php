<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('status',1);
        
        if($request->category_id && $request->penumpang){
            $cars = $cars->Where('type_id',$request->category_id)->Where('penumpang','>=',$request->penumpang);
        }
        
        $cars = $cars->get();
        return view('frontend.car.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('frontend.car.show', compact('car'));
    }

    public function store(BookingRequest $request)
    {
        Booking::create($request->validated());

        return redirect()->back()->with([
            'message' => 'kami akan menghubungi anda secepatnya !',
            'alert-type' => 'success'
        ]);
    }
}
