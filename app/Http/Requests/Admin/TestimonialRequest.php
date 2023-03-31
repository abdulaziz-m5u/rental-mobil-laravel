<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch($this->method()){
            case 'POST' : {
                return [
                    'name' => 'required|string|max:255',
                    'pekerjaan' => 'required|string|max:255',
                    'pesan' => 'required|string',
                    'profile' => ['required','image','mimes:jpeg,png,jpg,gif','max:4096'],
                ];
            }
            case 'PUT' :
            case 'PATCH' : {
                return [
                    'name' => ['required', 'max:255', 'unique:testimonials,name,'. $this->route()->testimonial->id],
                    'pekerjaan' => 'required|string|max:255',
                    'pesan' => 'required|string',
                    'profile' => ['image','mimes:jpeg,png,jpg,gif','max:4096'],
                ];
            }
        }
    }
}
