<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\TestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        if($request->validated())
        {
            $profile = $request->file('profile')->store(
                'testimonial/profile', 'public'
            );

            Testimonial::create($request->except('profile') + ['profile' => $profile]);
        }

        return redirect()->route('admin.testimonials.index')->with([
            'message' => 'data berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        if($request->validated())
        {
            if($request->profile) {
                File::delete('storage/'. $testimonial->profile);
                $profile = $request->file('profile')->store(
                    'testimonial/profile' , 'public'
                );

                $testimonial->update($request->except('profile') + ['profile' => $profile]);
            }else {
                $testimonial->update($request->validated());
            }
        }

        return redirect()->route('admin.testimonials.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        File::delete('storage/'. $testimonial->profile);
        $testimonial->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}
