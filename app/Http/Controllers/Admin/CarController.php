<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Car::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.cars.create', compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('image')->store(
                'cars/images', 'public'
            );
            $slug = Str::slug($request->nama_mobil, '-');

            Car::create($request->except('image') + ['image' => $image,'slug' => $slug]);
        }

        return redirect()->route('admin.cars.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $statuses = Car::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.cars.edit', compact('car','types','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_mobil, '-');
            if($request->image) {
                File::delete('storage/' . $car->image);
                $image = $request->file('image')->store(
                    'cars/images', 'public'
                );
                $car->update($request->except('image') + ['image' => $image, 'slug' => $slug]);
            }else {
                $car->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.cars.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        File::delete('storage/' . $car->image);
        $car->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}
