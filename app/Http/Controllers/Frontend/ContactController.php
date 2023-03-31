<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->back()->with([
            'message' => 'pesan anda berhasil dikirim !',
            'alert-type' => 'success'
        ]);
    }
}
